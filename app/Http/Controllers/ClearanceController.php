<?php

namespace App\Http\Controllers;

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
use App\SportClearanceLog;
use App\SportItemLog;
use App\SportQuestion;
use App\StudentaffairClearanceLog;
use App\StudentaffairItemLog;
use App\StudentaffairQuestion;
use App\StudentStaffClearanceStatus;
use App\Utils\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClearanceController extends Controller
{
    function apply_faculty_clearance(Request $request)
    {
        $newInputArray = [];
        $fromRequestInputs = $request->all();
        $next = $request->get('next');
//        return redirect()->route('home', ['next' =>  $next])->with('success_message', 'Application submitted for Faculty clearance!.');

        unset($fromRequestInputs['_token']);
        unset($fromRequestInputs['next']);
//        dd($fromRequestInputs);
        foreach ($fromRequestInputs as $key => $fromRequestInput) {
            $question = FacultyQuestion::where(Constants::DBC_REF_CODE_NAME, $key)
                ->first();
            $newInputArray[] = array('code_name' => $key,
                'id' => $question->id,
                'answer' => $fromRequestInput);
        }

        foreach ($newInputArray as $inputData) {
            $checkExist = FacultyClearanceLog::where('user_id', Auth::id())->where('question_id', $inputData['id'])->first();
            if (is_null($checkExist)) {
                $clearance = new FacultyClearanceLog;
                $clearance->user_id = Auth::id();
                $clearance->question_id = $inputData['id'];
                $clearance->answer = $inputData['answer'];
                $clearance->save();
            } else {
                $checkExist->answer = $inputData['answer'];
                $checkExist->save();
            }
        }

        return redirect()->route('home', ['next' =>  $next])->with('success_message', 'Application submitted for Faculty clearance!.');

    }

    function apply_library_clearance(Request $request)
    {
        $newInputArray = [];
        $fromRequestInputs = $request->all();
        $next = $request->get('next');
//        return redirect()->route('home', ['next' =>  $next])->with('success_message', 'Application submitted for Library clearance!.');

        unset($fromRequestInputs['_token']);
        unset($fromRequestInputs['next']);
        foreach ($fromRequestInputs as $key => $fromRequestInput) {
            $question = LibraryQuestion::where(Constants::DBC_REF_CODE_NAME, $key)
                ->first();
            $newInputArray[] = array('code_name' => $key,
                'id' => $question->id,
                'answer' => $fromRequestInput);
        }

        foreach ($newInputArray as $inputData) {
            $checkExist = LibraryClearanceLog::where('user_id', Auth::id())->where('question_id', $inputData['id'])->first();
            if (is_null($checkExist)) {
                $clearance = new LibraryClearanceLog;
                $clearance->user_id = Auth::id();
                $clearance->question_id = $inputData['id'];
                $clearance->answer = $inputData['answer'];
                $clearance->save();
            } else {
                $checkExist->answer = $inputData['answer'];
                $checkExist->save();
            }
        }

        return redirect()->route('home', ['next' =>  $next])->with('success_message', 'Application submitted for Library clearance!.');

    }

    function apply_sport_clearance(Request $request)
    {
        $newInputArray = [];
        $fromRequestInputs = $request->all();
        $next = $request->get('next');

        unset($fromRequestInputs['_token']);
        unset($fromRequestInputs['next']);
        foreach ($fromRequestInputs as $key => $fromRequestInput) {
            $question = SportQuestion::where(Constants::DBC_REF_CODE_NAME, $key)
                ->first();
            $newInputArray[] = array('code_name' => $key,
                'id' => $question->id,
                'answer' => $fromRequestInput);
        }

        foreach ($newInputArray as $inputData) {
            $checkExist = SportClearanceLog::where('user_id', Auth::id())->where('question_id', $inputData['id'])->first();
            if (is_null($checkExist)) {
                $clearance = new SportClearanceLog;
                $clearance->user_id = Auth::id();
                $clearance->question_id = $inputData['id'];
                $clearance->answer = $inputData['answer'];
                $clearance->save();
            } else {
                $checkExist->answer = $inputData['answer'];
                $checkExist->save();
            }
        }

        return redirect()->route('home', ['next' =>  $next])->with('success_message', 'Application submitted for Sport clearance!.');

    }

    function apply_health_clearance(Request $request)
    {
        $newInputArray = [];
        $fromRequestInputs = $request->all();
        $next = $request->get('next');

        unset($fromRequestInputs['_token']);
        unset($fromRequestInputs['next']);
        foreach ($fromRequestInputs as $key => $fromRequestInput) {
            $question = HealthQuestion::where(Constants::DBC_REF_CODE_NAME, $key)
                ->first();
            $newInputArray[] = array('code_name' => $key,
                'id' => $question->id,
                'answer' => $fromRequestInput);
        }

        foreach ($newInputArray as $inputData) {
            $checkExist = HealthClearanceLog::where('user_id', Auth::id())->where('question_id', $inputData['id'])->first();
            if (is_null($checkExist)) {
                $clearance = new HealthClearanceLog;
                $clearance->user_id = Auth::id();
                $clearance->question_id = $inputData['id'];
                $clearance->answer = $inputData['answer'];
                $clearance->save();
            } else {
                $checkExist->answer = $inputData['answer'];
                $checkExist->save();
            }
        }

        return redirect()->route('home', ['next' =>  $next])->with('success_message', 'Application submitted for Health clearance!.');

    }

    function apply_studentaffairs_clearance(Request $request)
    {
        $newInputArray = [];
        $fromRequestInputs = $request->all();
        $next = $request->get('next');

        unset($fromRequestInputs['_token']);
        unset($fromRequestInputs['next']);
        foreach ($fromRequestInputs as $key => $fromRequestInput) {
            $question = StudentaffairQuestion::where(Constants::DBC_REF_CODE_NAME, $key)
                ->first();
            $newInputArray[] = array('code_name' => $key,
                'id' => $question->id,
                'answer' => $fromRequestInput);
        }

        foreach ($newInputArray as $inputData) {
            $checkExist = StudentaffairClearanceLog::where('user_id', Auth::id())->where('question_id', $inputData['id'])->first();
            if (is_null($checkExist)) {
                $clearance = new StudentaffairClearanceLog;
                $clearance->user_id = Auth::id();
                $clearance->question_id = $inputData['id'];
                $clearance->answer = $inputData['answer'];
                $clearance->save();
            } else {
                $checkExist->answer = $inputData['answer'];
                $checkExist->save();
            }
        }

        return redirect()->route('home', ['next' =>  $next])->with('success_message', 'Application submitted for Student Affairs clearance!.');

    }


    public function clearStudentInRoleByStaff(Request $request, $student_id, $role_id)
    {

        $checkStatus = StudentStaffClearanceStatus::where('staff_id', Auth::id())->where('user_id', $student_id)->where('role_id', $role_id)->first();
//        dd($checkStatus);
        $getClearanceStatus = !is_null($checkStatus) ? $checkStatus->is_cleared : false;
        if ($checkStatus) {
            $checkStatus->is_cleared = true;
            $checkStatus->is_declined = null;
            $checkStatus->save();
        } else {
            $newClearance = new StudentStaffClearanceStatus;
            $newClearance->is_cleared = true;
            $newClearance->is_declined = null;
            $newClearance->staff_id = Auth::id();
            $newClearance->role_id = $request->role_id;
            $newClearance->user_id = $request->student_id;
            $newClearance->save();
        }

        return redirect()->back()->with('success_message', 'Student cleared!');
    }
    public function unclearStudentInRoleByStaff(Request $request, $student_id, $role_id)
    {

        $checkStatus = StudentStaffClearanceStatus::where('staff_id', Auth::id())->where('user_id', $student_id)->where('role_id', $role_id)->first();
        $getClearanceStatus = !is_null($checkStatus) ? $checkStatus->is_cleared : false;
        if ($checkStatus) {
            $checkStatus->is_cleared = null;
            $checkStatus->is_declined = true;
            $checkStatus->save();
        } else {
            $newClearance = new StudentStaffClearanceStatus;
            $newClearance->is_cleared = null;
            $newClearance->is_declined = true;
//            dd($newClearance);
            $newClearance->staff_id = Auth::id();
            $newClearance->role_id = $request->role_id;
            $newClearance->user_id = $request->student_id;
            $newClearance->save();
        }

        return redirect()->back()->with('failure_message', 'Student clearance declined!');
    }

    public function fixStudentInRoleItemByStaff(Request $request, $student_id, $role_id, $item_log_id)
    {

//        collect roles to distinctly differentiate them.

        $getRoleById = Role::whereId($role_id)->first();
//        dd ($getRoleById->code_name);

        $getRoleById = Role::whereId($role_id)->first();
        if ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_FACULTY ) {
            $newItemLog = new FacultyItemLog;
//            $getItemLog = FacultyItemLog::get()->groupBy('user_id');
            $getItemLog = FacultyItemLog::whereId($item_log_id)
                ->where('user_id', $student_id)->first();
        }
        elseif ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_LIBRARY ) {
            $newItemLog = new LibraryItemLog;
            $getItemLog = LibraryItemLog::whereId($item_log_id)
                ->where('user_id', $student_id)->first();
        }
        elseif ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_SPORT ) {
            $newItemLog = new SportItemLog;
            $getItemLog = SportItemLog::whereId($item_log_id)
                ->where('user_id', $student_id)->first();
        }
        elseif ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_HEALTH ) {
            $newItemLog = new HealthItemLog;
            $getItemLog = HealthItemLog::whereId($item_log_id)
                ->where('user_id', $student_id)->first();
        }
        elseif ($getRoleById->code_name == Constants::DBCV_STAFF_ROLE_STUDENT_AFFAIRS ) {
            $newItemLog = new StudentaffairItemLog;
            $getItemLog = StudentaffairItemLog::whereId($item_log_id)
                ->where('user_id', $student_id)->first();
        }

//        dd($getItemLog, '$student_id:// '. $student_id, '$role_id:// '.$role_id, '$item_log_id:// '.$item_log_id);

//        $checkStatus = StudentStaffClearanceStatus::where('staff_id', Auth::id())->where('user_id', $student_id)->where('role_id', $role_id)->first();
        $getItemLogStatus = !is_null($getItemLog) ? $getItemLog->is_fixed : false;
//        if ($getItemLogStatus) {
            $getItemLog->is_fixed = true;
            $getItemLog->save();
//        }
        /* else {
            $newItemLog->is_cleared = true;
            $newItemLog->staff_id = Auth::id();
            $newItemLog->user_id = $request->student_id;
            $newItemLog->save();
        }*/

        return redirect()->back()->with('success_message', 'School\'s '.$getRoleById->code_name.' item fixed/returned!');
    }
}
