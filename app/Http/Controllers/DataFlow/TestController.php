<?php

namespace App\Http\Controllers\DataFlow;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public  $old_country_code = [
        // 'new_country_code' => 'old_country_code'
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

    public function index(){
        
        $country_code = $this->old_country_code[131];
        dd($country_code);

        return view('oas.test');
    }
}
