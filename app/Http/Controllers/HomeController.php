<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use App\AcademicSession;
use App\AcademicSubject;
use App\AcademicTerm;
use App\FacultyClearanceLog;
use App\FacultyQuestion;
use App\LibraryClearanceLog;
use App\LibraryQuestion;
use App\Role;
use App\RoleStaff;
use App\ClassSubject;
use App\ClassTerm;
use App\SportClearanceLog;
use App\SportQuestion;
use App\StudentaffairClearanceLog;
use App\StudentaffairQuestion;
use App\StudentStaffClearanceStatus;
use App\StudentTerminalLog;
use App\StudentTerminalLogSubject;
use App\User;
use App\UserAdminProfile;
use App\UserCandidateProfile;
use App\UserStaffProfile;
use App\UserStudentProfile;
use App\Utils\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //for authentication
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $student = User::all();


        $data = [];
        $data['next'] = $request->get('next');
//        dd($data['next']);
        if (Auth::user()->type === 'admin') {
            $profile = UserAdminProfile::where('user_id', Auth::id())->first();
            $data['profile'] = $profile;
            $data['users'] = $student;
            $data['user'] = $user;
            $data['staffs'] = UserStaffProfile::all();
//            $data['staffs'] = User::whereType(Constants::DBCV_USER_TYPE_STAFF)->withTrashed()->get();
//            dd($data['staffs']);
            $data['roles'] = Role::all();
            $data['academic_sessions'] = AcademicSession::all();
//            $data['academic_terms'] = AcademicTerm::all();
        }

        elseif (Auth::user()->type === Constants::DBCV_USER_TYPE_STUDENT) {
            $profile = UserStudentProfile::where('user_id', Auth::id())->first();
            $data['profile'] = $profile;
            $data['faculty_questions'] = FacultyQuestion::all();
            $data['sport_questions'] = SportQuestion::all();
            $data['library_questions'] = LibraryQuestion::all();
            $data['studentaffairs_questions'] = StudentaffairQuestion::all();
//            dd($data['studentaffairs_questions']);
            $facultyQuestionAnswers = FacultyClearanceLog::where('user_id', Auth::id())->get()->toArray();
            $data['faculty_question_answers'] = collect( array_column($facultyQuestionAnswers, 'answer', 'question_id'));

            $libraryQuestionAnswers = LibraryClearanceLog::where('user_id', Auth::id())->get()->toArray();
            $data['library_question_answers'] = collect( array_column($libraryQuestionAnswers, 'answer', 'question_id'));

            $sportQuestionAnswers = SportClearanceLog::where('user_id', Auth::id())->get()->toArray();
            $data['sport_question_answers'] = collect( array_column($sportQuestionAnswers, 'answer', 'question_id'));

            $studentaffairQuestionAnswers = StudentaffairClearanceLog::where('user_id', Auth::id())->get()->toArray();
            $data['studentaffair_question_answers'] = collect( array_column($studentaffairQuestionAnswers, 'answer', 'question_id'));

            $facultyRoleId = Role::where('code_name', 'faculty')->first()->id;
            $faculty_is_approved = StudentStaffClearanceStatus::where('user_id', Auth::id())->whereRoleId($facultyRoleId)->first();
            $sportRoleId = Role::where('code_name', 'sport')->first()->id;
            $sport_is_approved = StudentStaffClearanceStatus::where('user_id', Auth::id())->whereRoleId($sportRoleId)->first();
            $libraryRoleId = Role::where('code_name', 'library')->first()->id;
            $library_is_approved = StudentStaffClearanceStatus::where('user_id', Auth::id())->whereRoleId($libraryRoleId)->first();
            $studentAffairsRoleId = Role::where('code_name', 'student_affairs')->first()->id;
            $student_affairs_is_approved = StudentStaffClearanceStatus::where('user_id', Auth::id())->whereRoleId($studentAffairsRoleId)->first();

            $data['faculty_is_approved'] = (!is_null($faculty_is_approved)) ? $faculty_is_approved->is_cleared : false;
            $data['sport_is_approved'] = (!is_null($sport_is_approved)) ? $sport_is_approved->is_cleared : false;
            $data['library_is_approved'] = (!is_null($library_is_approved)) ? $library_is_approved->is_cleared : false;
            $data['student_affairs_is_approved'] = (!is_null($student_affairs_is_approved)) ? $student_affairs_is_approved->is_cleared : false;

//            foreach ($data['faculty_question_answers'] as $answer) {
//                dd($answer, $answer->faculty_question);
//            }
//            dd($data['faculty_question_answers']);

//            $studentTerminalLog = StudentTerminalLog::where(Constants::RQ_USER_ID, Auth::id())->latest('id')->first();
//            $data['subjects'] = $studentTerminalLog->student_terminal_log_subjects;

        }

        elseif (Auth::user()->type === Constants::DBCV_USER_TYPE_STAFF) {
            $profile = UserStaffProfile::where('user_id', Auth::id())->first();
            $data['profile'] = $profile;

            $data['roles'] = RoleStaff::where('user_id', Auth::id())->get();//->pluck(Constants::DBC_ACAD_CLASS_ID);


        }


        $path = '/dashboard_' . Auth::user()->type . '.home';
        return view($path, $data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function showDesk(Request $request)
    {
        $roleId = isset($request->query()[Constants::DBC_STAFF_ROLE_ID ]) ? $request->query()[Constants::DBC_STAFF_ROLE_ID ] : null;
        $academicSessionId = isset($request->query()[Constants::DBC_ACAD_SESS_ID ]) ? $request->query()[Constants::DBC_ACAD_SESS_ID ] : null;

        $getRoleById = Role::whereId($roleId)->first();
        if ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_FACULTY ) {
            $clLogs = FacultyClearanceLog::get()->groupBy('user_id');
        }
        elseif ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_LIBRARY ) {
            $clLogs = LibraryClearanceLog::get()->groupBy('user_id');
        }
        elseif ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_SPORT ) {
            $clLogs = SportClearanceLog::get()->groupBy('user_id');
        }
        elseif ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_STUDENT_AFFAIRS ) {
            $clLogs = StudentaffairClearanceLog::get()->groupBy('user_id');
        }


