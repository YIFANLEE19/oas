<?php

    /*
    |-----------------------------------------------------------
    | storing constants variable
    |-----------------------------------------------------------
    */
    return [

    /*
    |-----------------------------------------------------------
    | col in table where status equal active 
    |-----------------------------------------------------------
    */
        'COL_ACTIVE' => [
            'INACTIVE' => 0,
            'ACTIVE' => 1,
        ],
    /*
    |-----------------------------------------------------------
    | isCert 0 = no 1= yes 
    |-----------------------------------------------------------
    */
    'IS_CERT' => [
        'FALSE' => 0,
        'TRUE' => 1,
    ],
    /*
    |-----------------------------------------------------------
    | applicant profile status code
    |-----------------------------------------------------------
    */
        'APPLICANT_PROFILE_STATUS_CODE' => [
            'COMPLETE_PERSONAL_PARTICULARS' => 1,
            'COMPLETE_PARENT_GUARDIAN_PARTICULARS' => 2,
            'COMPLETE_EMERGENCY_CONTACT' => 3,
            'COMPLETE_PROFILE_PICTURE' => 4,
        ],
    /*
    |-----------------------------------------------------------
    | application status code
    |-----------------------------------------------------------
    */
        'APPLICATION_STATUS_CODE' => [
            'COMPLETE_PROGRAM_SELECTION' => 1,
            'COMPLETE_ACADEMIC_DETAIL' => 2,
            'COMPLETE_STATUS_OF_HEALTH' => 3,
            'COMPLETE_AGREEMENT' => 4,
            'COMPLETE_DRAFT' => 5,
            'COMPLETE_SUPPORTING_DOCUEMENT' => 6,
            'COMPLETE_PAYMENT' => 7,

        ],
    /*
    |-----------------------------------------------------------
    | choice priority 
    |-----------------------------------------------------------
    */
    'CHOICE_PRIORITY' => [
        'FIRST_CHOICE' => 1,
        'SECOND_CHOICE' => 2,
        'THIRD_CHOICE' => 3,
    ],
    /*
    |-----------------------------------------------------------
    | profile picture resize
    |-----------------------------------------------------------
    */
        'PROFILE_PICTURE' => [
            'WIDTH' => 210,
            'HEIGHT' => 280,
            'MAXSIZE_KB' => 5120,
        ],
    /*
    |-----------------------------------------------------------
    | address type
    |-----------------------------------------------------------
    */
        'ADDRESS_TYPE' => [
            'CORRESPONDENCE' => 1,
            'PERMANENT' => 2,
        ],
    /*
    |-----------------------------------------------------------
    | identity document type
    |-----------------------------------------------------------
    */
    'IDENTITY_DOCUEMENT_TYPE' => [
        'IC_FRONT' => 1,
        'IC_BACK' => 2,
    ],
    /*
    |-----------------------------------------------------------
    | school level
    |-----------------------------------------------------------
    */
    'SCHOOL_LEVEL' => [
        'SECONDARY' => 1,
        'UPPERSECONDARY' => 2,
        'FOUNDATION' => 3,
        'DIPLOMA' => 4,
        'DEGREE' => 5,
        'PHD' => 6,
        'MASTER' =>7,
        'OTHER' => 8,
    ],
];
?>
