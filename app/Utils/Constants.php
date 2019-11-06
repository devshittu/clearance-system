<?php
/**
 * Created by PhpStorm.
 * User: c2
 * Date: 7/13/18
 * Time: 11:37 AM
 */

namespace App\Utils;


class Constants
{
    //NAME OF THE FIELDS FROM REQUEST
    public const RQ_USER_ID = 'user_id';

    //NAME OF THE COLUMNS IN THE DATABASE
    public const DBC_USER_ID = 'user_id';
    public const DBC_STAFF_ID = 'staff_id';
    public const DBC_IS_CLEARED = 'is_cleared';
    public const DBC_QUESTION_ID = 'question_id';
    public const DBC_ANSWER = 'answer';

    public const DBC_USER_DOB = 'date_of_birth';
    public const DBC_ADDRESS = 'address';
    public const DBC_PARENT_ADDRESS = 'parent_address';
    public const DBC_USER_TYPE = 'type';
    public const DBC_CODE_NAME = 'code_name';
    public const DBC_SYSTEM_NAME = 'system_name';
    public const DBC_TITLE = 'title';
    public const DBC_EXAM_SCORE = 'exam_score';
    public const DBC_IS_ADMITTED = 'is_admitted';
    public const DBC_HAS_TRANSIT = 'has_transit';
    public const DBC_EXAM_DATETIME = 'exam_datetime';
    public const DBC_ACAD_SESS_ID = 'academic_session_id';
    public const DBC_ENROLL_SESS_ID = 'enrollment_session_id';
    public const DBC_ACAD_TERM_ID = 'academic_term_id';
    public const DBC_ACAD_SUBJECT_ID = 'academic_subject_id';
    public const DBC_TERM_START_DATE = 'term_start_date';
    public const DBC_TERM_END_DATE = 'term_end_date';
    public const DBC_ACAD_CLASS_ID = 'academic_class_id';
    public const DBC_ENROLL_CLASS_ID = 'enrollment_class_id';
    public const DBC_CLASS_TERM_ID = 'class_term_id';
    public const DBC_CLASS_SUBJECT_ID = 'class_subject_id';
    public const DBC_CA_TEST_SCORE = 'ca_test_score';
    public const DBC_CA_EXAM_SCORE = 'ca_exam_score';
    public const DBC_CAN_APPLY = 'can_apply';
    public const DBC_REF_ID = 'id';
    public const DBC_REF_REG_CODE = 'reg_code';
    public const DBC_REF_CODE_NAME = 'code_name';

        public const DBCV_USER_TYPE_CANDIDATE = 'candidate';
        public const DBCV_USER_TYPE_STUDENT = 'student';
        public const DBCV_USER_TYPE_STAFF = 'staff';
        public const DBCV_USER_TYPE_ADMIN = 'admin';


    public const DBCV_GENDER_TYPE_MALE = 'male';
    public const DBCV_GENDER_TYPE_FEMALE = 'female';

    //AL: ALLOWABLE VALUE
    public const AV_USER_TYPE= [self::DBCV_USER_TYPE_CANDIDATE, self::DBCV_USER_TYPE_STUDENT,
        self::DBCV_USER_TYPE_STAFF, self::DBCV_USER_TYPE_ADMIN,];

    public const AV_GENDER_TYPE= [self::DBCV_GENDER_TYPE_MALE, self::DBCV_GENDER_TYPE_FEMALE, ];
    const DBC_AVATAR = 'avatar';
//    const AVATAR_UPLOAD_PATH = 'public/avatar/';
    const AVATAR_UPLOAD_PATH = 'public/avatar';
    const AVATAR_DOWNLOAD_PATH = 'avatar/';



    const DBC_STD_TERMINAL_LOG_ID = 'student_terminal_log_id';


    public const DBC_STAFF_CLEARANCE_ROLE = 'clearance_role';
    public const DBC_STAFF_CLEARANCE_FOR = 'clearance_for';

    public const DBCV_STAFF_ROLE_FACULTY = 'faculty';
    public const DBCV_STAFF_ROLE_LIBRARY = 'library';
    public const DBCV_STAFF_ROLE_SPORT = 'sport';
    public const DBCV_STAFF_ROLE_STUDENT_AFFAIRS = 'student_affairs';
    public const AV_STAFF_ROLES= [
        self::DBCV_STAFF_ROLE_STUDENT_AFFAIRS,
        self::DBCV_STAFF_ROLE_LIBRARY,
        self::DBCV_STAFF_ROLE_SPORT,
        self::DBCV_STAFF_ROLE_FACULTY ,
        ];

}