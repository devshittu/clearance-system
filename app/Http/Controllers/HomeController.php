<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use App\AcademicSession;
use App\AcademicSubject;
use App\AcademicTerm;
use App\FacultyClearanceLog;
use App\FacultyItemLog;
use App\FacultyQuestion;
use App\HealthClearanceLog;
use App\HealthItemLog;
use App\HealthQuestion;
use App\LibraryClearanceLog;
use App\LibraryItemLog;
use App\LibraryQuestion;
use App\Role;
use App\RoleStaff;
use App\ClassSubject;
use App\ClassTerm;
use App\SportClearanceLog;
use App\SportItemLog;
use App\SportQuestion;
use App\StudentaffairClearanceLog;
use App\StudentaffairItemLog;
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
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
            $data['health_questions'] = HealthQuestion::all();
//            dd( $data['health_questions']);
            $data['library_questions'] = LibraryQuestion::all();
            $data['studentaffairs_questions'] = StudentaffairQuestion::all();

            $data['faculty_item_logs'] = FacultyItemLog::where('user_id', Auth::id())->get();
            $data['library_item_logs'] = LibraryItemLog::where('user_id', Auth::id())->get();
            $data['sport_item_logs'] = SportItemLog::where('user_id', Auth::id())->get();
            $data['health_item_logs'] = HealthItemLog::where('user_id', Auth::id())->get();
            $data['studentaffairs_item_logs'] = StudentaffairItemLog::where('user_id', Auth::id())->get();

            $data['faculty_item_dirty_logs'] = FacultyItemLog::where('user_id', Auth::id())->where('is_fixed', false)->get();
            $data['library_item_dirty_logs'] = LibraryItemLog::where('user_id', Auth::id())->where('is_fixed', false)->get();
            $data['sport_item_dirty_logs'] = SportItemLog::where('user_id', Auth::id())->where('is_fixed', false)->get();
            $data['health_item_dirty_logs'] = HealthItemLog::where('user_id', Auth::id())->where('is_fixed', false)->get();
            $data['studentaffairs_item_dirty_logs'] = StudentaffairItemLog::where('user_id', Auth::id())->where('is_fixed', false)->get();

//            dd($data['studentaffairs_item_logs']);
            $facultyQuestionAnswers = FacultyClearanceLog::where('user_id', Auth::id())->get()->toArray();
            $data['faculty_question_answers'] = collect( array_column($facultyQuestionAnswers, 'answer', 'question_id'));

            $libraryQuestionAnswers = LibraryClearanceLog::where('user_id', Auth::id())->get()->toArray();
            $data['library_question_answers'] = collect( array_column($libraryQuestionAnswers, 'answer', 'question_id'));

            $sportQuestionAnswers = SportClearanceLog::where('user_id', Auth::id())->get()->toArray();
            $data['sport_question_answers'] = collect( array_column($sportQuestionAnswers, 'answer', 'question_id'));

            $healthQuestionAnswers = HealthClearanceLog::where('user_id', Auth::id())->get()->toArray();
            $data['health_question_answers'] = collect( array_column($healthQuestionAnswers, 'answer', 'question_id'));

            $studentaffairQuestionAnswers = StudentaffairClearanceLog::where('user_id', Auth::id())->get()->toArray();
            $data['studentaffair_question_answers'] = collect( array_column($studentaffairQuestionAnswers, 'answer', 'question_id'));

            $facultyRoleId = Role::where('code_name', 'faculty')->first()->id;
            $faculty_is_approved = StudentStaffClearanceStatus::where('user_id', Auth::id())->whereRoleId($facultyRoleId)->first();
            $sportRoleId = Role::where('code_name', 'sport')->first()->id;
            $sport_is_approved = StudentStaffClearanceStatus::where('user_id', Auth::id())->whereRoleId($sportRoleId)->first();
            $healthRoleId = Role::where('code_name', 'health')->first()->id;
            $health_is_approved = StudentStaffClearanceStatus::where('user_id', Auth::id())->whereRoleId($healthRoleId)->first();
            $libraryRoleId = Role::where('code_name', 'library')->first()->id;
            $library_is_approved = StudentStaffClearanceStatus::where('user_id', Auth::id())->whereRoleId($libraryRoleId)->first();
            $studentAffairsRoleId = Role::where('code_name', 'student_affairs')->first()->id;
            $student_affairs_is_approved = StudentStaffClearanceStatus::where('user_id', Auth::id())->whereRoleId($studentAffairsRoleId)->first();

            $data['faculty_is_approved'] = (!is_null($faculty_is_approved)) ? $faculty_is_approved->is_cleared : false;
            $data['sport_is_approved'] = (!is_null($sport_is_approved)) ? $sport_is_approved->is_cleared : false;
            $data['library_is_approved'] = (!is_null($library_is_approved)) ? $library_is_approved->is_cleared : false;
            $data['health_is_approved'] = (!is_null($health_is_approved)) ? $health_is_approved->is_cleared : false;
            $data['student_affairs_is_approved'] = (!is_null($student_affairs_is_approved)) ? $student_affairs_is_approved->is_cleared : false;

            $data['faculty_is_declined'] = (!is_null($faculty_is_approved)) ? $faculty_is_approved->is_declined : false;
            $data['sport_is_declined'] = (!is_null($sport_is_approved)) ? $sport_is_approved->is_declined : false;
            $data['library_is_declined'] = (!is_null($library_is_approved)) ? $library_is_approved->is_declined : false;
            $data['health_is_declined'] = (!is_null($health_is_approved)) ? $health_is_approved->is_declined : false;
            $data['student_affairs_is_declined'] = (!is_null($student_affairs_is_approved)) ? $student_affairs_is_approved->is_declined : false;

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
    public function showStudentReason(Request $request, $role_id)
    {
//        $roleId = isset($request->query()[Constants::DBC_STAFF_ROLE_ID ]) ? $request->query()[Constants::DBC_STAFF_ROLE_ID ] : null;
//        $academicSessionId = isset($request->query()[Constants::DBC_ACAD_SESS_ID ]) ? $request->query()[Constants::DBC_ACAD_SESS_ID ] : null;

        $getRoleById = Role::whereId($role_id)->first();
        if ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_FACULTY ) {
            $clLogs = FacultyClearanceLog::get()->groupBy('user_id');
            $itemLogs = FacultyItemLog::get()->groupBy('user_id');
        }
        elseif ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_LIBRARY ) {
            $clLogs = LibraryClearanceLog::get()->groupBy('user_id');
            $itemLogs = LibraryItemLog::get()->groupBy('user_id');
        }
        elseif ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_SPORT ) {
            $clLogs = SportClearanceLog::get()->groupBy('user_id');
            $itemLogs = SportItemLog::get()->groupBy('user_id');
        }
        elseif ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_HEALTH ) {
            $clLogs = HealthClearanceLog::get()->groupBy('user_id');
            $itemLogs = HealthItemLog::get()->groupBy('user_id');
        }
        elseif ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_STUDENT_AFFAIRS ) {
            $clLogs = StudentaffairClearanceLog::get()->groupBy('user_id');
            $itemLogs = StudentaffairItemLog::get()->groupBy('user_id');
        }
