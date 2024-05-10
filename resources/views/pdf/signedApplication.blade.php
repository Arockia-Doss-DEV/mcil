<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<style type="text/css">
    body {
        font-family: 'Poppins';
        font-size: 14px; 
        padding: 0px; 
        margin: 0px;
    }
    @media print {
        .new-page {
        page-break-before: always;
        }
    }
    .new-page {
        page-break-before: always;
    }
    table { 
        font-size: 75%; 
        table-layout: 
        fixed; width: 100%;
        border-collapse: separate; 
        border-spacing: 0px; 
    }
    th, td { 
        border-width: 0px; 
        padding: 0em; 
        position: relative;
        border-radius: 0em; border-style: solid;
        border-color: #BBB;
        font-size: 13px;margin: 0px
    }
    table.page1{ 
        font-size: 14px; 
        width: 100%;
        border-collapse: collapse; 
        padding: 0px;
        border: 1px solid #000;
        border-spacing: 0;
    }
    table.page1 tbody tr td { 
        border-width: 1px; 
        border: 1px solid black;
        font-size: 14px;margin: 1px;
        padding-left: 10px;
        padding-top: 1px; 
        border-spacing: 0;
    }
    table.page2{ 
        font-size: 14px; 
        width: 100%;
        border-collapse: collapse; 
        padding: 0px;
        border: 1px solid #000;
        border-spacing: 0;
    }
    table.page2 tbody tr td { 
        background-color: #d8dfdf;
        vertical-align:top;
        padding: 5px;
        border-spacing: 0;
    }
    table.page2 tbody tr td > p{
        padding: 4px;margin: 0px; font-size: 14px;
    }

    table.page3{ 
        font-size: 16px; 
        width: 100%;
        border-collapse: collapse; 
        padding: 0px;
        border: 2px solid #000;
        border-spacing: 0;
    }
    table.page3 tbody tr td { 
        vertical-align:top;
        padding: 5px;
        border-spacing: 0;
        border: 2px solid #000;
    }
    table.page3 tbody tr td td{ 
        border: 0px solid #000;
    }
    table.page3 tbody tr td > p{
        padding: 2px;margin: 0px; font-size: 14px;
    }
    table.page4{ 
        font-size: 16px; 
        width: 100%;
        border-collapse: collapse; 
        padding: 0px;
        border: 2px solid #000;
        border-spacing: 0;
    }
    table.page4 tbody tr td { 
        vertical-align:top;
        padding: 5px;
        border-spacing: 0;
        border: 2px solid #000;
        font-size: 15px;
    }
    table.page4 tbody tr td td{ 
        border: 0px solid #000;
    }
    table.page4 tbody tr td > p{
        padding: 2px;margin: 0px; font-size: 14px;
    }

    table.page11{ 
        font-size: 16px; 
        width: 100%;
        border-collapse: collapse; 
        padding: 0px;
        border: 2px solid #000;
        border-spacing: 0;
    }
    table.page11 tbody tr td { 
        text-align: center; 
        vertical-align: middle;
        padding: 5px;
        border-spacing: 0;
        border: 2px solid #000;
        font-size: 18px;
    }
    table.page11 tbody tr td td{ 
        border: 0px solid #000;
    }
    table.page11 tbody tr td > p{
        padding: 2px;margin: 0px; font-size: 14px;
    }

    p{padding: 8px;margin: 0px;}
    h4 {font-size: 18px; font-weight: bold; padding: 0px; margin: 0px;}

    .double {
        background-image: linear-gradient(to bottom, red 33%, transparent 33%, transparent 66%, red 66%, red);
        background-position: 0 1.03em;
        background-repeat: repeat-x;
        background-size: 2px 6px;
    }
    .underline {
        border-bottom: 2px solid currentColor;
        display: inline-block;
        line-height: 0.85;
        text-shadow:2px 2px white,2px -2px white,-2px 2px white,-2px -2px white;
    }
    .font-12{
        font-size: 12px
    }
    .font-13{
        font-size: 13px
    }
    .font-14{
        font-size: 14px
    }
    .font-15{
        font-size: 15px
    }
    .font-16{
        font-size: 16px
    }
    .font-18{
        font-size: 18px
    }
    .font-19{
        font-size: 19px
    }
    .font-20{
        font-size: 20px
    }
    .font-21{
        font-size: 21px
    }
    .font-22{
        font-size: 22px
    }
    .f-w-4{
        font-weight: 400;
    }
    .f-w-6{
        font-weight: 600;
    }
    .f-w-7{
        font-weight: 700;
    }
    .f-w-1{
        font-weight: 100;
    }
    .cl-35{
            width: 35%;
    background: #d8dfde;
    }
    .cl-30{
           width: 30%;
    background: #d8dfde;
    }
    .cl-40{
           width: 45%;
    background: #d8dfde;
    }
    .l-s{
        letter-spacing: 1px
    }
    .fo-rm td{
        padding: 17px 40px;
    }

    table.page6{ 
        font-size: 16px; 
        width: 100%;
        border-collapse: collapse; 
        padding: 0px;
        border: 2px solid #000;
        border-spacing: 0;
    }
    table.page6 tbody tr td { 
        vertical-align:top;
        padding: 5px;
        border-spacing: 0;
        border: 2px solid #000;
    }
    table.page6 tbody tr td td{ 
        border: 0px solid #000;
    }
    table.page6 tbody tr td > p{
        padding: 2px;margin: 0px; font-size: 14px;
    }
    table.page7{ 
        font-size: 16px; 
        width: 100%;
        border-collapse: collapse; 
        padding: 0px;
        border: 0px !important;
        border-spacing: 0;
    }

    
    table.page13{ 
        font-size: 16px; 
        width: 100%;
        padding: 0px;
        border-spacing: 0;
    }
    table.page13 tbody tr td { 
        text-align: left; 
        vertical-align: middle;
        padding: 7px;
        font-size: 15px;
    }
    
    table.page13 tbody tr td > p{
        padding: 2px;margin: 0px; font-size: 14px;
    }


    table.page14{ 
        font-size: 16px; 
        width: 100%;
        border-collapse: collapse; 
        padding: 0px;
        border: 2px solid #000;
        border-spacing: 0;
    }
    table.page14 tbody tr td { 
        vertical-align:top;
        padding: 5px;
        border-spacing: 0;
        border: 2px solid #000;
        font-size: 15px;
    }
    table.page14 tbody tr td td{ 
        border: 0px solid #000;
    }
    table.page14 tbody tr td > p{
        padding: 2px;margin: 0px; font-size: 14px;
    }

    .page7.fo-rm td{
        padding: 10px 30px;
        border: 0px
    }
    .t-c{
        text-align: center;
    }
    .underline_text {
        border-bottom: solid 2px #000000;
        display: inline;
        padding-bottom: 3px;
        width: 100%
    }
    .watermark{
        letter-spacing:2px;
        font-size:70px;
        font-weight:700;
        white-space: nowrap;
        opacity:.5;
        color:#ff3d00;
        position:absolute;
        top:40%;
        left:10%;
        transform-origin: 0 0;
        transform: rotate(30deg);
        -webkit-transform: rotate(-30deg);
        text-transform:uppercase;
        z-index:2;
    }
    .pos-rel{
        position:relative;
    }
