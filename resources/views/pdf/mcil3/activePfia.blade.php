<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
    <style type="text/css">
        body {
            font-family: 'Poppins';font-size: 14px; padding: 0px; margin: 0px;
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
        table td { padding:5px; }
        
        th, td { 
            border-width: 0px; 
            padding: 0em; 
            position: relative;
            border-radius: 0em; border-style: solid;
            border-color: #BBB;
            font-size: 13px;margin: 0px
        }
        table.bankdetails{ 
            font-size: 14px; 
            width: 100%;
            border-collapse: collapse; 
            padding: 0px;
            border: 1px solid #000;
            border-spacing: 0;
        }
        table.bankdetails tbody tr td { 
            border-width: 1px; 
            border: 1px solid black;
            font-size: 14px;margin: 1px;
            padding-left: 10px;
            padding-top: 1px; 
            border-spacing: 0;
        }
        p{padding: 5px;margin: 0px;}
        h4 {font-size: 14px; font-weight: bold; padding: 0px; margin: 0px;}
        h1 {font-size: 18px; font-weight: bold; padding: 0px; margin: 0px;}
    </style>
<body>
    <div class="main_div">       
        <table width="100%">
            <tr>
                <td rowspan="5" width="20%" align="left"><img src="data:image/png;base64, {{ base64_encode(@file_get_contents(public_path('img/media/mcil-logo.png'))) }}" width="110px;" height="110px"></td>
                <td align="left">
                	<h1><strong>MCIL INTL SERIES 3 LTD (Company No. LL17539)</strong></h1><br>
                    <h4><u>(A private fund company incorporated in the Federal Territory of Labuan, Malaysia)</u></h4>
                    <h4>Labuan office: Unit 3A-2, Level 3A, Labuan Times Square,</h4>
                    <h4>Jalan Merdeka, 87000 F.T. Labuan, Malaysia.</h4>
                    <h4><strong>Email: </strong><a href="mailto:admin@mcilintl.com"><strong>admin@mcilintl.com</strong></a></h4>
                </td>
            </tr>
        </table>
        <img src="data:image/png;base64, {{ base64_encode(@file_get_contents(public_path('img/media/hr.png'))) }}" width="100%" height="15px">
    
		<table  width="100%">
            
            <tr>
                <td><h4>NAME</h4></td> 
                <td colspan="2"><h4><?= $user->has('individual') ? $user->individual->salutation : '' ?> <?= $user->first_name ?>
                    <?php 
                        if($subscription->is_joint_applicant == 1){ 
                            echo " & ". $subscription->ja_salutation."  ".$subscription->ja_name;
                        } 
                    ?>
                </h4></td>
                <td align="right" width="40%">
                    <?php
                        if(!empty($subscription['draft_refrence_id'])){

                            if(($subscription['status'] == 3) || ($subscription['status'] == 6)){
                                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
                            }else{
                                $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
                            }

                        }else{
                            $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
                        }
                    ?>

                    <h4 align="right">Investment ID : <?= $investment_no; ?></h4></td>
            </tr>
            <tr>
                <td><h4>Address</h4></td>
                <td colspan="3"><?= $user->address_line1 ?>,
                        <?= !empty($user->address_line2) ? $user->address_line2 . "," : '' ?>
                        <?= $user->city ?>,  <?= $user->post_code ?>, 
                        <?= $user->state ? $user->stateAs->name : '' ?>,
                        <?= $user->country ? $user->countryAs->name : '' ?>.
                </td>
            </tr>
            <tr><td><h4>Date:</h4></td><td  colspan="3"><?php 
			if(!empty($subscription->commence_date)){ 
                echo date('d-F-Y', strtotime($subscription->commence_date)); 
            }else{ 
                echo date('d-F-Y', strtotime($subscription->created_at));
            } 

            //if(!empty($subscription->pfia_date)){ 
            //  echo date('d-F-Y', strtotime($subscription->pfia_date)); 
            //}else{ 
            //  echo date('d-F-Y', strtotime($subscription->created_at));
            //}
		?></td></tr>
            <tr><td colspan="4"></td><br></tr>
        </table>

        <br>
		<h4>Dear : <?= $user->has('individual') ? $user->individual->salutation : '' ?> <?= $user->first_name ?>
            <?php 
                if($subscription->is_joint_applicant == 1){ 
                    echo " & ". $subscription->ja_salutation."  ".$subscription->ja_name; 
                } 
            ?>      
        </h4>
        <h4><u><strong>RE: MCIL INTL SERIES 3 FUND INVESTMENT AGREEMENT (PFIA)</strong></u></h4>

		<p>Thank you for your investment into MCIL INTL SERIES 3 FUND. We appreciate your confidence in us and we hope that our investment plan will be able to serve your financial needs well.</p>

		<p>Kindly read and understand the terms and conditions of your investment below. Your investment portfolio shall be made in accordance with Annexure I as follows.</p>

		<h1 align="center">ANNEXURE I</h1>
		<p  align="center">(to be taken, read and construed as an essential part of this Agreement)</p>	
        <br>
		<table width="100%" class="bankdetails" cellspacing="0" cellpadding="0">
			<tbody>		
				<tr>
					<td width="40%"><p>Investor :</p></td>
					<td width="60%"><p><?= $user->has('individual') ? $user->individual->salutation : '' ?> <?= $user->first_name ?>
                        <?php 
                            if($subscription->is_joint_applicant == 1){ 
                                echo " & ". $subscription->ja_salutation."  ".$subscription->ja_name; 
                            } 
                        ?>               
                    </p></td>
				</tr>
 				<tr>
					<td><p>Passport/NRIC :</p></td>  
					<td><p><?= $user->has('individual') ? $user->individual->passport : '' ?></p></td>
				</tr>
                <?php if($subscription->is_joint_applicant == 1){ ?>
                    <tr>
                        <td><p>Joint Account Passport/NRIC :</p></td>  
                        <td><p><?= $subscription->ja_nric_passport; ?></p></td>
                    </tr>
                <?php } ?>
				<tr>
					<td><p>Citizenship :</p></td>
                    <td><p><?= $user->has('individual') ? $user->individual->IndiNationality->name : '' ?></p></td>
				</tr>

				<tr>
					<td><p>Address :</p></td>
					<td><p><?= $user->address_line1 ?>,
                        <?= !empty($user->address_line2) ? $user->address_line2 . "," : '' ?>    
                        <?= $user->city ?>, <?= $user->post_code ?>,  
                        <?= $user->state ? $user->stateAs->name : '' ?>, 
                        <?= $user->country ? $user->countryAs->name : '' ?>.</p></td>
				</tr>

				<tr>
					<td><p>Principal investment Sum :</p></td>
					<td><p>USD <?= $subscription->initial_investment; ?> (USD <?= ucwords($currency_word); ?> Only)</p></td>
				</tr>

				<tr>
					<td><p>Commencement Date :</p></td>
					<td><p>
                        <?php
                            if(!empty($subscription->commence_date)){
                            
                                echo date('Y-M-d', strtotime($subscription->commence_date));
                            }else{
                                echo " ";
                            } ?></p>
                    </td>
				</tr>

				<tr>
					<td><p>Investment Tenure :</p></td>
					<td><p>TWO (2) YEARS</p></td>
				</tr>

				<tr>
					<td><p>Maturity Date :</p></td>
					<td><p>
						<?php
                        	if(!empty($subscription->maturity_date)){
                            	echo date('Y-M-d', strtotime($subscription->maturity_date));
                        	}
                        ?>
                        </p>
                    </td>
				</tr>

				<tr>
					<td><p>Dividend :</p></td>
					<td><p>Twelve percent (12%) per annum</p></td>
				</tr>

				<tr>
					<td><p>Dividend Distribution :</p><p>(Expected quarterly)</p></td>
						<td>
                        <?php 
                            if(!empty($subscription->commence_date)){

                                if(!empty($subscription->maturity_date)){


                                    $i = 0;
                                    $per_count = 0;
                                    $len = count($quarters);
                                    foreach ($quarters as $key => $value) {

                                        $dis_month = $value->start_month;
                                        $dis_year = $value->year;

                                        if ($i == 1) {

                                            $ts1 = date('Y-m-d', strtotime($subscription->commence_date));
                                            $ts2 = strtotime($value->period_start);
                                            $dyear1 = date('Y', strtotime($ts1));
                                            $dyear2 = date('Y', $ts2);
                                            $dmonth1 = date('m', strtotime($ts1));
                                            $dmonth2 = date('m', $ts2);
                                            
                                            $month_count = (($dyear2 - $dyear1) * 12) + ($dmonth2 - $dmonth1);

                                            if($month_count == 3){
                                                echo "<p>Before 15 ".$dis_month." ". $dis_year." (3%)</p>";
                                                $per_count += 3;
                                            }else if($month_count == 2){
                                                echo "<p>Before 15 ".$dis_month." ". $dis_year." (2%)</p>";
                                                $per_count += 2;
                                            }else{
                                                echo "<p>Before 15 ".$dis_month." ". $dis_year." (1%)</p>";
                                                $per_count += 1;
                                            }
                                            
                                        } else if ($i == $len - 1) {
                                            $per_count += 3;
                                            echo "<p>Before 15 ".$dis_month." ". $dis_year." (3%)</p>";
                                        }else if(($i !=0)){
                                            $per_count += 3;
                                            echo "<p>Before 15 ".$dis_month." ". $dis_year." (3%)</p>";
                                        }
                                        $i++;
                                    }
                                    
                                    $len = count($quarters)-1;
                                    $commence_dateee = strtotime($quarters[$len]->period_end);
                                    $maturity_dateee = strtotime('+28 days', $commence_dateee);

                                    if($per_count != 24){
                                        $last_val = 24 - $per_count;
                                        echo "<p>Before 15 ".date('F', $maturity_dateee)." ". date('Y', $maturity_dateee)." (". $last_val."%)</p>";
                                    }

                                }
                            }
                        ?>  
                    </td>
				</tr>

				<tr>
					<td><p>Redemption Policy :</p></td>
					<td><p>The contract tenure is 2 years or 24 months, and any premature redemption before the maturity date issubject to a premature penalty charge up to fifteen percent (15%) of the total premature Redeemable Preference Shares redeemed will be charged</p></td>
				</tr>

				<tr>
					<td><p>Redemption Notice :</p></td>
					<td><p>Investor must submit Redemption Notice to the Board of Directors at least 45 business days before the intended redemption date or Maturity Day of the Redeemable Preference Shares.</p></td>
				</tr>
			</tbody>
		</table>

		
        <p>&nbsp;</p>
        <div class="new-page"></div> 

        <table width="100%">
            <tr>
                <td rowspan="5" width="20%" align="left"><img src="data:image/png;base64, {{ base64_encode(@file_get_contents(public_path('img/media/mcil-logo.png'))) }}" width="110px;" height="110px"></td>
                <td align="left">
                    <h1><strong>MCIL INTL SERIES 3 LTD (Company No. LL17539)</strong></h1><br>
                    <h4><u>(A private fund company incorporated in the Federal Territory of Labuan, Malaysia)</u></h4>
                    <h4>Labuan office: Unit 3A-2, Level 3A, Labuan Times Square,</h4>
                    <h4>Jalan Merdeka, 87000 F.T. Labuan, Malaysia.</h4>
                    <h4><strong>Email: </strong><a href="mailto:admin@mcilintl.com"><strong>admin@mcilintl.com</strong></a></h4>
                </td>
            </tr>
        </table>
        <img src="data:image/png;base64, {{ base64_encode(@file_get_contents(public_path('img/media/hr.png'))) }}" width="100%" height="15px">

		<p>Special dividend may be declared after the completion of the audit of thefund's yearly financial year end in December, subject to the availability of distributed income and the absolute discretion of the Board of Directors.</p>
		<p>To make redemption, please submit a signed Redemption Notice form to the company. Please allow up to 30 business days for the payment of redemption proceeds.</p>
		<p>If you have any further questions, please do not hesitate to contact us or our advisory intermediaries.</p>
		<p>Thank you</p>
		<p>Warmest regards,</p>
		<p><img src="data:image/png;base64, {{ base64_encode(@file_get_contents(public_path('img/supporting-docs-samples/director_signature.png'))) }}"></p>
        <p><u>MUHAMMAD JACKSON YEOH ABDULLAH</u><br>Director</p>
	</div>
</body>
</html>

