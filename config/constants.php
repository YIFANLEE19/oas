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
    |
    | application status                   | code
    | new user                             |  0
    | complete personal particulars        |  1
    | complete parent/guardian particulars |  2
    | complete emergency contact           |  3
    | complete profile picture             |  4
    |
    */
        'APPLICATION_STATUS_CODE' => [
            'NEW_USER' => 0,
            'COMPLETE_PERSONAL_PARTICULARS' => 1,
            'COMPLETE_PARENT_GUARDIAN_PARTICULARS' => 2,
            'COMPLETE_EMERGENCY_CONTACT' => 3,
            'COMPLETE_PROFILE_PICTURE' => 4,
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