</style>
<body>
    <!-- page 1 -->
    <table>
        <tbody align="center">
            <tr><td style="padding-top:200px;"></td></tr>
            <tr><td><hr><hr><p style="font-size: 30px;">CONFIDENTIAL (机密)</p><hr><hr></td></tr>
            <tr><td><br><br><br><br></td></tr>
            <tr><td><p style="font-size: 30px;">MCIL INTERNATIONAL LIMITED</p></td></tr>
            <tr><td><p style="font-size: 20px;">(Company No. LL14041)</p></td></tr>
            <tr><td><p style="font-size: 20px;">A private fund company incorporated in the Federal Territory of Labuan, Malaysia</p></td></tr>
            <tr><td><p style="font-size: 20px;">(一所于马来西亚纳闽联邦直辖区注册成立的私募基金公司) </p></td></tr>
            <tr><td style="padding-top:150px;"></td></tr>
            <tr><td><img src="data:image/png;base64, {{ base64_encode(@file_get_contents(public_path('mcil.png'))) }}" width="180px;" height="185px"></td></tr>
        </tbody>
    </table>

    <!-- page 2 -->
    <div class="new-page"></div>

    <table class="table">
        <tr>
            <td width="10%"><h4>To:</h4></td>
            <td>
                <?php
                    if($subscription->old_address == 1){
                        echo '<p style="font-size:17px;">Board of Directors, MCIL International Ltd<br>
                        Unit 3A-2, Level 3A, Labuan Times Square,<br>
                        Jalan Merdeka, 87000 W.P. Labuan, Malaysia</p>';
                    }else{
                        echo '<p style="font-size:17px;">Board of Directors, MCIL International Ltd<br>
                        Unit Level 14(B) &amp; 14(C), Main Office Tower, Financial Park Labuan<br>
                        Jalan Merdeka, 87000 F.T. Labuan, Malaysia</p>';
                    }
                ?>
            </td>
        </tr>
    </table>

    <hr><hr>
    <p style="text-align: center; padding: 0px; font-size: 25px;">SHARES APPLICATION FORM (股份申请书)</p>
    <hr>
    <p style="font-size: 17px; font-weight: bold;">Important Notes (重要事项):</p>

    <table class="page2" border="1px">
        <tbody>
            <tr>
                <td>
                    <p style="font-size: 17px; font-weight: bold;">Application (申请书)</p>
                    <ol>
                        <li>Minimum initial investment amount shall be USD 70,000.00 or any amount equal or more than Ringgit Malaysia Two Hundred Fifty Thousand (RM250,000.00) (首次投资，最低金额为70,000.00美元 或任何等于或超过马币二十五万令吉(RM250,000.00)。)</li>
                        <li>Applicant must be 18 years old and above. (Joint applicant maybe a minor) (申请者必须年满18岁。（联合申请人可以是未成年人）)</li>
                        <li>A clear and enlarged photocopy or both sides of the Identity Card/Passport.(须提交清晰、放大的身份证或护照复印件（双面）。）</li>
                        <li>For an application who is a corporation （法人实体申请者）:
                    
                            <ul>
                                <li><p>the common seal or the company's stamp will have to be affixed.<br>(须加盖公章或公司印章。）</p></li>
                                
                                <li><p>corporation filling the share application form under the hand of the official must state the capacity of that official.<br>(须注明填写股份申请书的官员的职务。)</p></li>
        
                                <li><p>certified copies of the Certificate of Incorporation or Registration together with a certified copy of the Memorandum and Articles of Association or Constitution or By-Laws or Charter and certified copies of the relevant resolutions should be forwarded together with the Share Application Form to the Board of Directors.<br>(须将公司成立登记证或注册证的核证副本；章程及规章、公司章程、附则、宪章的核证副本；相关议决的核证副本连同本股份申请书一起提交予董事会。)</p></li>
        
                                <li><p>special resolution of the applicant's Board of Directors, as verified and signed by the company secretary, to invest for as pecified sum in The Fund.<br>(若要投资于本基金，必须事先通过该公司董事会的特别议决，再由公司秘书核实及签字。)</p></li>
                            </ul>
                        </li>
                    </ol>
                    <p style="font-size: 17px; font-weight: bold;">Payment (付款)</p>
                    <ol start="5">
                        <li>Unless otherwise instructed / informed by the company, all cheques, bank drafts or cashiers/money orders must be made payable to "<b>MCIL INTERNATIONAL LTD</b>" and crossed "<b>ACCOUNT PAYEE ONLY</b>". Please write your name/company's name, NRIC/Passport number/Certificate of Incorporation number on the back of all cheques, bank drafts or cashier's orders/ money orders.<br>(除非公司另有指示/通知,支票、银行汇票或银行本票抬头请写“<b>MCIL INTERNATIONAL LTD</b>”, 并且在支票左上角画两条平行线，写上“<b>ACCOUNT PAYEE ONLY</b>”只限存入抬头人账户）。请在支票、银行汇票或银行本票背面注明你的姓名或公司名称；身份证号码或护照号码或公司成立登记证号码。</li>

                        <li>For joint investment:（联合投资）:

                            <ul>
                                <li><p>applicants must specify the person whom the company may give a Redemption Notice. If not, the Board of Directors will only act upon an instruction signed by all the applicants aged 18 years old and above. <br>(申请人必须指明公司可发出赎回通知的人。否则，董事会只能根据所有18 岁及以上的申请人签署的指示行事。）</p></li>
                            </ul>
                        </li>
                    </ol>
                            
                </td>
                <td>
                    
                    <ul>
                        <li><p>Payment instruction for Redemption Notice, Applicants must specify to whom payment will be made. If not, all payments will be made in the name of the <b>Principal Holder and/or Joint Holder Accounts</b>.<br>(赎回通知的付款指示，申请人必须指定付款对象。否则， 所有款项将以申请人和/或联合申请人账户的名义支付。)</p></li>

                        <li><p>Please e-mail the form to us at admin@mcilintl.com or post it to us at: <b>MCIL INTERNATIONAL LIMITED</b>, Address: <?php if($subscription->old_address == 1){ echo 'Unit 3A-2, Level 3A, Labuan Times Square, Jalan Merdeka, 87000 W.P. Labuan, Malaysia.'; }else{ echo 'Unit Level 14(B) &amp; 14(C), Main Office Tower, Financial Park Labuan, Jalan Merdeka, 87000 F.T. Labuan, Malaysia</p>'; } ?>.<br>(请通过电子邮件将申请书发送至 admin@mcilintl.com 或将申请书邮寄至： F.T.Labuan, Malaysia.) <b>MCIL INTERNATIONAL LIMITED</b>，地址：<?php if($subscription->old_address == 1){ echo 'Unit 3A-2, Level 3A, Labuan Times Square, Jalan Merdeka, 87000 W.P. Labuan, Malaysia.'; }else{ echo 'Unit Level 14(B) &amp; 14(C), Main Office Tower, Financial Park Labuan, Jalan Merdeka, 87000 F.T. Labuan, Malaysia</p>'; } ?></p></li>
                    </ul>
                    <p style="font-size: 17px; font-weight: bold;">Share/Unit Certificate (股份证书)</p>
                    <ol start=7>
                        <li><p>Investments in the share/unit of The Fund managed by the Board of Directors are script-less, that is, no share/unit certificate(s) will be issued. Only Acknowledgment / Receipt(s) will be issued to investors as confirmation of their investment. (由董事会负责管理的本基金不 发股票给投资者，仅发出确认通知或收据予投资者作为投资的确 认。)</p>
                    </ol>
                    <p style="font-size: 17px; font-weight: bold;">Rights of MCIL Fund Board of Directors (MCIL 基金董事会的权利)</p>

                    <ol start=8>
                        <li>The Board of Directors reserve the right to accept or reject any application in whole or in part there of with out assigning reasons inrespect there of.(董事会保留接受或拒绝任何申请认购的权利，无论是全部或一部分，而且无需提供任何理由。)</li>
                        <li>Investor(s) hereby agree to indemnify the Board of Directors and any of its agents against any losses, costs and expenses which maybe incurred by any or all of them arising either directly or indirectly in connection with maintaining an investment account with the Board of Directors or, in connection with any instructions /confirmation given in any format made by or on behalf of investor,unless the losses, costs and expenses are due to the wilful defaultor negligence of the Board of Directors or its agents.((若是基于要维持投资账户，或因为投资 者或其代表以任何形式发出任何指示或确认而直接或间接导致 投资发生任何损失、开销和费用，投资者愿意对董事会及它所委 任的任何代理人作出赔偿，除非有关损失、开销和费用是因董事 会或其代理人蓄意违约或疏忽所致。)</li>
                        <li>Investor(s) hereby note and acknowledge that they may have provided and may provide personal information ("Data") to the Board of Directors and / or any of its agents. Investors are responsible to notify the Board of Directors in writing within one (l)calendar month of any change to the Data. Investor(s) hereby agreeand acknowledge that the Data and investment data may be used or processed by the Board of Directors and / or its agents within or outside Malaysia for the purpose of the provision of any services related to The Fund and / or investor's investments.(投资者了解并确认，本身可能已经提供，和将来有 可能会提供其个人信息（以下简称“资料”）予董事会和/或它所 委任的任何代理人。若有关资料有任何变更，投资者有责任在壹 （1）个月内发出书面通知予董事会。投资者特此同意并确认， 董事会和/或其代理人可在马来西亚境内外使用或处理上述资料 和投资资料，作为提供与MCIL 基金和/或投资相关的任何服务 之用途。</li>
                    </ol>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- page 3 -->
    <div class="new-page"></div>

    <h3>(A) PRIVATE INDIVIDUAL (私人个体)</h3>
    <h4>Name and Particulars of Principal Applicant (申请者姓名和资料)</h4>
    <table class="page3" border="1px;" width="100%">
        <tbody>
        <tr>
            <td width="35%" style="background-color:#d8dfdf;">
                <p>Name (as per NRIC/Passport)<br/>姓名(如同身份证件/护照)</p></td>
            <td width="65%">
                <p><?= $subscription->has('individual') ? $subscription->individual->salutation : '' ?> <?= strtoupper($subscription->user->first_name); ?><br/>Gender (性别): <?= $subscription->has('individual') ? $subscription->individual->gender : '' ?></p></td>
        </tr>

        <tr>
            <td style="background-color:#d8dfdf;">
                <p>Address:<br>(地址)</p></td>
            <td>
                <p><?= $subscription->user->address_line1 ?> <?= $subscription->user->address_line2 ?> <?= $subscription->user->city ?> <?= $subscription->has('user') ? $subscription->user->stateAs->name : '' ?></p>
                <table width="100%" border="1px">
                    <tr>
                        <td width="40%">
                            <p>Postcode (邮编):<?= $subscription->user->post_code ?></p></td>
                        <td width="60%">
                            <p>Mobile No.(手机号码): +<?= $subscription->has('user') ? $subscription->user->mobilePrefix->calling_code : '' ?> <?= $subscription->user->mobile_no;?></p></td>
                    </tr>
                    <tr>
                        <td><p>Country (国家): <?= $subscription->has('user') ? $subscription->user->countryAs->name : '' ?></p></td>
                        <td><p>Email （电邮地址）: <?= $subscription->user->email ?></p></td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td style="background-color:#d8dfdf;">
                <p>NRIC/Passport No. (身份证件/护照号码)</p></td>
            <td>
                <p><?= $subscription->has('individual') ? $subscription->individual->passport : '' ?></p></td>
        </tr>
        <tr>
            <td style="background-color:#d8dfdf;">
                <p>Nationality (国籍)</p></td>
            <td><p><?= $subscription->has('individual') ? $subscription->individual->IndiNationality->name : '' ?></p></td>
        </tr>
        <tr>
            <td style="background-color:#d8dfdf;">
                <p>Occupation (职业)</p></td>
            <td><p><?= $subscription->has('individual') ? $subscription->individual->occupation : '' ?></p></td>
        </tr>
        <tr>
            <td style="background-color:#d8dfdf;">
                <p>Date of Birth (出生日期) – DD-MM-YYYY</p></td>
            <td><p><?= $subscription->has('individual') ? date('d-m-Y', strtotime($subscription->individual->dob)) : '' ?></p></td>
        </tr>

        </tbody>
    </table>
    <br>

    <h4>Name and Particulars of Joint Applicant (联合申请者姓名和资料)</h4>

    <?php 
        if($subscription->is_joint_applicant == 1){
    ?>

    <table class="page3" border="1px;" width="100%">
        <tbody>
        <tr>
            <td width="35%" style="background-color:#d8dfdf;"><p>Name (as per NRIC/Passport)<br/>姓名(如同身份证件/护照)</p></td>
            <td width="65%"><?= $subscription->ja_salutation ?> <?= strtoupper($subscription->ja_name) ?><br/>Gender (性别): <?= $subscription->ja_gender ?></td>
        </tr>
        <tr>
            <td style="background-color:#d8dfdf;"><p>Address<br>(地址)</p></td>
            <td> <p><?= $subscription->ja_addr_line_1 ?> <?= $subscription->ja_addr_line_2 ?>
                    <?= $subscription->ja_city ?>  <?= $subscription->ja_state_id ? $subscription->SubscriptionJaState->name : '' ?></p>
                <table width="100%" border="1px">
                    
                    <tr>
                        <td><p>Postcode (邮编): <?= $subscription->ja_postcode ?></p></td>
                        <td><p>Mobile No.(手机号码) : +<?= $subscription->ja_mobileprefix ? $subscription->SubscriptionJaMobilePrefix->calling_code : '' ?> <?= $subscription->ja_mobile_no ?></p></td>
                    </tr>
                    <tr>
                        <td><p>Country (国家): <?= $subscription->ja_country_id ? $subscription->SubscriptionJaCountry->name : '' ?></p></td>
                        <td><p>Email (电邮地址) : <?= $subscription->ja_email ?></p></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="background-color:#d8dfdf;"><p>NRIC/Passport No.(身份证件/护照号码)</p></td>
            <td><p><?= $subscription->ja_nric_passport ?></p></td>
        </tr>
        <tr>
            <td style="background-color:#d8dfdf;"><p>Nationality (国籍)</p></td>
            <td><p><?= $subscription->ja_nationality_id ? $subscription->SubscriptionJaNationality->name : '' ?></p></td>
        </tr>
        <tr>
            <td style="background-color:#d8dfdf;"><p>Occupation (职业)</p></td>
            <td><?= $subscription->ja_occupation ?></td>
        </tr>
        <tr>
            <td style="background-color:#d8dfdf;"><p>Date of Birth (出生日期) – DD-MM-YYYY</p></td>
            <td><?= date('d-m-Y', strtotime($subscription->ja_dob )) ?></td>
        </tr>
        </tbody>
    </table>

    <?php }else{ ?>

        <table class="page3" border="1px;" width="100%">
            <tbody>
            <tr>
                <td width="35%" style="background-color:#d8dfdf;"><p>Name (as per NRIC/Passport)<br/>姓名(如同身份证件/护照)</p></td>
                <td width="65%"></td>
            </tr>
            <tr>
                <td style="background-color:#d8dfdf;"><p>Address<br>(地址)</p></td>
                <td> <p></p>
                    <table width="100%" border="1px">
                        
                        <tr>
                            <td><p>Postcode (邮编):</p></td>
                            <td><p>Mobile No.(手机号码) :</p></td>
                        </tr>
                        <tr>
                            <td><p>Country (国家):</p></td>
                            <td><p>Email (电邮地址) :</p></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="background-color:#d8dfdf;"><p>NRIC/Passport No.(身份证件/护照号码)</p></td>
                <td><p></p></td>
            </tr>
            <tr>
                <td style="background-color:#d8dfdf;"><p>Nationality (国籍)</p></td>
                <td><p></p></td>
            </tr>
            <tr>
                <td style="background-color:#d8dfdf;"><p>Occupation (职业)</p></td>
                <td></td>
            </tr>
            <tr>
                <td style="background-color:#d8dfdf;"><p>Date of Birth (出生日期) – DD-MM-YYYY</p></td>
                <td></td>
            </tr>
            </tbody>
        </table>
        
    <?php } ?>

    <br>
    <!-- <h4>Redemption / Repurchase Instruction Only-仅限赎回或回购指示(√)</h4> -->
    
    <?php
        if($subscription->is_joint_applicant == 1){
            if($subscription->ja_instruction_redemption == 1){
    
                echo '<table class="page3" width="100%">
                        <tr>
                            <td width="5%"><p>√</p></td>
                            <td width="45%" style="background-color:#d8dfdf;"><p>One To Sign (其中一人签字)</p></td>
                            <td width="5%"><p></p></td>
                            <td width="45%" style="background-color:#d8dfdf;"><p>Both To Sign(两人签字)</p></td>
                        </tr>
                    </table>';
            }else if($subscription->ja_instruction_redemption == 2){
                echo '<table class="page3" width="100%">
                        <tr>
                            <td width="5%"><p></p></td>
                            <td width="45%" style="background-color:#d8dfdf;"><p>One To Sign (其中一人签字)</p></td>
                            <td width="5%"><p>√</p></td>
                            <td width="45%" style="background-color:#d8dfdf;"><p>Both To Sign(两人签字)</p></td>
                        </tr>
                    </table>';
            }
        }  
    ?>
    <br>

    <h4>Payment Instruction for Dividend Payouts(红利支付指示)</h4>

    <table class="page3" border="1px;" width="100%">
        <tr>
            <td><p>Name of Payee (收款人名称)</p></td>
            <td align="center"><p><?= $subscription->payee_name ?><br/>(Must be the name of the Principal Applicant - 必须是申请者的姓名)</p></td>
        </tr>
        <tr>
            <td><p>Bank Name (银行名称)</p></td>
            <td align="center"><p><?= $subscription->bank_name ?></p></td>
        </tr>
        <tr>
            <td><p>Address (地址)</td>
            <td align="center"><p><?= $subscription->address_line_1 ?>, 
                    <?= !empty($subscription->address_line_2) ? $subscription->address_line_2 . ", " : '' ?> 
                    <?= $subscription->city ?>, 
                    <?= $subscription->postcode ?>,
                    <?= $subscription->state_id ? $subscription->SubscriptionState->name : '' ?>, 
                    <?= $subscription->country_id ? $subscription->SubscriptionCountry->name : '' ?>.</p>
            </td>
        </tr>
        <tr>
            <td><p>Account Number (账号)</p></td>
            <td align="center"><p><?= $subscription->account_number ?></p></p>
                <span align="center">Account Type (√)(帐户类型 - √ )</span><br>
                    <?php 
                        if($subscription->account_type == "Saving Account"){
                            echo "<span>(&nbsp;) Current (来往账户) (&nbsp;√&nbsp;) Savings (储蓄账户)</span>";
                        }else{
                            echo "<span>(&nbsp;√&nbsp;) Current (来往账户) (&nbsp;) Savings (储蓄账户)</span>";
                        }
                    ?>

            </td>
        </tr>
        <tr>
            <td><p>SWIFT Code (SWIFT代码)</p></td>
            <td><p><?= $subscription->swift_code ?></p></td>
        </tr>
    </table>

    <br>
    <h4>Investment Details (投资信息)</h4>

    <?php
        $initial_investment = $subscription->initial_investment;
        $subscription_fee =  $subscription->service_charge;
        $percent = ($initial_investment * $subscription_fee)/100;
        $total = $initial_investment + $percent;
    ?>

    <table class="page3" border="1px;" width="100%">
        <tr>
            <td width="50%">Amount(USD)金额(美元): <?= number_format($initial_investment) ?></td>
            
            <?php 
                if($subscription->is_first == 1){ ?>
                    <td width="25%">[X]Initial Investment<br/>(首次投资)</td>
                    <td width="25%">[&nbsp;]Additional Investment<br/>(附加投资)</td>
           <?php }else if($subscription->is_first == 0){ ?>
                    <td width="25%">[&nbsp;]Initial Investment<br/>(首次投资)</td>
                    <td width="25%">[X]Additional Investment<br/>(附加投资)</td>
           <?php } ?>
            
        </tr>
        <tr>
            <td width="50%">Processing Fee (汇款/支票号码): USD 0.00</td>
            <td width="50%" colspan="2">Remitting/Issuing Bank(汇款/开证银行): <?= $subscription->remittance_bank; ?></td>
        </tr>
        <tr>
            <td>Subscription Fee (%) (费用-%): <?= $subscription->service_charge; ?>%</td>
            <td colspan="2">Total Amount (USD) (金额-美元): <?= number_format($total) ?></td>
        </tr>
    </table>

    <!-- page 4 -->
    <div class="new-page"></div>
    <h2>Name and Particulars of Beneficiary (受益人姓名和资料)</h2>
        
    <?php 

        if($subscription->beneficiary_seq ==1){
            $bene_amount1 = $subscription->b1_beneficiary_amount;
            $bene_amount2 = 0;
        }else if($subscription->beneficiary_seq ==2){
            $bene_amount1= $subscription->b1_beneficiary_amount;
            $bene_amount2 = $subscription->b2_beneficiary_amount;
        }else{
            $bene_amount1 = 0;
            $bene_amount2 = 0;
        }
    ?>

    <table  width="100%">
        <tr>
            <td colspan="3" class="font-18">In the event of my death, I designate the following as my BENEFICIARY 1 for <?= $bene_amount1 ?> % and BENEFICIARY 2 for <?= $bene_amount2 ?> %. All amount Capital Sum including dividend / interest that may be payable after my death:</td>
        </tr>
        <tr>
            <td colspan="3">
                &#40; 一旦本人逝世,本人指定以下人士为本人的第一受益人,能继承全额资本总额的 <?= $bene_amount1; ?> %,以及第二受益人, &lt; 能继承全额资本总额的 <?= $bene_amount2; ?>%。在本人逝世后,包括股息或利息在内的全额资本总额应支付予: &#41;</td>
        </tr>
    </table>
    <br>

    <?php if($subscription->beneficiary_seq ==1){ ?>

    <h4>BENEFICIARY 1 (第一受益人)</h4>
    <table  class="page4" border="1px;" width="100%">
        <tr>
            <td width="20%" class="cl-35">Name (as per NRIC/Passport)<br/>姓名(如同身份证件/护照)</td>
            <td><?= $subscription->b1_name ?></td>
        </tr>
        <tr>
            <td class="cl-35">Address<br>(地址)</td>
            <td><?= $subscription->b1_address_line_1 ?> 
                    <?= $subscription->b1_address_line_2 ?> 
                    <?= $subscription->b1_city ?> 
                    <?= $subscription->b1_state_id ? $subscription->SubscriptionB1State->name : '' ?>
                    <br>
                <table width="100%" border="1px">
                    <tr>
                        <td>Postcode (邮编): <?= $subscription->b1_postcode ?></td>
                        <td colspan="2">Mobile No.(手机号码) : +<?= $subscription->b1_mobile_prefix ? $subscription->SubscriptionB1PhonePrefix->calling_code : '' ?> <?= $subscription->b1_mobile_number ?></td>
                    </tr>
                    <tr>
                        <td>Country (国家): <?= $subscription->b1_country_id ? $subscription->SubscriptionB1Country->name : '' ?></td>
                        <td colspan="2">Email (电邮地址) : <?= $subscription->b1_email ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <tr>
            <td class="cl-35">NRIC/Passport No.(身份证件/护照号码)</td>
            <td><?= $subscription->b1_nric_passport ?></td>
        </tr>
        <tr>
            <td class="cl-35">Nationality (国籍)</td>
            <td><?= $subscription->b1_nationality_id ? $subscription->SubscriptionB1Nationality->name : '' ?></td>
        </tr>
        <tr>
            <td class="cl-35">Occupation (职业)</td>
            <td><?= $subscription->b1_occupation ?></td>
        </tr>
        <tr>
            <td class="cl-35">Date of Birth (出生日期) – DD-MM-YYYY</td>
            <td>
                <?php 
                    if(!empty($subscription->b1_dob)){
                        echo date('d-m-Y', strtotime($subscription->b1_dob));
                    }else{
                        echo "-";
                    }
                ?>
            </td>
        </tr>
    </table>

    <h3>Payment Instruction for Redemption (赎回指示)</h3>
    <table class="page4" border="1px;" width="100%">
     
        <tr>
            <td class="cl-35">Please make payment in the name of<br>
                (请将赎回金额支付予)
            </td>
            <td align="center"> <span class="font-18 f-w-4"><?= $subscription->b1_name ?></span> <br>
                (Must be the name of the Beneficiary 1 -必须是第壹受益人的姓名)
            </td>
        </tr>
    </table>
    <table  width="100%">
        <tr>
            <td colspan="3" style="padding: 15px 0px;" class="font-16">Relationship to Applicant (与申请人的关系) <u><?= $subscription->b1_relationship ?></u></td>
        </tr>
    </table>

    <h3>BENEFICIARY 2 (第二受益人)</h3>
    <table class="page4" border="1px;" width="100%">
        <tr>
            <td class="cl-35">Name (as per NRIC/Passport)<br/>姓名(如同身份证件/护照)</td>
            <td></td>
        </tr>
        <tr>
            <td class="cl-35">Address<br>(地址)</td>
            <td>
                <table width="100%">
                    <tr>
                        <td>Postcode (邮编):</td>
                        <td colspan="2">Mobile No.(手机号码) :</td>
                    </tr>
                    <tr>
                        <td>Country (国家):</td>
                        <td colspan="2">Email (电邮地址) :</td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <tr>
            <td class="cl-35">NRIC/Passport No.(身份证件/护照号码)</td>
            <td></td>
        </tr>
        <tr>
            <td class="cl-35">Nationality (国籍)</td>
            <td></td>
        </tr>
        <tr>
            <td class="cl-35">Occupation (职业)</td>
            <td></td>
        </tr>
        <tr>
            <td class="cl-35">Date of Birth (出生日期) – DD-MM-YYYY</td>
            <td></td>
        </tr>
    </table>

    <h3>Payment Instruction for Redemption (赎回指示)</h3>
    <table  class="page4" border="1px;" width="100%">
        <tr>
            <td class="cl-35">Please make payment in the name of<br>
                (请将赎回金额支付予)
            </td>
            <td> <br>
                (Must be the name of the Beneficiary 2 -必须是第贰受益人的姓名)
            </td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td style="padding: 15px 0px;" class="font-16"><b>Relationship to Applicant</b> (与申请人的关系) __________________________________________________</td>
        </tr>
    </table>

    <?php }else if($subscription->beneficiary_seq ==2){ ?>

    <h4>BENEFICIARY 1 (第一受益人)</h4>
    <table  class="page4" border="1px;" width="100%">
        <tr>
            <td width="20%" class="cl-35">Name (as per NRIC/Passport)<br/>姓名(如同身份证件/护照)</td>
            <td><?= $subscription->b1_name ?></td>
        </tr>
        <tr>
            <td class="cl-35">Address<br>(地址)</td>
            <td><?= $subscription->b1_address_line_1 ?> 
                    <?= $subscription->b1_address_line_2 ?> 
                    <?= $subscription->b1_city ?> 
                    <?= $subscription->b1_state_id ? $subscription->SubscriptionB1State->name : '' ?>
                    <br>
                <table width="100%" border="1px">
                    <tr>
                        <td>Postcode (邮编): <?= $subscription->b1_postcode ?></td>
                        <td colspan="2">Mobile No.(手机号码) : +<?= $subscription->b1_mobile_prefix ? $subscription->SubscriptionB1PhonePrefix->calling_code : '' ?> <?= $subscription->b1_mobile_number ?> </td>
                    </tr>
                    <tr>
                        <td>Country (国家): <?= $subscription->b1_country_id ? $subscription->SubscriptionB1Country->name : '' ?></td>
                        <td colspan="2">Email (电邮地址) : <?= $subscription->b1_email ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <tr>
            <td class="cl-35">NRIC/Passport No.(身份证件/护照号码)</td>
            <td><?= $subscription->b1_nric_passport ?></td>
        </tr>
        <tr>
            <td class="cl-35">Nationality (国籍)</td>
            <td><?= $subscription->b1_nationality_id ? $subscription->SubscriptionB1Nationality->name : '' ?></td>
        </tr>
        <tr>
            <td class="cl-35">Occupation (职业)</td>
            <td><?= $subscription->b1_occupation ?></td>
        </tr>
        <tr>
            <td class="cl-35">Date of Birth (出生日期) – DD-MM-YYYY</td>
            <td>
                <?php 
                    if(!empty($subscription->b1_dob)){
                        echo date('d-m-Y', strtotime($subscription->b1_dob));
                    }else{
                        echo "-";
                    }
                ?>
            </td>
        </tr>
    </table>

    <h3>Payment Instruction for Redemption (赎回指示)</h3>
    <table class="page4" border="1px;" width="100%">
     
        <tr>
            <td class="cl-35">Please make payment in the name of<br>
                (请将赎回金额支付予)
            </td>
            <td align="center"> <span class="font-18 f-w-4"><?= $subscription->b1_name ?></span> <br>
                (Must be the name of the Beneficiary 1 -必须是第壹受益人的姓名)
            </td>
        </tr>
    </table>
    <table  width="100%">
        <tr>
            <td colspan="3" style="padding: 15px 0px;" class="font-16">Relationship to Applicant (与申请人的关系) <u><?= $subscription->b1_relationship ?></u></td>
        </tr>
    </table>

    <!-- 222222222 -->
    <h4>BENEFICIARY 2 (第一受益人)</h4>
    <table  class="page4" border="1px;" width="100%">
        <tr>
            <td width="20%" class="cl-35">Name (as per NRIC/Passport)<br/>姓名(如同身份证件/护照)</td>
            <td><?= $subscription->b2_name ?></td>
        </tr>
        <tr>
            <td class="cl-35">Address<br>(地址)</td>
            <td><?= $subscription->b2_address_line_1 ?> 
                    <?= $subscription->b2_address_line_2 ?> 
                    <?= $subscription->b2_city ?> 
                    <?= $subscription->b2_state_id ? $subscription->SubscriptionB2State->name : '' ?>
                    <br>
                <table width="100%" border="1px">
                    <tr>
                        <td>Postcode (邮编): <?= $subscription->b2_postcode ?></td>
                        <td colspan="2">Mobile No.(手机号码) : +<?= $subscription->b2_mobile_prefix ? $subscription->SubscriptionB2PhonePrefix->calling_code : '' ?> <?= $subscription->b2_mobile_number ?> </td>
                    </tr>
                    <tr>
                        <td>Country (国家): <?= $subscription->b2_country_id ? $subscription->SubscriptionB2Country->name : '' ?></td>
                        <td colspan="2">Email (电邮地址) : <?= $subscription->b2_email ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <tr>
            <td class="cl-35">NRIC/Passport No.(身份证件/护照号码)</td>
            <td><?= $subscription->b2_nric_passport ?></td>
        </tr>
        <tr>
            <td class="cl-35">Nationality (国籍)</td>
            <td><?= $subscription->b2_nationality_id ? $subscription->SubscriptionB2Nationality->name : '' ?></td>
        </tr>
        <tr>
            <td class="cl-35">Occupation (职业)</td>
            <td><?= $subscription->b2_occupation ?></td>
        </tr>
        <tr>
            <td class="cl-35">Date of Birth (出生日期) – DD-MM-YYYY</td>
            <td>
                <?php 
                    if(!empty($subscription->b2_dob)){
                        echo date('d-m-Y', strtotime($subscription->b2_dob));
                    }else{
                        echo "-";
                    }
                ?>
            </td>
        </tr>
    </table>

    <h3>Payment Instruction for Redemption (赎回指示)</h3>
    <table class="page4" border="1px;" width="100%">
     
        <tr>
            <td class="cl-35">Please make payment in the name of<br>
                (请将赎回金额支付予)
            </td>
            <td align="center"> <span class="font-18 f-w-4"><?= $subscription->b2_name ?></span> <br>
                (Must be the name of the Beneficiary 2 -必须是第壹受益人的姓名)
            </td>
        </tr>
    </table>
    <table  width="100%">
        <tr>
            <td colspan="3" style="padding: 15px 0px;" class="font-16">Relationship to Applicant (与申请人的关系) <u><?= $subscription->b2_relationship ?></u></td>
        </tr>
    </table>

    <?php } ?>

    <p style="padding: 8px 0px;">Any specific instructions (if any) kindly write in to the Company (任何具体说明（如有）请以书信通知公司)</p>

    <table class="table" width="100%">
        <tr>
            <td colspan="3" style="padding: 8px 0px;">DECLARATION BY APPLICANT(S) (投资者声明):</td>
        </tr>
        <tr>
            <td colspan="3" >I/WE THE UNDERSIGNED HEREBY AFFIRM THAT ON MY OWN BEHALF, FREE WILL, CHOICE AND INITIATE HAVE ENQUIRED ABOUT THEFUND AND REQUESTED THE FUND’S DISTRIBUTOR / SALES AGENT OF THE FUND TO BRIEF AND/OR PROVIDE INFORMATION ABOUT THE FUND TO OURSELVES. THE INFORMATION PRESENTED, RECEIVED, AND LEARNED FROM THE DISTRIBUTOR / SALES AGENT SHALL BETREATED AS STRICTLY PRIVATE AND CONFIDENTIAL AND FOR OUR OWN CONSUMPTION AND REFERENCE ONLY.(本人/我们,以下署名者,特此声明本人乃是代表本身,并在自己的选择下,出于自愿和自发的精神对本基金提出查询,并要求本基金或其代理人为本人/我们扼要讲解和/或提供本基金的相关信息。对于基金或其代理人向本人/我们呈现的信息,本人/我们将严加保密,仅供本身参考
                和使用。)</td>
        </tr>
    </table>

    <!-- page 5 -->
    <div class="new-page"></div>

    <table width="100%" class="table page-5 font-18 l-s"  >
        <tr>
            <td colspan="3" style="padding: 15px 0px;">
                I/WE FULLY UNDERSTAND THAT THE FUND IS STRICTLY NOT INTENDED TO BE MARKETED OR OFFERED IN MALAYSIA OR MADE 
                AVAILABLE TO ANY MALAYSIANS IN MALAYSIA EXCEPT LABUAN. THE RELEVANT MALAYSIAN AUTHORITIES INCLUDING THE SECURITIES
                COMMISSION MALAYSIA AND LABUAN FINANCIAL SERVICES AUTHORITY ARE NOT LIABLE FOR ANY NONDISCLOSURE OR MISLEADING
                STATEMENT ON THE PART OF THE FUND AND TAKE NO RESPONSIBILITY ON THE CONTENTS OF THE SUPPLEMENTARY INFORMATION
                MEMORANDUM OF THE FUND. THESE AUTHORITIES ALSO TAKE NO REPRESENTATIONS ON THE ACCURACY AND COMPLETENESS OF THE
                SUPPLEMENTARY INFORMATION MEMORANDUM OF THE FUND AND SHALL NOT BE CLAIMED ON ANY LIABILITY WHATSOEVER ARISING
                FROM, OR IN RELIANCE UPON, THE WHOLE OR ANY PART OF THE CONTENT OF THE SUPPLEMENTARY INFORMATION MEMORANDUM OF
                THE FUND. (本人/我们明白, 除了在纳闽,本基金不拟在马来西亚境内销售, 或在马来西亚境内提供应给任何马来西亚人。马来西亚证券委 

                员会和纳闽金融服务管理局等相关马来西亚当局不对本基金可能产生的信息遗漏或误导性陈述负责,也不对基金补充信息备忘录呈现的内容
                负责。此外,上述有关当局概不对基金补充信息备忘录的准确性和完整性作出任何陈述,也不应被要求对基金补充信息备忘录的全部或任何
                部分内容所招致或引起的任何情况承担任何责任。)</td>
        </tr>
        <tr>
            <td colspan="3" style="padding: 15px 0px;">
                I/WE CONFIRM THAT I/WE AM/ARE A SOPHISTICATED INVESTOR BY ALL DEFINITIONS OF THAT CLASSIFICATION KNOWN TO ME; I/WE
                AM/ARE A SAVVY INVESTOR, I/WE MAKE MY/OUR OWN INVESTMENT DECISIONS AND HAVE LEGALLY ACQUIRED ASSETS AVAILABLE. (凭
                着本人/我们对各类型投资者的定义的了解,本人/我们确认本身为一名成熟的投资者,也是一名精明的投资者。本人/我们有能力自行作投资
                决定,并拥有通过合法途径获得的资产。)
            </td>
        </tr>
        <tr>
            <td colspan="3" style="padding: 15px 0px;">
                I/WE FURTHER CONFIRM THAT I/WE HAVE REQUESTED INFORMATION FROM THE DISTRIBUTOR / SALES AGENT AND THE DISTRIBUTOR /
                SALES AGENT HAVE NEITHER SOLICITS OFFERS NOR MARKETS THE FUND TO ME/US DIRECTLY OR INDIRECTLY. THE INFORMATION
                PROVIDED BY THE DISTRIBUTOR / SALES AGENT IS MERELY INTENDED TO PROVIDE BACKGROUND AND SALIENT INFORMATION OF THE
                FUND ONLY. IT DOES NOT AMOUNT TO A RECOMMENDATION, OFFER OR INVITATION, EITHER EXPRESSLY OR IMPLICATION, TO MAKE AN
                INVESTMENT IN THE FUND. (本人/我们进一步确认,本人/我们已要求基金或其代理人提供信息,而基金或其代理人并无直接或间接向本人/
                我们提出献购或销售本基金。基金或其代理人所提供的信息仅为说明该基金的背景和重点,不可等同为对本基金作出明示或暗示性投资建议、
                献议或邀约。)
            </td>
        </tr>
        <tr>
            <td colspan="3" style="padding: 15px 0px;">
                I/WE UNDERSTAND THAT I/WE SHOULD RELY ON MY/OUR OWN EVALUATION TO ASSESS THE MERITS AND RISKS OF THE INVESTMENT. IN
                CONSIDERING THE INVESTMENT, IF IN DOUBT AS TO THE ACTION TO BE TAKEN, I/WE SHALL CONSULT A QUALIFIED ADVISER
                IMMEDIATELY. I/WE CONFIRM THAT THE DISTRIBUTOR / SALES AGENT IS SHARING INFORMATION ABOUT THE FUND WITH ME/US ON A 
                REVERSE ENQUIRY BASIS INITIATED BY ME/US. I/WE AGREE THAT ALL EMAILS AND FACSIMILE TRANSMITTED DOCUMENTS SHALL BE 
                TREATED AS ORIGINAL DOCUMENTS. (本人/我们明白本人应凭个人的判断力来评估投资的优势与风险。在考虑投资时,若对本身即将采取 
                的行动有所疑虑,本人/我们将即刻咨询合格的投资顾问。本人/我们确认,基金或其代理人乃是基于本人/我们发出投资询问而展开反向查询, 
                再与我/我们分享本基金的信息。本人/我们同意,所有电子邮件和通过传真发送的文件将被视为原件处理。) 
            </td>
        </tr>
        <tr>
            <td colspan="3" style="padding: 15px 0px;">
                I/WE THE UNDERSIGNED HAVE READ AND FULLY UNDERSTAND ALL THE NOTES AND THE TERMS AND CONDITIONS STATED IN THIS
                FORM AND I/WE WISH TO INVEST IN THE ABOVE-MENTIONED PREFERENCE SHARES AND AGREE TO BE BOUND BY THE AFOREMENTIONED NOTES, TERMS AND CONDITIONS. I/WE AM/ARE ALSO AWARE OF THE FEES AND CHARGES DIRECTLY AND
                INDIRECTLY INCURRED WHEN INVESTING. I/WE HEREBY DECLARE THAT I/WE AM/ARE THE BENEFICIAL OWNER(S) OF THIS INVESTMENT 
                AND THIS APPLICATION IS NOT FUNDED BY GAINS FROM ANY UNLAWFUL ACTIVITIES AND THAT THE SOURCE OF MY / OUR FUNDS ARE 
                FULLY COMPLIANT WITH THE ANTI-MONEY LAUNDERING AND ANTI TERRORISM LAWS OF MALAYSIA. (本人/我们已阅读并充分理解本申请 
                书的附加说明、条款和条件。本人/我们有意投资上述优先股,并同意遵守前述附加说明、条款和条件的规定。本人/我们也知悉投资每项/任 
                何基金时必须承担直接和间接的费用与收费。本人/我们特此声明,本人/我们为本投资的受益拥有人,同时声明即将投入的资金非来自任何非 
                法活动的收益。本人/我们的资金来源完全符合马来西亚的反洗钱和反恐法律。)
            </td>
        </tr>
        <tr>
            <td colspan="3" style="padding: 15px 0px;">
                I/WE ALSO ARE WELL AWARE OF AND FULLY AGREE TO BEAR AND TO TAKE ON FOR OURSELVES ONLY ALL THE INVESTMENT RISKS AS  
                OUTLINED IN THE FUND’S SUPPLEMENTARY INFORMATION MEMORANDUM AND TO ACCEPT THIS INVESTMENT AS A VENTURE ON MY 
                /OUR PART WITH AN UNCONDITIONAL ACCEPTANCE OF ANY RETURNS OR LOSSES AS THE CASE MAY BE WITHOUT ANY RECOURSE TO 
                THE FUND, THE FUND MANAGERS OR THE BOARD OF DIRECTORS. I/WE HAVE TAKEN THE ADVICE HIGHLIGHTED IN THE FUND’S 
                SUPPLEMENTARY INFORMATION MEMORANDUM AND HAVING READ AND FULLY UNDERSTOOD ALL THE CONTENTS HAVE 
                MYSELF/OURSELVES CONSULTED WITH INDEPENDENT AND COMPETENT INVESTMENT AND FINANCIAL ADVISERS BEFORE DECIDING TO 
                MAKE AN INVESTMENT IN THE FUND. (本人/我们亦清楚并完全同意只承受及承担基金补充信息备忘录所列的所有投资风险,并接受本项投 
                资为本人/我们的一项风险投资,并无条件接受任何回报或损失(视情况而定),而无需向基金,基金经理或董事会追索。本人/我们已采纳基 
                金补充信息备忘录中强调的建议,并已阅读并充分理解所有内容,在决定投资基金之前,本人/我们已与独立且有能力的投资和财务顾问协商。) 
            </td>
        </tr>
        </table>
        <table width="100%" class="fo-rm page-5 font-18 l-s"  >
        <tr>
            <td><b><u></u></b></td>
            <td><b><u></u></b></td>
        </tr>
        <tr>
            <td>--------------------------------<br>Principal Applicant (申请者)</td>
            <td>---------------------------------------------------------<br>Joint Applicant (if applicable) (联合申请者 (如果适用)</td>
        </tr>
        <tr>
            <td>Name(姓名): <?= $subscription->has('individual') ? $subscription->individual->salutation : '' ?> <?= $subscription->user->first_name ;?></td>
            <td>Name(姓名): 
                <?php
                    if($subscription->is_joint_applicant == 1){
                        echo  $subscription->ja_salutation." ".$subscription->ja_name;
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Date(日期): </td>
            <td>Date(日期): </td>
        </tr>
    </table>

    <!-- page 6 -->
    <div class="new-page"></div>

    <div class="pos-rel">
    <p class="watermark">Not applicable</p>

    <h3>(B) CORPORATE INVESTOR (企业投资者)</h3>
    <h4>Name and Particulars of Corporation(申请公司名称和资料)</h4>
    <table width="100%" class="page6" border="1px">
        <tr>
            <td class="cl-35">Name (as per Certificate of Incorporation)<br/>名称(如同法人实体的成立登记证)</td>
            <td></td>
        </tr>
        <tr>
            <td class="cl-35">Address:<br>(地址)</td>
            <td><br>
                <table border="1px" width="100%">
                    <tr>
                        <td>Postcode (邮编):</td>
                        <td>Mobile No.(手机号码): </td>
                    </tr>
                    <tr>
                        <td>Country (国家): </td>
                        <td>Email (电邮地址): </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="cl-35">Email (电邮地址)</td>
            <td></td>
        </tr>
        <tr>
            <td class="cl-35">Company No. (公司注册号码)</td>
            <td></td>
        </tr>
        <tr>
            <td class="cl-35">Country of Incorporation (注册国家)</td>
            <td></td>
        </tr>
        <tr>
            <td class="cl-35">Date of Incorporation (公司成立日期)-<br/>DD/MM/YYYY</td>
            <td></td>
        </tr>
        <tr>
            <td class="cl-35">Principal Business Activity (主要业务活动)</td>
            <td></td>
        </tr>
    </table>

    <h3>Type of Company -公司类型 (√)</h3>
    <table width="100%" class="page6" border="1px">
        <tr>
            <td></td>
            <td class="cl-30">Sole Proprietor (独资企业)</td>
            <td></td>
            <td class="cl-30">Private Limited (私人有限公司)</td>
            <td></td>
            <td class="cl-30">Public Limited (公众有限公司)</td>
        </tr>
        <tr>
            <td></td>
            <td class="cl-30">Partnership (合伙企业)</td>
            <td></td>
            <td class="cl-30">Organization/Foundation/Trust (组织/基金会/信托)</td>
            <td></td>
            <td class="cl-30">Others (其它)</td>
        </tr>
    </table>

    <h3>Redemption / Repurchase Instruction Only -仅限赎回或回购指示 (√)</h3>
    <table width="100%" class="page6" border="1px">
        <tr>
            <td></td>
            <td class="cl-40">One To Sign (其中一人签字)</td>
            <td></td>
            <td class="cl-40">Both To Sign (两人签字)</td>
        </tr>
    </table>

    <h3>Payment Instruction for Dividend Payouts -(红利支付指示)</h3>
    <table width="100%" class="page6" border="1px">
        <tr>
            <td class="cl-35">Name of Payee (收款人名称)</td>
            <td>(Must be the name of the Principal Applicant - 必须是申请者的姓名)</td>
        </tr>
        <tr>
            <td class="cl-35">Bank Name (银行名称)</td>
            <td></td>
        </tr>
        <tr>
            <td class="cl-35">Address (地址)</td>
            <td></td>
        </tr>
        <tr>
            <td class="cl-35">Account Number (账号)</td>
            <td>Account Type (√ )(帐户类型 - √ ) <br>
                ( &nbsp;)Current (来往账户) ( &nbsp;)Savings (储蓄账户)
            </td>
        </tr>
        
        <tr>
            <td class="cl-35">SWIFT Code (SWIFT代码)</td>
            <td></td>
        </tr>
    </table>

    <h3>Investment Details -(投资信息)</h3>
    <table width="100%" class="page6" border="1px">
        
        <tr>
            <td class="cl-35">Amount(USD)金额(美元):</td>
            <td>
                <table class="">
                    <tr>
                        <td><input type="checkbox" /> Initial Investment<br/>(首次投资)</td>
                        <td><input type="checkbox" /> Additional Investment<br/>(附加投资)</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="cl-35">Processing Fee (汇款/支票号码) :</td>
            <td>Remitting/Issuing Bank(汇款/开证银行):</td>
        </tr>
        <tr>
            <td class="cl-35">Subscription Fee (%) (费用-%):</td>
            <td>Total Amount (USD) (金额-美元):</td>
        </tr>
    </table>


    <p>Any specific instructions (if any) kindly write in to the Company (任何具体说明(如有)请以书信通知公司)</p>
    <h7>DECLARATION BY APPLICANT(S) (投资者声明):</h7>
        
    <p>
        I/WE THE UNDERSIGNED HEREBY AFFIRM THAT ON MY OWN BEHALF, FREE WILL, CHOICE AND INITIATE HAVE ENQUIRED ABOUT THE FUND AND REQUESTED THE FUND’S DISTRIBUTOR / SALES AGENT OF THE FUND TO BRIEF AND/OR PROVIDE INFORMATION ABOUT THE FUND TO OURSELVES. THE INFORMATION PRESENTED, RECEIVED, AND LEARNED FROM THE DISTRIBUTOR / SALES AGENT SHALL BE TREATED AS STRICTLY PRIVATE AND CONFIDENTIAL AND FOR OUR OWN CONSUMPTION AND REFERENCE ONLY. (本人/我们,以下署名者, 特此声明本人乃是代表本身,并在自己的选择下,出于自愿和自发的精神对本基金提出查询,并要求本基金或其代理人为本人/我们扼要讲解 和/提供本基金的相关信息。对于基金或其代理人向本人/我们呈现的信息,本人/我们将严加保密,仅供本身参考和使用。)
    </p>
    </div>

    <!-- page 7 -->
    <div class="new-page"></div>
    <div class="pos-rel">
    <p class="watermark">Not applicable</p>
    <p>
        I/WE FULLY UNDERSTAND THAT THE FUND IS STRICTLY NOT INTENDED TO BE MARKETED OR OFFERED IN MALAYSIA OR MADE AVAILABLE TO ANY MALAYSIANS IN MALAYSIA EXCEPT LABUAN. THE RELEVANT MALAYSIAN AUTHORITIES INCLUDING THE SECURITIES COMMISSION MALAYSIA AND LABUAN FINANCIAL SERVICES AUTHORITY ARE NOT LIABLE FOR ANY NONDISCLOSURE OR MISLEADING STATEMENT ON THE PART OF THE FUND AND TAKE NO RESPONSIBILITY ON THE CONTENTS OF THE SUPPLEMENTARY INFORMATION MEMORANDUM OF THE FUND. THESE AUTHORITIES ALSO TAKE NO REPRESENTATIONS ON THE ACCURACY AND COMPLETENESS OF THE SUPPLEMENTARY INFORMATION MEMORANDUM OF THE FUND AND SHALL NOT BE CLAIMED ON ANY LIABILITY WHATSOEVER ARISING FROM, OR IN RELIANCE UPON, THE WHOLE OR ANY PART OF THE CONTENT OF THE SUPPLEMENTARY INFORMATION MEMORANDUM OF THE FUND. (本人/ 我们明白,除了在纳闽,本基金不拟在马来西亚境内销售,或在马来西亚境内提供应给任何马来西亚人。马来西亚证券委员会和纳闽金融服务管理局等相关马来西亚当局不对本基金可能产生的信息遗漏或误导性陈述负责,也不对基金补充信息备忘录呈现的内容负责。此外,上述有关当局概不对基金补充信息备忘录的准确性和完整性作出任何陈述,也不应被要求对基金补充信息备忘录的全部或任何部分内容所招致或引起的任何情况承担任何责任。)</p>
    
    <p>
        I/WE CONFIRM THAT I/WE AM/ARE A SOPHISTICATED INVESTOR BY ALL DEFINITIONS OF THAT CLASSIFICATION KNOWN TO ME; I/WE AM/ARE A SAVVY INVESTOR, I/WE MAKE MY/OUR OWN INVESTMENT DECISIONS AND HAVE LEGALLY ACQUIRED ASSETS AVAILABLE. (凭着本人/我们对各类型投资者的定义的了解,本人/我们确认本身为一名成熟的投资者,也是一名精明的投资者。本人/我们有能力自行作投资 决定,并拥有通过合法途径获得的资产。)</p>

    <p>
        I/WE FURTHER CONFIRM THAT I/WE HAVE REQUESTED INFORMATION FROM THE DISTRIBUTOR / SALES AGENT AND THE DISTRIBUTOR / SALES AGENT HAVE NEITHER SOLICITS OFFERS NOR MARKETS THE FUND TO ME/US DIRECTLY OR INDIRECTLY. THE INFORMATION PROVIDED BY THE DISTRIBUTOR / SALES AGENT IS MERELY INTENDED TO PROVIDE BACKGROUND AND SALIENT INFORMATION OF THE FUND ONLY. IT DOES NOT AMOUNT TO A RECOMMENDATION, OFFER OR INVITATION, EITHER EXPRESSLY OR IMPLICATION, TO MAKE AN INVESTMENT IN THE FUND. \ (本人/我们进一步确认,本人/我们已要求基金或其代理人提供信息,而基金或其代理人并无直接或间接向本人/我们提出献购或销售本基金。基金或其代理人所提供的信息仅为说明该基金的背景和重点,不可等同为对本基金作出明示或暗示性投资建议、献议或邀约。)</p>

    <p>
        I/WE UNDERSTAND THAT I/WE SHOULD RELY ON MY/OUR OWN EVALUATION TO ASSESS THE MERITS AND RISKS OF THE INVESTMENT. IN CONSIDERING THE INVESTMENT, IF IN DOUBT AS TO THE ACTION TO BE TAKEN, I//WE SHALL CONSULT A QUALIFIED ADVISER IMMEDIATELY. I/WE CONFIRM THAT THE DISTRIBUTOR / SALES AGENT IS SHARING INFORMATION ABOUT THE FUND WITH ME/US ON A REVERSE ENQUIRY BASIS INITIATED BY ME/US. I/WE AGREE THAT ALL EMAILS AND FACSIMILE TRANSMITTED DOCUMENTS SHALL BE TREATED AS ORIGINAL DOCUMENTS. (本人/我们明白本人应凭个人的判断力来评估投资的优势与风险。在考虑投资时,若对本身即将采取
    的行动有所疑虑,本人/我们将即刻咨询合格的投资顾问。本人/我们确认,基金或其代理人乃是基于本人/我们发出投资询问而展开反向查询, 再与我/我们分享本基金的信息。本人/我们同意,所有电子邮件和通过传真发送的文件将被视为原件处理。)</p>

    <p>
        I/WE THE UNDERSIGNED HAVE READ AND FULLY UNDERSTAND ALL THE NOTES AND THE TERMS AND
    CONDITIONS STATED IN THIS FORM AND I/WE WISH TO INVEST IN THE ABOVE-MENTIONED PREFERENCE SHARES AND AGREE TO BE BOUND BY THE AFOREMENTIONED NOTES, TERMS AND CONDITIONS. I/WE AM/ARE ALSO AWARE OF THE FEES AND CHARGES DIRECTLY AND INDIRECTLY INCURRED WHEN INVESTING. I/WE HEREBY DECLARE THAT I/WE AM/ARE THE BENEFICIAL OWNER(S) OF THIS INVESTMENT AND THIS APPLICATION IS NOT FUNDED BY GAINS FROM ANY UNLAWFUL ACTIVITIES AND THAT THE SOURCE OF MY / OUR FUNDS ARE FULLY COMPLIANT WITH THE ANTI-MONEY LAUNDERING AND ANTI TERRORISM LAWS OF MALAYSIA. (本人/我们已阅读并充分理解本申请书的附加说明、条款和条件。本人/我们有意投资上述优先股,并同意遵守前述附加说明、条款和条件的规定。本人/我们也知悉投资每项/任何基金时必须承担直接和间接的费用与收费。本人/我们特此声明,本人/我们为本投资的受益拥有人,同时声明即将投入的资金非来自任何非法活动的收益。本人/我们的资金来源完全符合马来西亚的反洗钱和反恐法律。)</p>

    <p>
        I/WE ALSO ARE WELL AWARE OF AND FULLY AGREE TO BEAR AND TO TAKE ON FOR OURSELVES ONLY ALL THE INVESTMENT RISKS AS OUTLINED IN THE FUND’S SUPPLEMENTARY INFORMATION MEMORANDUM AND TO ACCEPT THIS INVESTMENT AS A VENTURE ON MY /OUR PART WITH AN UNCONDITIONAL ACCEPTANCE OF ANY RETURNS OR LOSSES AS THE CASE MAY BE WITHOUT ANY RECOURSE TO THE FUND, THE FUND MANAGERS OR THE BOARD OF DIRECTORS. I/WE HAVE TAKEN THE ADVICE HIGHLIGHTED IN THE FUND’S SUPPLEMENTARY INFORMATION MEMORANDUM AND HAVING READ AND FULLY UNDERSTOOD ALL THE CONTENTS HAVE MYSELF/OURSELVES CONSULTED WITH INDEPENDENT AND COMPETENT INVESTMENT AND FINANCIAL ADVISERS BEFORE DECIDING TO MAKE AN INVESTMENT IN THE FUND. (本人/我们亦清楚并完全同意只承受及承担基金补充信息备忘录所列的所有投资风险,并接受本项投资为本人/我们的一项风险投资,并无条件接受任何回报或损失(视情况而定),而无需向基金,基金经理或董事会追索。本人/我们已采纳基金补充信息备忘录中强调的建议,并已阅读并充分理解所有内容,在决定投资基金之前,本人/我们已与独立且有能力的投资和财务顾问协商。</p>


    <table width="100%" class="page7 fo-rm">
        <tr>
            <td colspan="2"></td>
            <td height="150px" style="border: 1px solid #000; vertical-align:top;">
                Company Seal (公司印章)</td>
        </tr>
        <tr>
            <td>____________________________________</td>
            <td>____________________________________</td>
            <td></td>
        </tr>
        <tr>
            <td>Authorized Signature (签字人)</td>
            <td>Authorized Signature (签字人)</td>
            <td></td>
        </tr>
        <tr>
            <td>Position (职位):</td>
            <td>Position (职位):</td>
            <td></td>
        </tr>
        <tr>
            <td>Date (日期):</td>
            <td>Date (日期):</td>
            <td></td>
        </tr>
    </table>
    </div>

    <!-- page 8 -->
    

    <div class="new-page"></div>

    <h1 class="t-c font-22">MCIL INTERNATIONAL LIMITED (Company No. LL14041) <br><p class="t-c font-16">(A private fund company incorporated in the Federal Territory of Labuan, Malaysia)</p></h1>
    
    <hr class="double">
    <hr class="double">
    <p  class="t-c font-20" style="border-bottom: 2px solid #000;font-weight: 700;">DECLARATION ON SOURCE OF FUNDS (关于资金来源的宣言) </p>

    <p class="font-18">I/we understand that I/we am/are required to declare the source of the funds that I/we will be depositing into the account/s including future deposits whether in cash, cheque, EFT, RTGS, SWIFT or any other method. Accordingly, I/we wish to declare as follows: (本人/我们理解, 本人/我们需要申报本人/我们将存入账户的资金来源,包括未来存款,无论是现金,支票,电子转帐(EFT),实时结算(RTGS),SWIFT或是任何其他方式。 因此,本人/我们希望申报如下:)</p>

    <br>

    <p class="font-18" style="width: 100%;">That, I/We (本人/我们) <span class="underline_text"><?= $subscription->has('individual') ? $subscription->individual->salutation : '' ?> <?= $subscription->user->first_name; ?> </span></p>
    <p class="font-18">(Name/s of account holder/holders) (账户持有人的名称) of (在于)</p>
    <p class="font-18" style="border-bottom: 1px solid #000;width: 100%;margin-bottom: 10px;">
        <?= $subscription->user->address_line1 ?>  
                    <?= $subscription->user->address_line_2 ?>  
                    <?= $subscription->user->city ?> 
                    <?= $subscription->user->post_code ?>  
                    <?= $subscription->has('user') ? $subscription->user->stateAs->name : '' ?> 
                    <?= $subscription->has('user') ? $subscription->user->countryAs->name : '' ?> </p>
    <p class="font-18" style="border-bottom: 1px solid #000;width: 100%;margin-bottom: 10px;"> </p>
    
    <p class="font-18">(address-地址) do hereby declare that the source of the funds that: (在此声明资金来源:)-</p>
    <p class="font-18">The income depositing into my/our account is/are from the source of (tick as appropriate, can be more than one): (存入本人/我们账户的收入来自(根据需要勾选,可以多于一个)):</p>

    <?php
        $source_wealths = $subscription->has('individual') ? explode(', ',$subscription->individual->source_wealth) : '';
        
        $source_array = [
            "Personal Saving / Salary"=>'<p class="font-18">(&nbsp;$$$&nbsp;&nbsp;) &nbsp;&nbsp;Personal Saving / Salary (个人储蓄/工资)</p>',
            "Business Income" => '<p class="font-18">(&nbsp;$$$&nbsp;&nbsp;) &nbsp;&nbsp; Business Income (营业收入)</p>',
            "Dividends from other entry" => '<p class="font-18">(&nbsp;$$$&nbsp;&nbsp;) &nbsp;&nbsp; Dividends from other entry (来自其他投资项目的股息)</p>',
            "Benefits of transactions due to me all of which are known to me" => '<p class="font-18">(&nbsp;$$$&nbsp;&nbsp;) &nbsp;&nbsp; Benefits of transactions due to me all of which are known to me. (应付给我的交易收益而所有这 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp; 些交易 都是我所知道)</p>',
            "Other" => '<p class="font-18">(&nbsp;$$$&nbsp;&nbsp;) &nbsp;&nbsp; Others (please provide details) (其他 (请提供详细信息))</p> <p class="font-18" style="border-bottom: 1px solid #000;width: 100%;margin-bottom: 30px">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;'.$subscription->individual->source_wealth_other.'</p>'
        ];

        foreach($source_array as $source_key => $source_wealth){
            //echo $source_array;
            foreach($source_wealths as $source_wealth2){
                
                if($source_wealth2 == $source_key){
                    $source_array[$source_key] = str_replace("$$$","√",$source_wealth);
                    break;
                }   
            }
        }

        foreach($source_array as $source_key3 => $source_wealth3){
            echo str_replace("$$$","&nbsp;",$source_wealth3);
        }
    ?>

    <p class="font-18">I/we further confirm that these funds are derived from legitimate sources as stated above; and I/we will also provide the required evidence of the source of funds if required to do so in future. (本人/我们 进一步确认, 上述资金来自合法的来源;如果今后需要, 本人/我们还将提供所需的资金来源证据。)</p>
    <p class="font-18" style="margin-top: 15px;margin-bottom: 40px">I/we declare the foregoing details to be true. (本人/我们也在此声明上述细节属实。)</p>
    
    <table width="100%">
            <tr>
                <td width="20%"><p class="font-18">Signature(签字) :</p></td>
                <td width="30%"></td>
                <td><p class="font-18"> Name(姓名): <?= $subscription->has('individual') ? $subscription->individual->salutation : '' ?> <?= strtoupper($subscription->user->first_name); ?></p></td>
            </tr>
            <tr>
                <td><p class="font-18">Date(日期) : </p></td>
                <td><p class="font-18"></p></td>
                <td></td>
            </tr>
    </table>

    <?php if($subscription->is_first == 1){ ?>

    <!-- page 9 -->
    <div class="new-page"></div>    
    <p class="font-22" style="font-weight: 700;width: 100%;position: relative">CRS Individual Self Certification Form <span style="position: absolute;right: 20px;">CRS-01</span></p>
    <p class="l-s font-18">Please read these instructions before completing this form</p>
    <p style="font-weight: 700;width: 100%; margin: 20px 0px;" class="font-22">Why are we asking you to complete this form?</p>

    <p class="l-s font-18">To help protect the integrity of tax systems, governments around the world are introducing a new information-gathering and reporting requirement for financial institutions. This is known as the Common Reporting Standard (“the CRS”).</p>

    <p class="l-s font-18">Under the CRS, we are required to determine where you are “tax resident” (this will usually be where you are liable to pay income taxes). If you are tax resident outside the country/jurisdiction where your account is held we may need to give the national tax authority this information, along with information relating to your accounts. That may then be shared between different countries’ tax authorities.</p>

    <p class="l-s font-18">Completing this form will ensure that we hold accurate and up to date information about your tax residency.</p>

    <p class="l-s font-18">If your circumstances change and any of the information provided in this form becomes incorrect, please immediately and provide an updated self-certification.</p>

    <h4 style="font-weight: 700;width: 100%; margin: 20px 0px;" class="font-22">Who should complete the CRS Individual Self Certification Form?</h4>

    <p class="l-s font-18">Investor or applicant of MCIL International Limited should complete this form. Our company is not responsible or liasee for any subsequent non-disclosure of your latest information. Contact us by email of ccs@mcilintl    .com.</p>

    <p class="l-s font-18">If you need to self-certify on behalf of an entity (which includes businesses, trusts and partnerships) complete an ‘Entity Tax residency’ Self-Certification Form (CRS-E). Similarly, if you are a controlling person of an entity, complete a ‘Controlling Person Tax Residency Self-Certification Form (CRS-CP).</p>

    <p class="l-s font-18">For joint account holders, each individual will need to complete a copy of the form.</p>

    <p class="l-s font-18">Even if you have already provided information in relation to the United States Government’s Foreign Account Tax Compliance Act (“FATCA”), you may still need to provide additional information for the CRS as this is a separate regulation.</p>

    <h4 style="font-weight: 700;width: 100%; margin: 20px 0px;" class="font-22">Where to go for further information</h4>

    <p class="l-s font-18">The ‘Organisation for Economic Co-operation and Development’ (OECD) has developed the rules to be used by all governments participating in the CRS and these can be found on the OECD’s “Automatic Exchange of Information” (AEOI) website, http://www.oecd.org/tax/automatic-exchange/common-reporting-standard/</p>

    <p class="l-s font-18">If you have any questions on how to define your tax residency status, please visit the OECD website, www.oecd.org/tax/automatic-exchange/ or speak to your tax advisor as we are not allowed to give tax advice.</p>

    <p class="l-s font-18">You can find a list of definitions in the Appendix.</p>

    <!-- page 10 -->
    <div class="new-page"></div>

    <h1 class="font-22 f-w-8" style="width: 100%;position: relative">Individual Tax Residency Self-Certification Form<span style="position: absolute;right: 20px;"> CRS - I</span></h1>
    <h1 class="font-22 f-w-7" style="width: 100%;">Part 1 – Identification of Individual Account Holder</h1>

    <table class="table fo-rm" style="width:100%;margin-bottom: 30px">
        
        <tr>
            <td class="font-15 f-w-7">A. Name of Account Holder:</td>
            <td></td>
        </tr>
        <tr>
            <td class="font-15">Name :</td>
            <td class="font-15"> <?= $subscription->has('individual') ? $subscription->individual->salutation : '' ?> <?= $subscription->user->first_name;?></td>
        </tr>
        <tr>
            <td class="font-15">NRIC/Passport No. (For Foreigners):</td>
            <td class="font-15"><?= $subscription->has('individual') ? $subscription->individual->passport : '' ?></td>
        </tr>
        <tr>
            <td class="font-15">Date of Birth (dd/mm/yyyy):</td>
            <td class="font-15"><?= $subscription->has('individual') ? date('d-m-Y', strtotime($subscription->individual->dob)) : '' ?></td>
        </tr>
    </table>

    <table  class="table fo-rm" style="width:100%;margin-bottom: 10px">
        <tr>
            <td class="font-15 f-w-7">B. Current Residence Address:</td>
            <td class="font-15"></td>
        </tr>
        <tr>
            <td class="font-15">Line 1 (e.g. House/Apt/Suite Name, Number, Street):</td>
            <td class="font-15"><?= $subscription->user->address_line1 ?>  <?= $subscription->user->address_line2 ?></td>
        </tr>
        <tr>
            <td class="font-15">Line 2 (e.g. Town/City/Province/County/State)</td>
            <td class="font-15"><?= $subscription->user->city ?> <?= $subscription->has('user') ? $subscription->user->stateAs->name : '' ?></td>
        </tr>
        <tr>
            <td class="font-15">Country:</td>
            <td class="font-15"><?= $subscription->has('user') ? $subscription->user->countryAs->name : '' ?></td>
        </tr>
        <tr>
            <td class="font-15">Postal Code/ZIP Code:</td>
            <td class="font-15"><?= $subscription->user->post_code ?> </td>
        </tr>
    </table>

    <table  class="table fo-rm" style="width:100%;margin-bottom: 10px">
        <tr>
            <td colspan="2"  class="font-15 f-w-7">C. Mailing Address: (please only complete if different to the address shown in Section B)</td>
        </tr>
        <tr>
            <td class="font-15">Line 1 (e.g. House/Apt/Suite Name, Number, Street):</td>
            <td class="font-15">
                <?php
                    echo $subscription->tr_addr_line_1;
                    echo $subscription->tr_addr_line_2;
                ?>
            </td>
        </tr>
        <tr>
            <td class="font-15">Line 2 (e.g. Town/City/Province/County/State)</td>
            <td class="font-15">
                <?php
                    echo $subscription->tr_city;
                    echo "&nbsp;";
                    echo $subscription->tr_state_id ? $subscription->SubscriptionTrState->name : '';
                    echo "&nbsp;";
                ?>
            </td>
        </tr>
        <tr>
            <td class="font-15">Country:</td>
            <td class="font-15">
                <?php
                    echo $subscription->tr_country_id ? $subscription->SubscriptionTrCountry->name : '';
                ?>
            </td>
        </tr>
        <tr>
            <td class="font-15">Postal Code/ZIP Code:</td>
            <td class="font-15">
                <?php echo $subscription->tr_postcode; ?>
            </td>
        </tr>
    </table>

    <!-- page 11 -->
    <div class="new-page"></div>

    <h2>Part 2 – Jurisdiction(s) of Residence for Tax Purposes and related Taxpayer Identification</h2>
    <h2>Number or equivalent number (“TIN”) (See Appendix)</h2>

    <p class="font-18">Please complete the following table indicating (i) where the Account Holder is tax resident and (ii) the Account Holder’s TIN for each country/jurisdiction indicated.</p>

    <p class="font-18">If the Account Holder is tax resident in more than three countries please use a separate sheet</p>

    <p class="font-18">If a TIN is unavailable please provide the appropriate reason A, B or C where indicated below:</p>

    <p class="font-18"><b>Reason A</b> - The country/jurisdiction where the Account Holder is liable to pay tax does not issue TINs to its residents</p>

    <p class="font-18"><b>Reason B</b> - The Account Holder is otherwise unable to obtain a TIN or equivalent number (Please explain why you are unable to obtain a TIN in the below table if you have selected this reason)</p>

    <p class="font-18"><b>Reason C</b> - No TIN is required. (Note. Only select this reason if the authorities of the country/jurisdiction of tax residence entered below do not require the TIN to be disclosed)</p>

    <br>
    <table class="page11">
        <tbody>
        <tr>
            <td height="60" width="5%"></td>
            <td width="35%" align="center">Country(ies) / Jurisdiction(s) of tax<br/>residence</td>
            <td width="25%" align="center">TIN</td>
            <td width="35%" align="center">If no TIN available enter Reason<br/>A, B or C</td>
        </tr>

    
        <tr>
            <td height="60" width="5%">1.</td>
            <td height="60" width="35%"><?= $subscription->td1_country_id ? $subscription->SubscriptionTd1Country->name : '' ?></td>
            <td height="60" width="25%"><?= $subscription->td1_tax_number ?></td>
            <td height="60" width="35%">
                <?php
                    if($subscription->td1_tax_reason_type == 1){
                        echo "Reason A";
                    }else if($subscription->td1_tax_reason_type == 2){
                        echo "Reason B";
                        echo "-".$subscription->td1_tax_reason;

                    }else if($subscription->td1_tax_reason_type == 3){
                        echo "Reason C";
                    }
                ?>
            </td>
        </tr>

        <tr>
            <td height="60" width="5%">2.</td>
            <td height="60" width="35%"><?= $subscription->td2_country_id ? $subscription->SubscriptionTd2Country->name : '' ?></td>
            <td height="60" width="25%"><?= $subscription->td2_tax_number ?></td>
            <td height="60" width="35%">
                <?php
                    if($subscription->td2_tax_reason_type == 1){
                        echo "Reason A";
                    }else if($subscription->td2_tax_reason_type == 2){
                        echo "Reason B";
                        echo "-".$subscription->td2_tax_reason;

                    }else if($subscription->td2_tax_reason_type == 3){
                        echo "Reason C";
                    }
                ?>
            </td>
        </tr>

        <tr>
            <td height="60" width="5%">3.</td>
            <td height="60" width="35%"><?= $subscription->td3_country_id ? $subscription->SubscriptionTd3Country->name : '' ?></td>
            <td height="60" width="25%"><?= $subscription->td3_tax_number ?></td>
            <td height="60" width="35%">
                <?php
                    if($subscription->td3_tax_reason_type == 1){
                        echo "Reason A";
                    }else if($subscription->td3_tax_reason_type == 2){
                        echo "Reason B";
                        echo "-".$subscription->td3_tax_reason;

                    }else if($subscription->td3_tax_reason_type == 3){
                        echo "Reason C";
                    }
                ?>
            </td>
        </tr>

        </tbody>
    </table>

    <br>
    <p class="font-18">Please explain in the following boxes why you are unable to obtain a TIN if you selected Reason B above.</p>
    <br>

    <table width="100%" class="page11">
        <tr>
            <td height="80" width="5%">1. </td>
            <td height="80"><?= $subscription->td1_tax_reason; ?></td>
        </tr>
        <tr>
            <td height="80" width="5%">2. </td>
            <td height="80"><?= $subscription->td2_tax_reason; ?></td>
        </tr>
        <tr>
            <td height="80" width="5%">3. </td>
            <td height="80"><?= $subscription->td3_tax_reason; ?></td>
        </tr>
    </table>

    <!-- page 12 -->
    <div class="new-page"></div>
    <h2>Part 3 – Declarations and Signature</h2>

    <p class="font-18">I understand that the information supplied by me is covered by the full provisions of the terms and conditions governing the Account Holder’s relationship with MCIL International Limited setting out how MCIL International Limited may use and share the information supplied by me.</p>

    <p class="font-18">I acknowledge that the information contained in this form and information regarding the Account Holder and any Reportable Account(s) may be provided to the tax authorities of the country/jurisdiction in which this account(s) is/are maintained and exchanged with tax authorities of another country(ies)/Jurisdictions(s) in which the Account Holder may be tax resident pursuant to intergovernmental agreements to exchange financial account information.</p>

    <p class="font-18">I certify that I am the Account Holder (or am authorised to sign for the Account Holder) of all the account(s) to which this form relates.</p>

    <p class="font-18">I certify that where I have provided information regarding any other person (such as a Controlling Person or other Reportable Person to which this form relates) that I will, within 30 days of signing this form, notify those persons that I have provided such information to MCIL International Limited and that such information may be provided to the tax authorities of the country/jurisdiction in which the account(s) is/are maintained and exchanged with tax authorities of another country(ies)/jurisdiction(s) in which the person may be tax resident pursuant to intergovernmental agreements to exchange financial account information.</p>

    <p class="font-18">I declare that all information made in this form are, to the best of my knowledge and belief, correct and complete. I undertake to advise MCIL International Limited within 30 days of any change in circumstances which affects the tax residency status of the individual identified in Part 1 of this form or causes the information contained herein to become incorrect, and to provide MCIL International Limited with a suitably updated self-certification and Declaration within 90 days of such change in circumstances.</p>

    <br><br>

    <table width="100" class="table" style="padding: 20px;">
        <tbody>
            <tr>
                <td height="150" width="30%" class="font-18">Signature:</td>
                <td><u></u></td>
            </tr>
            <tr>
                <td height="30" class="font-18">Name:</td>
                <td height="30" class="font-18"><?= $subscription->has('individual') ? $subscription->individual->salutation : '' ?> <?= strtoupper($subscription->user->first_name); ?></td>
            </tr>
            <tr>
                <td height="50" class="font-18">Date:</td>
                <td height="50" class="font-18"></td>
            </tr>
        </tbody>
    </table>

    <!-- page 13 -->
    <div class="new-page"></div>

    <h2>Appendix – Definitions</h2>
    
    <table width="100%" class="page13">
        <tbody>
        <tr>
            <td width="15%" class="font-15 f-w-6">Account Holder</td>
            <td>Means the person listed or identified as the holder of a Financial Account. A person, other than a Financial Institution, holding a Financial Account for the benefit of another person as an agent, a custodian, a nominee, a signatory, an investment advisor, an intermediary, or as a legal guardian, is not treated as the Account Holder. In these circumstances that other person is the Account Holder. For example, in the case of a parent/child relationship where the parent is acting as a legal guardian, the child is regarded as the Account Holder. With respect to a jointly held account, each joint holder is treated as an Account Holder.</td>
        </tr>
        <tr>
            <td width="15%" class="font-15 f-w-6">Controlling Person</td>
            <td>This is a natural person who exercises control over an entity. Where an entity Account Holder is treated as a Passive Non-Financial Entity (“NFE”) then a Financial Institution must determine whether such Controlling Persons are Reportable Persons. This definition corresponds to the term “beneficial owner” as described in Recommendation 10 of the Financial Action Task Force Recommendations (as adopted in February 2012). If the account is maintained for an entity of which the individual is a Controlling Person, then the “Controlling Person tax residency self-certification” form should be completed instead of this form.</td>
        </tr>
        <tr>
            <td width="15%" class="font-15 f-w-6">Entity</td>
            <td>means a legal person or a legal arrangement, such as a corporation, organisation, partnership, trust or foundation.</td>
        </tr>
        <tr>
            <td width="15%" class="font-15 f-w-6">Financial Account</td>
            <td>A Financial Account is an account maintained by a Financial Institution and includes: Depository Accounts; Custodial Accounts; Equity and debt interest in certain Investment Entities; Cash Value Insurance/ Takaful Contracts; and Annuity Contracts.</td>
        </tr>
        <tr>
            <td width="15%" class="font-15 f-w-6">Participating Jurisdiction</td>
            <td>Means a jurisdiction with which an agreement is in place pursuant to which it will provide the information required on the automatic exchange of financial account information set out in the Common Reporting Standard.</td>
        </tr>
        <tr>
            <td width="15%" class="font-15 f-w-6">Reportable Account</td>
            <td>Means an account held by one or more Reportable Persons or by a Passive NFE with one or more Controlling Persons that is a Reportable Person </td>
        </tr>
        <tr>
            <td width="15%" class="font-15 f-w-6">Reportable Jurisdiction</td>
            <td>Means a jurisdiction with which an obligation to provide financial account information is in place.</td>
        </tr>
        <tr>
            <td width="15%" class="font-15 f-w-6">Reportable Person</td>
            <td>Means as an individual who is tax resident in a Reportable Jurisdiction under the tax laws of that jurisdiction. Dual resident individuals may rely on the tiebreaker rules contained in tax conventions (if applicable) to solve cases of double residence for purposes of determining their residence for tax purposes.</td>
        </tr>
        <tr>
            <td width="15%" class="font-15 f-w-6">TIN</td>
            <td>Means Taxpayer Identification Number or a functional equivalent in the absence of a TIN. A TIN is a unique combination of letters or numbers assigned by a jurisdiction to an individual or an Entity and used to identify the individual or Entity for the purposes of administering the tax laws of such jurisdiction. Further details of acceptable TINs can be found at the following link OECD automatic exchange of information portal.</td>
        </tr>
        <tr>
            <td></td>
            <td>Some jurisdictions do not issue a TIN. However, these jurisdictions often utilise some other high integrity number with an equivalent level of identification (a “functional equivalent”). Examples of that type of number include, for individuals, a social security/insurance/takaful number, citizen/personal identification/service code/number, and resident registration number.</td>
        </tr>  
        </tbody>
    </table>

    <!-- page 14 -->
    <div class="new-page"></div>

    <table class="page14">
        <tbody>
        <tr>
            <td class="f-w-7" style="font-size: 22px;" align="center">Foreign Account Tax Compliance Act (“FATCA”) – Individual Self Certification</td>
        </tr>
        <tr>
            <td>Please complete this self-certification form carefully. All information requested on the form is mandatory and need to be completed in full.<br>

            <b>Note: Please do not complete this self-certification form if you are not a natural person, instead please use the self-certification form for companies.</b></td>
        </tr>
        <tr>
            <td class="f-w-7" style="font-size: 20px;">Section A – Applicant Information</td>
        </tr>
        </tbody>
    </table>

    <br>
    
    <table class="page14">
        <tbody>
            <tr>
                <td rowspan="3">1. Full name <br><br>
                    2. IC number/passport number <br><br>
                    3. Date of Birth (DD-MM-YYYY)
                </td>
                <td colspan="2" class="font-15"><?= $subscription->has('individual') ? $subscription->individual->salutation : '' ?> 
                    <?= strtoupper($subscription->user->first_name); ?></td>
            </tr>
            <tr>
                <td colspan="2" class="font-15">
                    <?= $subscription->has('individual') ? $subscription->individual->passport : '' ?></td>
            </tr>
            <tr>
                <td colspan="2" class="font-15">
                    <?php
                        if( $subscription->individual->dob){
                             echo $subscription->has('individual') ? date('d-m-Y', strtotime($subscription->individual->dob)) : '';
                        } 
                    ?></td>
            </tr>
        </tbody>
    </table>

    <br>

    <table class="page14">
        <tr>
            <td>4. Resident Address (supported by a valid governmental document)</td>
            <td>
                <?php
                    echo "Address line 1 : ".$subscription->tr_addr_line_1."<br>";
                    echo "Address line 2 : ".$subscription->tr_addr_line_2." ".$subscription->tr_postcode."<br>";

                    echo "City : "; 
                    echo $subscription->tr_city;

                    echo $subscription->tr_state_id ? $subscription->SubscriptionTrState->name : '';
                    echo "<br>";
                    echo "Country : ";
                    echo $subscription->tr_country_id ? $subscription->SubscriptionTrCountry->name : '';
                ?>
            </td>
        </tr>
    </table>

    <br>

    <table class="page14">
        <tr>
            <td>5. Mailing Address (if different with resident address)</td>
            <td>
                Address line 1:<br>
                Address line 2:<br>
                City:  Country:
            </td>
        </tr>
    </table>

    <br>

    <table class="page14">
        <tbody>
        <tr>
            <td colspan="3" width="100%"><h4>Section B – Identifying Residency and source of income for Tax Purposes</h4></td>
        </tr>
        </tbody>
    </table>

    <table class="page14">
        <tbody>
        <tr>
            <td width="45%">6. Are you a U.S. citizen or a U.S. Resident including a green card holder?</td>
            <td width="10%">YES/ <span style="background-color: #e1ecf4;">NO</span></td>
            <td width="45%">If the answer is yes, please provide a W-9 form and your Tax Payer Identification Number (US TIN)</td>
        </tr>
        <tr>
            <td>7. Is U.S. your country of birth?</td>
            <td>YES/ <span style="background-color: #e1ecf4;">NO</span></td>
            <td>If the answer is yes, please provide a W-8BEN and MyKad/Malaysian Passport/ Loss of nationality</td>
        </tr>
        <tr>
            <td>8. Do you have residence address or mailing address (including a U.S. post office box) in the U.S.?</td>
            <td>YES/ <span style="background-color: #e1ecf4;">NO</span></td>
            <td>If the answer is yes, please provide a W-8BEN and MyKad/ Malaysian Passport/ Certificate of Residence</td>
        </tr>
        <tr>
            <td>9. Do you have a current U.S. telephone number?</td>
            <td>YES/ <span style="background-color: #e1ecf4;">NO</span></td>
            <td>If the answer is yes, please provide a W-8BEN and MyKad/Malaysian Passport</td>
        </tr>
        </tbody>
    </table>

    <br>

    <table class="page14">
        <tbody>
        <tr>
            <td><h4>Section C – Certification</h4></td>
        </tr>
        <tr>
            <td>
                1. Under penalties of perjury, I declare that I have examined the information on this form and to the best of my knowledge and believe it is true, correct and complete.<br>
                2. I agree to provide a copy of this form, or use and disclose the information mentioned above to any third party, or any competent authority responsible for the institution FATCA compliance<br>
                3. I am the individual that is the beneficial owner (or an authorized to sign for the individual that is the beneficial owner) of all the income to which this form relates or am using this form to document myself as an individual that is an owner or account holder of a foreign financial institution<br>
                4. I understand and agree that on specific request from any relevant tax authorities or any party authorized to audit or conduct a similar control for tax purposes, the information contained in this form and/or a copy of this form can be disclosed to such tax authorities or such party.<br>
                5. In case of any change in circumstances that causes the information contained herein to become incorrect I recognize that I will have to provide a suitable updated Self-certification form within 30 days of such change in circumstances.<br>
            </td>
        </tr>
        </tbody>
    </table>

    <br>
    <table class="page14">
        <tbody>
        <tr>
            <td><h4>NAME</h4></td>
            <td><h4>SIGNATURE</h4></td> 
            <td><h4>DATE</h4></td>
        </tr>
        <tr>
            <td height="60" align="center"><?= $subscription->has('individual') ? $subscription->individual->salutation : '' ?> <?= strtoupper($subscription->user->first_name); ?></td>
            <td height="60"><u></u></td>
            <td height="60" align="center"></td>
        </tr>
        </tbody>
    </table>

    <?php } ?>



    <!-- Joint Application -->
    <?php if($subscription->is_joint_applicant == 1){ ?>

    <div class="new-page"></div>

    <h1 class="t-c font-22">MCIL INTERNATIONAL LIMITED (Company No. LL14041) <br><p class="t-c font-16">(A private fund company incorporated in the Federal Territory of Labuan, Malaysia)</p></h1>
    
    <hr class="double">
    <hr class="double">
    <p  class="t-c font-20" style="border-bottom: 2px solid #000;font-weight: 700;">DECLARATION ON SOURCE OF FUNDS (关于资金来源的宣言) </p>

    <p class="font-18">I/we understand that I/we am/are required to declare the source of the funds that I/we will be depositing into the account/s including future deposits whether in cash, cheque, EFT, RTGS, SWIFT or any other method. Accordingly, I/we wish to declare as follows: (本人/我们理解, 本人/我们需要申报本人/我们将存入账户的资金来源,包括未来存款,无论是现金,支票,电子转帐(EFT),实时结算(RTGS),SWIFT或是任何其他方式。 因此,本人/我们希望申报如下:)</p>

    <br>

    <p class="font-18" style="width: 100%;">That, I/We (本人/我们) <span class="underline_text"><?= $subscription->ja_salutation ?> <?= strtoupper($subscription->ja_name) ?></span></p>
    <p class="font-18">(Name/s of account holder/holders) (账户持有人的名称) of (在于)</p>
    <p class="font-18" style="border-bottom: 1px solid #000;width: 100%;margin-bottom: 10px;">
        <?= $subscription->ja_addr_line_1 ?> 
        <?= $subscription->ja_addr_line_2 ?>
        <?= $subscription->ja_city ?>  
        <?= $subscription->ja_postcode ?>
        <?= $subscription->ja_state_id ? $subscription->SubscriptionJaState->name : '' ?> 
        <?= $subscription->ja_country_id ? $subscription->SubscriptionJaCountry->name : '' ?> </p>
    <p class="font-18" style="border-bottom: 1px solid #000;width: 100%;margin-bottom: 10px;"> </p>
    
    <p class="font-18">(address-地址) do hereby declare that the source of the funds that: (在此声明资金来源:)-</p>
    <p class="font-18">The income depositing into my/our account is/are from the source of (tick as appropriate, can be more than one): (存入本人/我们账户的收入来自(根据需要勾选,可以多于一个)):</p>


    <?php
        $source_wealths = explode(', ', $subscription->ja_source_wealth);
        
        $source_array = [
            "Personal Saving / Salary"=>'<p class="font-18">(&nbsp;$$$&nbsp;&nbsp;) &nbsp;&nbsp; Personal Saving / Salary (个人储蓄/工资)</p>',
            "Business Income" => '<p class="font-18">(&nbsp;$$$&nbsp;&nbsp;) &nbsp;&nbsp; Business Income (营业收入)</p>',
            "Dividends from other entry" => '<p class="font-18">(&nbsp;$$$&nbsp;&nbsp;) &nbsp;&nbsp; Dividends from other entry (来自其他投资项目的股息)</p>',
            "Benefits of transactions due to me all of which are known to me" => '<p class="font-18">(&nbsp;$$$&nbsp;&nbsp;) &nbsp;&nbsp; Benefits of transactions due to me all of which are known to me. (应付给我的交易收益而所有这 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp; 些交易 都是我所知道)</p>',
            "Other" => '<p class="font-18">(&nbsp;$$$&nbsp;&nbsp;) &nbsp;&nbsp; Others (please provide details) (其他 (请提供详细信息))</p> <p class="font-18" style="border-bottom: 1px solid #000;width: 100%;margin-bottom: 30px">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;'.$subscription->source_wealth_other.'</p>'
        ];

        foreach($source_array as $source_key => $source_wealth){
            //echo $source_array;
            foreach($source_wealths as $source_wealth2){
                
                if($source_wealth2 == $source_key){
                    $source_array[$source_key] = str_replace("$$$","√",$source_wealth);
                    break;
                }   
            }
        }

        foreach($source_array as $source_key3 => $source_wealth3){
            echo str_replace("$$$","&nbsp;",$source_wealth3);
        }
    ?>

    <p class="font-18">I/we further confirm that these funds are derived from legitimate sources as stated above; and I/we will also provide the required evidence of the source of funds if required to do so in future. (本人/我们 进一步确认, 上述资金来自合法的来源;如果今后需要, 本人/我们还将提供所需的资金来源证据。)</p>
    <p class="font-18" style="margin-top: 15px;margin-bottom: 40px">I/we declare the foregoing details to be true. (本人/我们也在此声明上述细节属实。)</p>
    
    <table width="100%">
            <tr>
                <td width="20%"><p class="font-18">Signature(签字) :</p></td>
                <td width="30%"></td>
                <td><p class="font-18"> Name(姓名): <?= $subscription->ja_salutation ?> <?= strtoupper($subscription->ja_name) ?></p></td>
            </tr>
            <tr>
                <td><p class="font-18">Date(日期) : </p></td>
                <td><p class="font-18"></p></td>
                <td></td>
            </tr>
    </table>

    <?php if($subscription->is_first == 1){ ?>

    <!-- page 14 -->
    <div class="new-page"></div>

    <h1 class="font-22 f-w-8" style="width: 100%;position: relative">Individual Tax Residency Self-Certification Form<span style="position: absolute;right: 20px;"> CRS - I</span></h1>
    <h1 class="font-22 f-w-7" style="width: 100%;">Part 1 – Identification of Joint Account Holder</h1>

    <table class="table fo-rm" style="width:100%;margin-bottom: 30px">
        
        <tr>
            <td class="font-15 f-w-7">A. Name of Joint Account Holder:</td>
            <td></td>
        </tr>
        <tr>
            <td class="font-15">Name :</td>
            <td class="font-15"> <?= $subscription->ja_salutation ?> <?= strtoupper($subscription->ja_name) ?></td>
        </tr>
        <tr>
            <td class="font-15">NRIC/Passport No. (For Foreigners):</td>
            <td class="font-15"><?= $subscription->ja_nric_passport ?></td>
        </tr>
        <tr>
            <td class="font-15">Date of Birth (dd/mm/yyyy):</td>
            <td class="font-15"><?= date('d-m-Y', strtotime($subscription->ja_dob))  ?></td>
        </tr>
    </table>

    <table  class="table fo-rm" style="width:100%;margin-bottom: 10px">
        <tr>
            <td class="font-15 f-w-7">B. Current Residence Address:</td>
            <td class="font-15"></td>
        </tr>
        <tr>
            <td class="font-15">Line 1 (e.g. House/Apt/Suite Name, Number, Street):</td>
            <td class="font-15"><?= $subscription->ja_addr_line_1 ?> <?= $subscription->ja_addr_line_2 ?></td>
        </tr>
        <tr>
            <td class="font-15">Line 2 (e.g. Town/City/Province/County/State)</td>
            <td class="font-15"><?= $subscription->ja_city ?>  <?= $subscription->ja_state_id ? $subscription->SubscriptionJaState->name : '' ?></td>
        </tr>
        <tr>
            <td class="font-15">Country:</td>
            <td class="font-15"><?= $subscription->ja_country_id ? $subscription->SubscriptionJaCountry->name : '' ?></td>
        </tr>
        <tr>
            <td class="font-15">Postal Code/ZIP Code:</td>
            <td class="font-15"><?= $subscription->ja_postcode ?> </td>
        </tr>
    </table>

    <table  class="table fo-rm" style="width:100%;margin-bottom: 10px">
        <tr>
            <td colspan="2"  class="font-15 f-w-7">C. Mailing Address: (please only complete if different to the address shown in Section B)</td>
        </tr>
        <tr>
            <td class="font-15">Line 1 (e.g. House/Apt/Suite Name, Number, Street):</td>
            <td class="font-15">
                <?php 
                    echo $subscription->jatr_addr_line_1;
                    echo $subscription->jatr_addr_line_2;
                ?>

            </td>
        </tr>
        <tr>
            <td class="font-15">Line 2 (e.g. Town/City/Province/County/State)</td>
            <td class="font-15">
                <?php 
                    echo $subscription->jatr_city;
                    echo "&nbsp;";
                    echo $subscription->jatr_state_id ? $subscription->SubscriptionJaTrState->name : '';
                    echo "&nbsp;";
                ?>
            </td>
        </tr>
        <tr>
            <td class="font-15">Country:</td>
            <td class="font-15">

                <?php echo $subscription->jatr_country_id ? $subscription->SubscriptionJaTrCountry->name : ''; 
                ?>
            </td>
        </tr>
        <tr>
            <td class="font-15">Postal Code/ZIP Code:</td>
            <td class="font-15">                                        
                <?php echo $subscription->jatr_postcode; ?>
            </td>
        </tr>
    </table>

    <!-- page 16 -->
    <div class="new-page"></div>

    <h2>Part 2 – Jurisdiction(s) of Residence for Tax Purposes and related Taxpayer Identification</h2>
    <h2>Number or equivalent number (“TIN”) (See Appendix)</h2>

    <p class="font-18">Please complete the following table indicating (i) where the Account Holder is tax resident and (ii) the Account Holder’s TIN for each country/jurisdiction indicated.</p>

    <p class="font-18">If the Account Holder is tax resident in more than three countries please use a separate sheet</p>

    <p class="font-18">If a TIN is unavailable please provide the appropriate reason A, B or C where indicated below:</p>

    <p class="font-18"><b>Reason A</b> - The country/jurisdiction where the Account Holder is liable to pay tax does not issue TINs to its residents</p>

    <p class="font-18"><b>Reason B</b> - The Account Holder is otherwise unable to obtain a TIN or equivalent number (Please explain why you are unable to obtain a TIN in the below table if you have selected this reason)</p>

    <p class="font-18"><b>Reason C</b> - No TIN is required. (Note. Only select this reason if the authorities of the country/jurisdiction of tax residence entered below do not require the TIN to be disclosed)</p>

    <br>
    <table class="page11">
        <tbody>
        <tr>
            <td height="60" width="5%"></td>
            <td width="35%" align="center">Country(ies) / Jurisdiction(s) of tax<br/>residence</td>
            <td width="25%" align="center">TIN</td>
            <td width="35%" align="center">If no TIN available enter Reason<br/>A, B or C</td>
        </tr>



        <tr>
            <td height="60" width="5%">1. </td>
            <td height="60" width="35%"><?= $subscription->jatd1_country_id ? $subscription->SubscriptionJaTd1Country->name : '' ?></td>
            <td height="60" width="25%"><?= $subscription->jatd1_tax_number ?></td>
            <td height="60" width="35%">
                <?php
                    if($subscription->jatd1_tax_reason_type == 1){
                        echo "Reason A";
                    }else if($subscription->jatd1_tax_reason_type == 2){
                        echo "Reason B";
                        echo "-".$subscription->jatd1_tax_reason;

                    }else if($subscription->jatd1_tax_reason_type == 3){
                        echo "Reason C";
                    }
                ?>
            </td>
        </tr>

        <tr>
            <td height="60" width="5%">2. </td>
            <td height="60" width="35%"><?= $subscription->jatd2_country_id ? $subscription->SubscriptionJaTd2Country->name : '' ?></td>
            <td height="60" width="25%"><?= $subscription->jatd2_tax_number ?></td>
            <td height="60" width="35%">
                <?php
                    if($subscription->jatd2_tax_reason_type == 1){
                        echo "Reason A";
                    }else if($subscription->jatd2_tax_reason_type == 2){
                        echo "Reason B";
                        echo "-".$subscription->jatd2_tax_reason;

                    }else if($subscription->jatd2_tax_reason_type == 3){
                        echo "Reason C";
                    }
                ?>
            </td>
        </tr>

        <tr>
            <td height="60" width="5%">3. </td>
            <td height="60" width="35%"><?= $subscription->jatd3_country_id ? $subscription->SubscriptionJaTd3Country->name : '' ?></td>
            <td height="60" width="25%"><?= $subscription->jatd3_tax_number ?></td>
            <td height="60" width="35%">
                <?php
                    if($subscription->jatd3_tax_reason_type == 1){
                        echo "Reason A";
                    }else if($subscription->jatd3_tax_reason_type == 2){
                        echo "Reason B";
                        echo "-".$subscription->jatd3_tax_reason;

                    }else if($subscription->jatd3_tax_reason_type == 3){
                        echo "Reason C";
                    }
                ?>
            </td>
        </tr>

        </tbody>
    </table>

    <br>
    <p class="font-18">Please explain in the following boxes why you are unable to obtain a TIN if you selected Reason B above.</p>
    <br>

    <table width="100%" class="page11">
        <tr>
            <td height="80" width="5%">1. </td>
            <td height="80"><?= $subscription->jatd1_tax_reason; ?></td>
        </tr>
        <tr>
            <td height="80" width="5%">2. </td>
            <td height="80"><?= $subscription->jatd2_tax_reason; ?></td>
        </tr>
        <tr>
            <td height="80" width="5%">3. </td>
            <td height="80"><?= $subscription->jatd3_tax_reason; ?></td>
        </tr>
    </table>


    <!-- page 17 -->
    <div class="new-page"></div>


    <h2>Part 3 – Declarations and Signature</h2>

    <p class="font-18">I understand that the information supplied by me is covered by the full provisions of the terms and conditions governing the Account Holder’s relationship with MCIL International Limited setting out how MCIL International Limited may use and share the information supplied by me.</p>

    <p class="font-18">I acknowledge that the information contained in this form and information regarding the Account Holder and any Reportable Account(s) may be provided to the tax authorities of the country/jurisdiction in which this account(s) is/are maintained and exchanged with tax authorities of another country(ies)/Jurisdictions(s) in which the Account Holder may be tax resident pursuant to intergovernmental agreements to exchange financial account information.</p>

    <p class="font-18">I certify that I am the Account Holder (or am authorised to sign for the Account Holder) of all the account(s) to which this form relates.</p>

    <p class="font-18">I certify that where I have provided information regarding any other person (such as a Controlling Person or other Reportable Person to which this form relates) that I will, within 30 days of signing this form, notify those persons that I have provided such information to MCIL International Limited and that such information may be provided to the tax authorities of the country/jurisdiction in which the account(s) is/are maintained and exchanged with tax authorities of another country(ies)/jurisdiction(s) in which the person may be tax resident pursuant to intergovernmental agreements to exchange financial account information.</p>

    <p class="font-18">I declare that all information made in this form are, to the best of my knowledge and belief, correct and complete. I undertake to advise MCIL International Limited within 30 days of any change in circumstances which affects the tax residency status of the individual identified in Part 1 of this form or causes the information contained herein to become incorrect, and to provide MCIL International Limited with a suitably updated self-certification and Declaration within 90 days of such change in circumstances.</p>

    <br><br>

    <table width="100" class="table" style="padding: 20px;">
        <tbody>
            <tr>
                <td height="150" width="30%" class="font-18">Signature:</td>
                <td><u></u></td>
            </tr>
            <tr>
                <td height="30" class="font-18">Name:</td>
                <td height="30" class="font-18"><?= $subscription->ja_salutation ?> <?= strtoupper($subscription->ja_name) ?></td>
            </tr>
            <tr>
                <td height="50" class="font-18">Date:</td>
                <td height="50" class="font-18"></td>
            </tr>
        </tbody>
    </table>


    <!-- page 18 -->
    <div class="new-page"></div>

    <h2>Appendix – Definitions</h2>
    
    <table width="100%" class="page13">
        <tbody>
        <tr>
            <td width="15%" class="font-15 f-w-6">Account Holder</td>
            <td>Means the person listed or identified as the holder of a Financial Account. A person, other than a Financial Institution, holding a Financial Account for the benefit of another person as an agent, a custodian, a nominee, a signatory, an investment advisor, an intermediary, or as a legal guardian, is not treated as the Account Holder. In these circumstances that other person is the Account Holder. For example, in the case of a parent/child relationship where the parent is acting as a legal guardian, the child is regarded as the Account Holder. With respect to a jointly held account, each joint holder is treated as an Account Holder.</td>
        </tr>
        <tr>
            <td width="15%" class="font-15 f-w-6">Controlling Person</td>
            <td>This is a natural person who exercises control over an entity. Where an entity Account Holder is treated as a Passive Non-Financial Entity (“NFE”) then a Financial Institution must determine whether such Controlling Persons are Reportable Persons. This definition corresponds to the term “beneficial owner” as described in Recommendation 10 of the Financial Action Task Force Recommendations (as adopted in February 2012). If the account is maintained for an entity of which the individual is a Controlling Person, then the “Controlling Person tax residency self-certification” form should be completed instead of this form.</td>
        </tr>
        <tr>
            <td width="15%" class="font-15 f-w-6">Entity</td>
            <td>means a legal person or a legal arrangement, such as a corporation, organisation, partnership, trust or foundation.</td>
        </tr>
        <tr>
            <td width="15%" class="font-15 f-w-6">Financial Account</td>
            <td>A Financial Account is an account maintained by a Financial Institution and includes: Depository Accounts; Custodial Accounts; Equity and debt interest in certain Investment Entities; Cash Value Insurance/ Takaful Contracts; and Annuity Contracts.</td>
        </tr>
        <tr>
            <td width="15%" class="font-15 f-w-6">Participating Jurisdiction</td>
            <td>Means a jurisdiction with which an agreement is in place pursuant to which it will provide the information required on the automatic exchange of financial account information set out in the Common Reporting Standard.</td>
        </tr>
        <tr>
            <td width="15%" class="font-15 f-w-6">Reportable Account</td>
            <td>Means an account held by one or more Reportable Persons or by a Passive NFE with one or more Controlling Persons that is a Reportable Person </td>
        </tr>
        <tr>
            <td width="15%" class="font-15 f-w-6">Reportable Jurisdiction</td>
            <td>Means a jurisdiction with which an obligation to provide financial account information is in place.</td>
        </tr>
        <tr>
            <td width="15%" class="font-15 f-w-6">Reportable Person</td>
            <td>Means as an individual who is tax resident in a Reportable Jurisdiction under the tax laws of that jurisdiction. Dual resident individuals may rely on the tiebreaker rules contained in tax conventions (if applicable) to solve cases of double residence for purposes of determining their residence for tax purposes.</td>
        </tr>
        <tr>
            <td width="15%" class="font-15 f-w-6">TIN</td>
            <td>Means Taxpayer Identification Number or a functional equivalent in the absence of a TIN. A TIN is a unique combination of letters or numbers assigned by a jurisdiction to an individual or an Entity and used to identify the individual or Entity for the purposes of administering the tax laws of such jurisdiction. Further details of acceptable TINs can be found at the following link OECD automatic exchange of information portal.</td>
        </tr>
        <tr>
            <td></td>
            <td>Some jurisdictions do not issue a TIN. However, these jurisdictions often utilise some other high integrity number with an equivalent level of identification (a “functional equivalent”). Examples of that type of number include, for individuals, a social security/insurance/takaful number, citizen/personal identification/service code/number, and resident registration number.</td>
        </tr>  
        </tbody>
    </table>

    <!-- page 19 -->
    <div class="new-page"></div>

    <table class="page14">
        <tbody>
        <tr>
            <td class="f-w-7" style="font-size: 22px;" align="center">Foreign Account Tax Compliance Act (“FATCA”) – Individual Self Certification</td>
        </tr>
        <tr>
            <td>Please complete this self-certification form carefully. All information requested on the form is mandatory and need to be completed in full.<br>

            <b>Note: Please do not complete this self-certification form if you are not a natural person, instead please use the self-certification form for companies.</b></td>
        </tr>
        <tr>
            <td class="f-w-7" style="font-size: 20px;">Section A – Applicant Information</td>
        </tr>
        </tbody>
    </table>

    <br>
    
    <table class="page14">
        <tbody>
            <tr>
                <td rowspan="3">1. Full name <br><br>
                    2. IC number/passport number <br><br>
                    3. Date of Birth (DD-MM-YYYY)
                </td>
                <td colspan="2" class="font-15">
                    <?= $subscription->ja_salutation ?> <?= strtoupper($subscription->ja_name) ?></td>
            </tr>
            <tr>
                <td colspan="2" class="font-15">
                    <?= $subscription->ja_nric_passport ?></td>
            </tr>
            <tr>
                <td colspan="2" class="font-15">
                    <?= date('d-m-Y', strtotime($subscription->ja_dob)) ?></td>
            </tr>
        </tbody>
    </table>

    <br>

    <table class="page14">
        <tr>
            <td>4. Resident Address (supported by a valid governmental document)</td>
            <td>               
                <?php
                    echo "Address line 1 : ".$subscription->jatr_addr_line_1."<br>";
                    echo "Address line 2 : ".$subscription->jatr_addr_line_2." ".$subscription->jatr_postcode."<br>";

                    echo "City : "; 
                    echo $subscription->jatr_city; 
                    echo $subscription->jatr_state_id ? $subscription->SubscriptionJaTrState->name : '';
                    echo "<br>";
                    echo "Country : ";
                    echo $subscription->jatr_country_id ? $subscription->SubscriptionJaTrCountry->name : '';
                ?>
            </td>
        </tr>
    </table>

    <br>

    <table class="page14">
        <tr>
            <td>5. Mailing Address (if different with resident address)</td>
            <td>
                Address line 1:<br>
                Address line 2:<br>
                City:  Country:
            </td>
        </tr>
    </table>

    <br>

    <table class="page14">
        <tbody>
        <tr>
            <td colspan="3" width="100%"><h4>Section B – Identifying Residency and source of income for Tax Purposes</h4></td>
        </tr>
        </tbody>
    </table>

    <table class="page14">
        <tbody>
        <tr>
            <td width="45%">6. Are you a U.S. citizen or a U.S. Resident including a green card holder?</td>
            <td width="10%">YES/ <span style="background-color: #e1ecf4;">NO</span></td>
            <td width="45%">If the answer is yes, please provide a W-9 form and your Tax Payer Identification Number (US TIN)</td>
        </tr>
        <tr>
            <td>7. Is U.S. your country of birth?</td>
            <td>YES/ <span style="background-color: #e1ecf4;">NO</span></td>
            <td>If the answer is yes, please provide a W-8BEN and MyKad/Malaysian Passport/ Loss of nationality</td>
        </tr>
        <tr>
            <td>8. Do you have residence address or mailing address (including a U.S. post office box) in the U.S.?</td>
            <td>YES/ <span style="background-color: #e1ecf4;">NO</span></td>
            <td>If the answer is yes, please provide a W-8BEN and MyKad/ Malaysian Passport/ Certificate of Residence</td>
        </tr>
        <tr>
            <td>9. Do you have a current U.S. telephone number?</td>
            <td>YES/ <span style="background-color: #e1ecf4;">NO</span></td>
            <td>If the answer is yes, please provide a W-8BEN and MyKad/Malaysian Passport</td>
        </tr>
        </tbody>
    </table>

    <br>

    <table class="page14">
        <tbody>
        <tr>
            <td><h4>Section C – Certification</h4></td>
        </tr>
        <tr>
            <td>
                1. Under penalties of perjury, I declare that I have examined the information on this form and to the best of my knowledge and believe it is true, correct and complete.<br>
                2. I agree to provide a copy of this form, or use and disclose the information mentioned above to any third party, or any competent authority responsible for the institution FATCA compliance<br>
                3. I am the individual that is the beneficial owner (or an authorized to sign for the individual that is the beneficial owner) of all the income to which this form relates or am using this form to document myself as an individual that is an owner or account holder of a foreign financial institution<br>
                4. I understand and agree that on specific request from any relevant tax authorities or any party authorized to audit or conduct a similar control for tax purposes, the information contained in this form and/or a copy of this form can be disclosed to such tax authorities or such party.<br>
                5. In case of any change in circumstances that causes the information contained herein to become incorrect I recognize that I will have to provide a suitable updated Self-certification form within 30 days of such change in circumstances.<br>
            </td>
        </tr>
        </tbody>
    </table>

    <br>
    <table class="page14">
        <tbody>
        <tr>
            <td><h4>NAME</h4></td>
            <td><h4>SIGNATURE</h4></td> 
            <td><h4>DATE</h4></td>
        </tr>
        <tr>
            <td height="60" align="center"><?= $subscription->ja_salutation ?> <?= strtoupper($subscription->ja_name) ?></td>
            <td height="60"><u></u></td>
            <td height="60" align="center"></td>
        </tr>
        </tbody>
    </table>


    <?php } ?>
    <?php } ?>

</body>

</html>