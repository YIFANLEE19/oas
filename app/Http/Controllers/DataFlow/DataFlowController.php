<?php

namespace App\Http\Controllers\DataFlow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataFlowController extends Controller
{
    /*
    |
    |-----------------------------------------------------------
    | Data flow mapping 
    |
    | $country_code = $this->getOldCountryCode[$r->HtmlInputFieldNameAttribute];
    | 
    |-----------------------------------------------------------
    |
    */

    public  $getOldCountryCode = [
        '131' => '060',
        '200' => '065',
        '101' => '062',
        '46' => '086',
        '34' => '673',
        '217' => '886',
        '173' => '063',
        '149' => '095',
        '166' => '092',
        '221' => '066',
        '97' => '852',
        '209' => '094',
        '14' => '61',
        '156' => '001',
        '159' => '234',
        '110' => '081',
        '22' => '32',
        '194' => '966',
        '207' => '082',
        '38' => '855',
        '243' => '84',
        '19' => '880',
        '100' => '091',
        '246' => '967',
        '235' => '44',
        '107' => '039',
        '92' => '245',
        '236' => '01',
        '161' => '0',
    ];

    public $getOldNationalityCode = [
        '131' => '060',
        '205' => '065',
        '101' => '062',
        '46' => '086',
        '34' => '673',
        '222' => '886',
        '177' => '063',
        '149' => '095',
        '168' => '092',
        '212' => '082',
    ];

    public $getOldRaceCode = [
        '1' => '01',
        '2' => '02',
        '3' => '03',
        '4' => '17',
    ];

    public $getOldReligionCode = [
        '1' => '04',
        '2' => '05',
        '3' => '01',
        '4' => '07',
        '5' => '10',
        '6' => '03',
        '8' => '11',
        '10' => '02',
        '11' => '08',
    ];

    public $getOldGenderCode = [
        '1' => 'M',
        '2' => 'F',
    ];

    public function index(){
        $country_code = $this->getOldCountryCode[131];
        dd($country_code);
        return view('oas.test', compact('$country_code'));
    }
}