//        get class of staff from ClassStaff and then

        $data['role'] = $getRoleById;
        $data['clearance_logs'] = $clLogs;
//        dd($getRoleById);
//        $data[]
//        $data['class_students'] = $getRoleById->user_student_profiles;


        $path = '/dashboard_' . Auth::user()->type . '.clearance_log';
        return view($path, $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function showStudentResult(Request $request, $student_id)
    {

/*
        $allStudentTerminalLogIds = \App\StudentTerminalLog::all()->pluck(Constants::DBC_REF_ID);

        for ($i = 0; $i < count($allStudentTerminalLogIds); $i++) {
            $allStudentTerminalLogs = \App\StudentTerminalLog::whereId($allStudentTerminalLogIds[$i])->first();
//            dd($allStudentTerminalLogIds);
            $allClassSubjectIds = ClassSubject::where(Constants::DBC_ACAD_CLASS_ID, $allStudentTerminalLogs->class_term->academic_class_id)
                ->get()
                ->pluck(Constants::DBC_ACAD_SUBJECT_ID);
            for ($j = 0; $j < count($allClassSubjectIds); $j++) {
                echo '$allStudentTerminalLogId: ' . $allStudentTerminalLogIds[$i] . ' $allClassSubjectId: ' . $allClassSubjectIds[$j] . ' <br>';
            }
        }*/

        $studentTerminalLog = StudentTerminalLog::where(Constants::RQ_USER_ID, $student_id)->latest('id')->first();
//        dd($studentTerminalLog->student_terminal_log_subjects);
        $data['subjects'] = $studentTerminalLog->student_terminal_log_subjects;
        $data['result_owner'] = User::whereId($student_id)->whereType(Constants::DBCV_USER_TYPE_STUDENT)->first();


        $path = '/dashboard_' . Auth::user()->type . '.result';
        return view($path, $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function updateStudentResultStaff(Request $request, $student_id, $stl_subject_id)
    {
//        dd($student_id, $stl_subject_id, $request);
//        $download = isset($request->query()['download']) ? $request->query()['download'] : null;

//        $studentTerminalLog = StudentTerminalLog::whereId($stl_subject_id)->first();

        $studentTerminalLog = StudentTerminalLog::where(Constants::RQ_USER_ID, $student_id)->latest('id')->first();
        $studentTerminalLogSubject = StudentTerminalLogSubject::where('student_terminal_log_id', $studentTerminalLog->id)
            ->where(Constants::DBC_ACAD_SUBJECT_ID, $stl_subject_id)->first();
        $studentTerminalLogSubject->ca_test_score = $request->ca_test_score;
        $studentTerminalLogSubject->ca_exam_score = $request->ca_exam_score;
        $studentTerminalLogSubject->save();

        return redirect()->back()->with('success_message', 'Result updated!');
        /*
//        dd($studentTerminalLog->student_terminal_log_subjects);
        $data['subjects'] = $studentTerminalLog->student_terminal_log_subjects;
        $data['result_owner'] = User::whereId($student_id)->whereType(Constants::DBCV_USER_TYPE_STUDENT)->first();


        $path = '/dashboard_' . Auth::user()->type . '.result';
        return view($path, $data);*/
    }
}
