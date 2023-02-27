<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form</title>
    <style>
        .choice0{
            position: absolute;
            height: 15px;
            left: 155px;
            top: 190px;
            
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .choice1{
            position: absolute;
            height: 15px;
            left: 155px;
            top: 212px;
            
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .choice2{
            position: absolute;
            height: 15px;
            left: 155px;
            top: 230px;
            
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .enName{
            position: absolute;
            height: 15px;
            left: 100px;
            top: 295px;
            
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
            text-transform: capitalize;
        }
        .ic{
            position: absolute;
            height: 15px;
            left: 100px;
            top: 320px;
            
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .race{
            position: absolute;
            height: 15px;
            left: 100px;
            top: 352px;
            
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .isMale{
            position: absolute;
            height: 15px;
            left: 395px;
            top: 353px;
            
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .isFemale{
            position: absolute;
            height: 15px;
            left: 453px;
            top: 353px;
            
            font-family: 'Inter';
            font-style: normal;
            font-size: 12px;
            font-weight: 700;
            line-height: 15px;
        }
        .religion{
            position: absolute;
            height: 15px;
            left: 380px;
            top: 379px;
            
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .nationality{
            position: absolute;
            height: 15px;
            left: 100px;
            top: 379px;
            
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .birthDate{
            position: absolute;
            height: 15px;
            left: 380px;
            top: 406px;
            
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .pob{
            position: absolute;
            height: 15px;
            left: 100px;
            top: 406px;
            
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .age{
            position: absolute;
            height: 15px;
            left: 100px;
            top: 435px;
            
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .isSingle{
            position: absolute;
            width: 5px;
            height: 15px;
            left: 217px;
            top: 435px;
            
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .isMarried{
            position: absolute;
            width: 5px;
            height: 15px;
            left: 285px;
            top: 435px;
            
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .telHp{
            position: absolute;
            width: 5px;
            height: 15px;
            left: 415px;
            top: 434px;
            
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .telH{
            position: absolute;
            width: 5px;
            height: 15px;
            left: 100px;
            top: 462px;
            
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .email{
            position: absolute;
            width: 30px;
            height: 15px;
            left: 355px;
            top: 460px;
            
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .profilePicture{
            position: absolute;
            width: 72px;
            height: 89px;
            left: 495px;
            top: 63px;
        }
        .intakeYearMonth{
            position: absolute;
            width: 41px;
            height: 15px;
            left: 65px;
            top: 125px;
            
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .cAddress{
            position: absolute;
            width: 424px;
            height: 42px;
            left: 162px;
            top: 487px;
            
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 21px;
        }
        .pEnName{
            position: absolute;
            height: 15px;
            left: 100px;
            top: 559px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        } 
        .pIc{
            position: absolute;
            height: 15px;
            left: 100px;
            top: 589px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        } .pRelationship{
            position: absolute;
            height: 15px;
            left: 390px;
            top: 619px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        } 
        .pNationality{
            position: absolute;
            height: 15px;
            left: 100px;
            top: 649px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        } 
        .pOccupation{
            position: absolute;
            height: 15px;
            left: 390px;
            top: 649px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        } 
        .income{
            position: absolute;
            height: 15px;
            left: 110px;
            top: 619px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        } .pTelHp{
            position: absolute;
            height: 15px;
            left: 100px;
            top: 680px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        } 
        .pEmail{
            position: absolute;
            height: 15px;
            left: 390px;
            top: 680px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .eName1{
            position: absolute;
            height: 15px;
            left: 145px;
            top: 730px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .eRelationship1{
            position: absolute;
            height: 15px;
            left: 145px;
            top: 750px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .eTelHp1{
            position: absolute;
            height: 15px;
            left: 427px;
            top: 750px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .eName2{
            position: absolute;
            height: 15px;
            left: 145px;
            top: 776px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .eRelationship2{
            position: absolute;
            height: 15px;
            left: 145px;
            top: 800px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .eTelHp2{
            position: absolute;
            height: 15px;
            left: 427px;
            top: 800px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .secSchool{
            position: absolute;
            width: 192px;
            height: 30px;
            left: 125px;
            top: 930px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .secYear{
            position: absolute;
            height: 13px;
            left: 472px;
            top: 930px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 11px;
            line-height: 13px;
        }
        .hYes1{
            position: absolute;
            height: 15px;
            left: 315px;
            top: 1150px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hYes2{
            position: absolute;
            height: 15px;
            left: 315px;
            top: 1168px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hYes3{
            position: absolute;
            height: 15px;
            left: 315px;
            top: 1184px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hYes4{
            position: absolute;
            height: 15px;
            left: 315px;
            top: 1200px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hYes5{
            position: absolute;
            height: 15px;
            left: 315px;
            top: 1215px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px; 
        }
        .hYes6{
            position: absolute;
            height: 15px;
            left: 315px;
            top: 1233px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hYes7{
            position: absolute;
            height: 15px;
            left: 315px;
            top: 1250px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hYes8{
            position: absolute;
            height: 15px;
            left: 315px;
            top: 1266px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hYes9{
            position: absolute;
            height: 15px;
            left: 315px;
            top: 1283px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hYes10{
            position: absolute;
            height: 15px;
            left: 315px;
            top: 1298px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hYes11{
            position: absolute;
            height: 15px;
            left: 315px;
            top: 1314px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hYes12{
            position: absolute;
            height: 15px;
            left: 315px;
            top: 1331px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hNo1{
            position: absolute;
            height: 15px;
            left: 349px;
            top: 1150px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hNo2{
            position: absolute;
            height: 15px;
            left: 349px;
            top: 1168px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hNo3{
            position: absolute;
            height: 15px;
            left: 349px;
            top: 1184px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hNo4{
            position: absolute;
            height: 15px;
            left: 349px;
            top: 1200px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hNo5{
            position: absolute;
            height: 15px;
            left: 349px;
            top: 1215px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hNo6{
            position: absolute;
            height: 15px;
            left: 349px;
            top: 1233px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hNo7{
            position: absolute;
            height: 15px;
            left: 349px;
            top: 1250px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hNo8{
            position: absolute;
            height: 15px;
            left: 349px;
            top: 1266px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hNo9{
            position: absolute;
            height: 15px;
            left: 349px;
            top: 1283px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hNo10{
            position: absolute;
            height: 15px;
            left: 349px;
            top: 1298px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hNo11{
            position: absolute;
            height: 15px;
            left: 349px;
            top: 1314px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .hNo12{
            position: absolute;
            height: 15px;
            left: 349px;
            top: 1331px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 15px;
        }
        .h1Remark{
            position: absolute;
            width: 209px;
            height: 17px;
            left: 380px;
            top: 1150px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .h2Remark{
            position: absolute;
            width: 209px;
            height: 17px;
            left: 380px;
            top: 1168px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .h3Remark{
            position: absolute;
            width: 209px;
            height: 17px;
            left: 380px;
            top: 1184px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;  
        }
        .h4Remark{
            position: absolute;
            width: 209px;
            height: 17px;
            left: 380px;
            top: 1200px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .h5Remark{
            position: absolute;
            width: 209px;
            height: 17px;
            left: 380px;
            top: 1215px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;  
        }
        .h6Remark{
            position: absolute;
            width: 209px;
            height: 17px;
            left: 380px;
            top: 1233px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .h7Remark{
            position: absolute;
            width: 209px;
            height: 17px;
            left: 380px;
            top: 1250px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .h8Remark{
            position: absolute;
            width: 209px;
            height: 17px;
            left: 380px;
            top: 1266px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .h9Remark{
            position: absolute;
            width: 209px;
            height: 17px;
            left: 380px;
            top: 1283px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px; 
        }
        .h10Remark{
            position: absolute;
            width: 209px;
            height: 17px;
            left: 380px;
            top: 1298px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .h11Remark{
            position: absolute;
            width: 209px;
            height: 17px;
            left: 380px;
            top: 1314px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .h12Remark{
            position: absolute;
            width: 209px;
            height: 17px;
            left: 380px;
            top: 1331px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .refundPolicySignature{
            position: absolute;
            height: 15px;
            left: 99px;
            top: 1559px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .refundPolicyIc{
            position: absolute;
            height: 15px;
            left: 391px;
            top: 1559px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .refundPolicyDate{
            position: absolute;
            height: 15px;
            left: 413px;
            top: 1524px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .sheSignature{
            position: absolute;
            height: 15px;
            left: 83px;
            top: 1900px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
        .sheDate{
            position: absolute;
            height: 15px;
            left: 413px;
            top: 1880px;

            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 15px;
        }
    </style>
</head>
<body>
        <img src="/images/form-template/form-part1.png" alt=""><br><br>
        <img src="/images/form-template/form-part2.png" alt=""><br><br><br>
        <img src="/images/form-template/form-part3.png" alt=""><br>
    {{-- data --}}
    <p class="intakeYearMonth">{{ $data['getSelectedCourses'][0]->programmeRecord['semesterYearMapping']->semester['semester'].' '.$data['getSelectedCourses'][0]->programmeRecord['semesterYearMapping']->year }}</p>
    <img src="{{ Storage::url('images/profile_picture/picture63ef3ac260a653.80920012/picture_lim ko pi_20230217162828_guy.jfif') }}" class="profilePicture">
    @for ($i = 0; $i < count($data['getSelectedCourses']); $i++)
        <p class="choice<?php echo $i; ?>">{{ $data['getSelectedCourses'][$i]->programmeRecord['programme']->en_name }}</p>
    @endfor
    <p class="enName">{{ $data['userDetail']->en_name }}</p>
    <p class="ic">{{ $data['userDetail']->ic }}</p>
    <p class="race">{{ $data['applicantProfile']->race['name'] }}</p>
    @if ($data['applicantProfile']->gender['name'] == 'Male')
        <p class="isMale">/</p>
    @elseif($data['applicantProfile']->gender['name'] == 'Female')
        <p class="isFemale">/</p>
    @endif
    <p class="religion">{{ $data['applicantProfile']->religion['name'] }}</p>
    <p class="nationality">{{ $data['applicantProfile']->nationality['name'] }}</p>
    <p class="birthDate">{{ $data['applicantProfile']->birth_date }}</p>
    <p class="pob">{{ $data['applicantProfile']->place_of_birth }}</p>
    <p class="age">{{ $data['age'] }}</p>
    @if ($data['applicantProfile']->marital_id == '1')
        <p class="isSingle">/</p>
    @elseif($data['applicantProfile']->marital_id == '2')
        <p class="isMarried">/</p>
    @endif
    <p class="telHp">{{ $data['userDetail']->tel_hp }}</p>
    @if ($data['userDetail']->tel_h != null)
        <p class="telH">{{ $data['userDetail']->tel_h }}</p>
    @endif
    <p class="email">{{ $data['userDetail']->email }}</p>
    <p class="cAddress">
        {{ $data['cAddress']->street1 }}, {{ $data['cAddress']->street2 }}, {{ $data['cAddress']->zipcode }}, {{ $data['cAddress']->city }}, {{ $data['cAddress']->state }}, {{ $data['cAddress']->country['name'] }}.
    </p>
    <p class="pEnName">{{ $data['guardianUserDetail']->en_name }}</p>
    <p class="pIc">{{ $data['guardianUserDetail']->ic }}</p>
    <p class="pRelationship">{{ $data['guardianDetail']->guardianRelationship['name'] }}</p>
    <p class="pNationality">{{ $data['guardianDetail']->nationality['name'] }}</p>
    <p class="pOccupation">{{ $data['guardianDetail']->occupation }}</p>
    <p class="income">{{ $data['guardianDetail']->income['range'] }}</p>
    <p class="pTelHp">{{ $data['guardianUserDetail']->tel_hp }}</p>
    @if ($data['guardianUserDetail']->email != null)
    <p class="pEmail">{{ $data['guardianUserDetail']->email }}</p>
    @endif
    <p class="eName1">{{ $data['emergencyContactUserDetail1']->en_name }}</p>
    <p class="eRelationship1">{{ $data['emergencyContact1']->guardianRelationship['name'] }}</p>
    <p class="eTelHp1">{{ $data['emergencyContactUserDetail1']->tel_hp }}</p>
    <p class="eName2">{{ $data['emergencyContactUserDetail2']->en_name }}</p>
    <p class="eRelationship2">{{ $data['emergencyContact2']->guardianRelationship['name'] }}</p>
    <p class="eTelHp2">{{ $data['emergencyContactUserDetail2']->tel_hp }}</p>
    <p class="secSchool">{{ $data['academicRecord']->school_name }}</p>
    <p class="secYear">{{ $data['academicRecord']->school_graduation }}</p>
    @for ($i = 0; $i < count($data['statusOfHealth']); $i++)
        @if ($data['statusOfHealth'][$i]->disease_status == 1)
            <p class="hYes<?php echo $i+1 ?> fw-bold">&check;</p>
            <p class="h<?php echo $i+1 ?>Remark fw-bold">{{ $data['statusOfHealth'][$i]->disease_remark }}</p>
        @else
            <p class="hNo<?php echo $i+1 ?> fw-bold">&check;</p>
            <p class="h<?php echo $i+1 ?>Remark fw-bold">{{ $data['statusOfHealth'][$i]->disease_remark }}</p>
        @endif 
    @endfor
    <p class="refundPolicySignature">{{ $data['userDetail']->en_name }}</p>
    <p class="refundPolicyIc">{{ $data['userDetail']->ic }}</p>
    <p class="refundPolicyDate">{{ $data['formattedDate'] }}</p>
    <p class="sheSignature">{{ $data['userDetail']->en_name }}</p>
    <p class="sheIc">{{ $data['userDetail']->ic }}</p>
    <p class="sheDate">{{ $data['formattedDate'] }}</p>
    {{-- end data --}}
</body>
</html>

