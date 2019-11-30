<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    // middleware auth is to guard against unauthorized access
    Route::get('settings',  'SettingsController@index')->name('settings');
    Route::post('settings/update',  'SettingsController@update')->name('settings_update');
//    Route::post('settings/exam/update',  'SettingsController@exam_update')->name('settings_exams_update');
    Route::post('user/candidate/score/{user_id}/update',  'UsersController@candidate_score_update')->name('update_candidate_score');
    Route::post('faculty/clearance/apply',  'ClearanceController@apply_faculty_clearance')->name('apply_faculty_clearance');
    Route::post('library/clearance/apply',  'ClearanceController@apply_library_clearance')->name('apply_library_clearance');
    Route::post('sport/clearance/apply',  'ClearanceController@apply_sport_clearance')->name('apply_sport_clearance');
    Route::post('health/clearance/apply',  'ClearanceController@apply_health_clearance')->name('apply_health_clearance');
    Route::post('studentaffairs/clearance/apply',  'ClearanceController@apply_studentaffairs_clearance')->name('apply_studentaffairs_clearance');
    Route::get('user/staff/show_desk',  'HomeController@showDesk')->name('show_desk');
    Route::get('user/staff/show_student_locker/{student_id}',  'HomeController@showStudentLocker')->name('show_student_locker');
    Route::post('user/staff/fix_student_item/{student_id}/{role_id}/{item_log_id}',  'ClearanceController@fixStudentInRoleItemByStaff')->name('fix_student_in_role_item_by_staff');
    Route::post('user/staff/clear_student/{student_id}/{role_id}',  'ClearanceController@clearStudentInRoleByStaff')->name('clear_student_in_role_by_staff');
    Route::post('user/staff/unclear_student/{student_id}/{role_id}',  'ClearanceController@unclearStudentInRoleByStaff')->name('unclear_student_in_role_by_staff');
    Route::get('user/student/show_reason/{role_id}',  'HomeController@showStudentReason')->name('show_student_reason');
    Route::get('user/student/show_ack_slip',  'UsersController@showAckSlip')->name('show_ack_slip');

    Route::post('user/avatar/update',  'UsersController@avatar_update')->name('update_avatar');

    Route::post('user/candidate/accept_admission',  'UsersController@candidateAcceptAdmission')->name('accept_admission');
    Route::post('user/student/accept_terminal_migration',  'UsersController@studentAcceptMigration')->name('accept_terminal_migration');
    Route::get('user/student/show_result',  'UsersController@showResult')->name('show_student_result');
    Route::get('user/student/show_old_result',  'UsersController@showOldResult')->name('show_student_old_result');
    Route::get('user/student/show_student_result_past/',  'UsersController@listStudentResultPast')->name('show_student_result_past');
    Route::get('user/staff/show_class',  'HomeController@showClass')->name('show_class');
    Route::post('user/staff/update_student_result/{student_id}/{stl_subject_id}',  'HomeController@updateStudentResultStaff')->name('update_student_result_staff');
    Route::post('user/admin/delete_user/{user_id}',  'UsersController@deleteUserAdmin')->name('delete_user');
    Route::post('user/admin/assign_duty/{user_id}',  'UsersController@assignDutyToStaffAdmin')->name('assign_duty_to_staff_admin');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