//        else{ return NotFoundHttpException() ;}


//        get class of staff from ClassStaff and then

        $data['role'] = $getRoleById;
        $data['clearance_logs'] = $clLogs;
        $data['item_logs'] = isset($itemLogs[Auth::id()]) ? $itemLogs[Auth::id()] : [];
//        dd($itemLogs);
//        $data[]
//        $data['class_students'] = $getRoleById->user_student_profiles;


        $path = '/dashboard_' . Auth::user()->type . '.student_item_dirty_log';
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
            $itemLogs = FacultyItemLog::get()->groupBy('user_id');
            $dirtyLogs = FacultyItemLog::where('user_id', Auth::id())->where('is_fixed', false)->get();
        }
        elseif ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_LIBRARY ) {
            $clLogs = LibraryClearanceLog::get()->groupBy('user_id');
            $itemLogs = LibraryItemLog::get()->groupBy('user_id');
            $dirtyLogs = FacultyItemLog::where('user_id', Auth::id())->where('is_fixed', false)->get();
        }
        elseif ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_SPORT ) {
            $clLogs = SportClearanceLog::get()->groupBy('user_id');
            $itemLogs = SportItemLog::get()->groupBy('user_id');
            $dirtyLogs = FacultyItemLog::where('user_id', Auth::id())->where('is_fixed', false)->get();
        }
        elseif ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_HEALTH ) {
            $clLogs = HealthClearanceLog::get()->groupBy('user_id');
            $itemLogs = HealthItemLog::get()->groupBy('user_id');
            $dirtyLogs = FacultyItemLog::where('user_id', Auth::id())->where('is_fixed', false)->get();
        }
        elseif ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_STUDENT_AFFAIRS ) {
            $clLogs = StudentaffairClearanceLog::get()->groupBy('user_id');
            $itemLogs = StudentaffairItemLog::get()->groupBy('user_id');
            $dirtyLogs = FacultyItemLog::where('user_id', Auth::id())->where('is_fixed', false)->get();
        }


//        get class of staff from ClassStaff and then

        $data['role'] = $getRoleById;
        $data['clearance_logs'] = $clLogs;
        $data['item_logs'] = $itemLogs;
//        $data['dirty_logs'] = $dirtyLogs;

//        dd($itemLogs);
//        dump($getRoleById, $itemLogs);
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
    public function showStudentLocker(Request $request, $student_id)
    {
        $roleId = isset($request->query()[Constants::DBC_STAFF_ROLE_ID ]) ? $request->query()[Constants::DBC_STAFF_ROLE_ID ] : null;
        $academicSessionId = isset($request->query()[Constants::DBC_ACAD_SESS_ID ]) ? $request->query()[Constants::DBC_ACAD_SESS_ID ] : null;

        $getRoleById = Role::whereId($roleId)->first();
        if ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_FACULTY ) {
            $clLogs = FacultyClearanceLog::get()->groupBy('user_id');
            $itemLogs = FacultyItemLog::get()->groupBy('user_id');
        }
        elseif ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_LIBRARY ) {
            $clLogs = LibraryClearanceLog::get()->groupBy('user_id');
            $itemLogs = LibraryItemLog::get()->groupBy('user_id');
        }
        elseif ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_SPORT ) {
            $clLogs = SportClearanceLog::get()->groupBy('user_id');
            $itemLogs = SportItemLog::get()->groupBy('user_id');
        }
        elseif ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_HEALTH ) {
            $clLogs = HealthClearanceLog::get()->groupBy('user_id');
            $itemLogs = HealthItemLog::get()->groupBy('user_id');
        }
        elseif ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_STUDENT_AFFAIRS ) {
            $clLogs = StudentaffairClearanceLog::get()->groupBy('user_id');
            $itemLogs = StudentaffairItemLog::get()->groupBy('user_id');
        }


//        get class of staff from ClassStaff and then

        $data['user'] = User::whereId($student_id)->first();
        $data['role'] = $getRoleById;
        $data['clearance_logs'] = $clLogs[$student_id];
        $data['item_logs'] = isset($itemLogs[$student_id]) ? $itemLogs[$student_id]: [];
//        dump($getRoleById, $itemLogs);
//        $data[]
//        $data['class_students'] = $getRoleById->user_student_profiles;


        $path = '/dashboard_' . Auth::user()->type . '.student_item_log';
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
