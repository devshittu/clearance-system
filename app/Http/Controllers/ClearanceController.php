<?php

namespace App\Http\Controllers;

use App\FacultyClearanceLog;
use App\FacultyQuestion;
use App\LibraryClearanceLog;
use App\LibraryQuestion;
use App\SportClearanceLog;
use App\SportQuestion;
use App\StudentaffairClearanceLog;
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
        $getClearanceStatus = !is_null($checkStatus) ? $checkStatus->is_cleared : false;
        if ($getClearanceStatus) {
            $checkStatus->is_cleared = true;
            $checkStatus->save();
        } else {
            $newClearance = new StudentStaffClearanceStatus;
            $newClearance->is_cleared = true;
            $newClearance->staff_id = Auth::id();
            $newClearance->role_id = $request->role_id;
            $newClearance->user_id = $request->student_id;
            $newClearance->save();
        }

        return redirect()->back()->with('success_message', 'Student cleared!');
    }
}
