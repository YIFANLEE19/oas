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
    | application status code
    |-----------------------------------------------------------
    */
        'APPLICATION_STATUS_CODE' => [
            'NEW_USER' => 0, // unused in database
            'COMPLETE_PERSONAL_PARTICULARS' => 1,
            'COMPLETE_PARENT_GUARDIAN_PARTICULARS' => 2,
            'COMPLETE_EMERGENCY_CONTACT' => 3,
            'COMPLETE_PROFILE_PICTURE' => 4,
            'COMPLETE_PROGRAM_SELECTION' => 5,
            'COMEPLTE_ACADEMIC_RECORD' => 6,
            'COMPLETE_STATUS_OF_HEALTH' => 7,
            'COMPLETE_AGREEMENT' => 8,
            'COMPLETE_DRAFT' => 9,
            'COMPLETE_SUPPORTING_DOCUEMENT' => 10,
            'COMPLETE_PAYMENT' => 11,

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


    ];

?>
