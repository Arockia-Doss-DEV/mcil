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
        table.dividentdetails{ 
            font-size: 14px; 
            width: 100%;
            border-collapse: collapse; 
            padding: 0px;
            border: 1px solid #000;
            border-spacing: 0;
        }
        table.dividentdetails tbody tr td { 
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
                <td rowspan="5" width="20%" align="left">
                    <img src="data:image/png;base64, {{ base64_encode(@file_get_contents(public_path('img/media/mcil-logo.png'))) }}" width="110px;" height="90px">
                </td>
                <td align="left">
                	<h1><strong>MCIL INTERNATIONAL LIMITED (Company No. LL14041)</strong></h1>
                	<h4><u>(A private fund company incorporated in the Federal Territory of Labuan, Malaysia)</u></h4>
            		<h4>Labuan office: Unit 3A-2, Level 3A, Labuan Times Square,</h4>
            		<h4> Jalan Merdeka, 87000 W.P, Labuan, Malaysia.</h4>
            		<h4><strong>Email: </strong><a href="mailto:admin@mcilintl.com"><strong>admin@mcilintl.com</strong>/</a><a href="mailto:support@miracfinancial.com "><strong>support@miracfinancial.com </strong></a></h4>
                </td>
            </tr>
        </table>
        <img src="data:image/png;base64, {{ base64_encode(@file_get_contents(public_path('img/media/hr.png'))) }}" width="100%" height="15px">
    
		<table width="100%">
            <tr><td><h4>DATE</h4></td>
                <td colspan="3"><?php echo date('d-F-Y', strtotime($subscription->created_at)); ?></td>
            </tr>
            <tr><td colspan="4"></td><br></tr>
            <tr>
                <td><h4>NAME</h4></td> 
                <td colspan="2"><h4><?= $user->has('individual') ? $user->individual->salutation : '' ?> <?= $user->first_name ?>
                    <?php 
                        if($subscription->is_joint_applicant == 1){ 
                            echo " & ". $subscription->ja_salutation."  ".$subscription->ja_name;
                        } 
                    ?></h4>
                </td>
            </tr>
            <tr>
                <td><h4>ADDRESS</h4></td>
                <td colspan="3">
                    <?= $user->address_line1 ?>, 
                    <?= $user->address_line2 ?> 
                    <?= $user->city ?>,  <?= $user->post_code ?>, 
                    <?= $user->state ? $user->stateAs->name : '' ?>,
                    <?= $user->country ? $user->countryAs->name : '' ?>.    
                </td>
            </tr>
        </table>

        <br>
        <h4><u><strong>Declaration of Dividend Distribution MCIL International Limited (“the Fund”)</strong></u></h4>

		<p>Greetings from MCIL International Limited!</p>

		<p>Thank you for investing in MCIL International Limited (“the Fund”). We are pleased to announce the Fund’s dividend distribution declaration as follows:</p>
		
		<table width="100%" class="dividentdetails" cellspacing="0" cellpadding="0">
			<tbody>		
				<tr>
					<td width="40%"><p><strong>Distribution Date</strong></p></td>
					<td width="60%"><p><strong>Investment ID</strong></p></td>
                    <td width="40%"><p><strong>Principal (USD)</strong></p></td>
                    <td width="60%"><p><strong>Dividend (%)</strong></p></td>
                    <td width="60%"><p><strong>Q1 Dividend Earned in 2022 (USD)</strong></p></td>
				</tr>

 				<tr>
					<td><p> <?= "15 th " . $dividend['quarter'] ?></p></td>  

                    <?php
                        if(!empty($subscription['draft_refrence_id'])){

                            if(($subscription['status'] == 3) || ($subscription['status'] == 6)){
                                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
                            }else{
                                $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
                            }
                            if(!empty($subscription->reinvestment_parant_id)){
                                $old_investment_no = $old_subscription['reference_no'].$old_subscription['refreance_id'];
                            }

                        }else{
                            $investment_no = $subscription['reference_no'].$subscription['refreance_id'];

                            if(!empty($subscription->reinvestment_parant_id)){
                                $old_investment_no = $old_subscription['reference_no'].$old_subscription['refreance_id'];
                            }
                        }
                    ?>

					<td><p>{{ $investment_no }}</p></td>
                    <td><p>{{ $subscription['initial_investment'] }}</p></td>  
                    <td><p>{{ $dividend['percentage'] }}</p></td>
                    <td><p>{{ $dividend['amount'] }}</p></td>  
				</tr>

                <tr>
                    <td></td>  
                    <td></td>  
                    <td></td>  
                    <td><p><strong>Total</strong></p></td>
                    <td><p><strong>{{ $dividend['amount'] }}</strong></p></td>  
                </tr>

			</tbody>
		</table>

		<p>Please contact our customer care at <a href="mailto:admin@mcilintl.com"><strong>admin@mcilintl.com</strong>/</a><a href="mailto:support@miracfinancial.com "><strong>support@miracfinancial.com </strong></a>,  if you have any queries or require further clarification on this matter.</p>

        <br>
        
        <p>Thank you for investing with us.</p>
		
	    <p><h4>MCIL Team</h4></p> 

        <br>
        <br>

        <p  align="center">This is a computer-generated receipt and no signature is required.
        Kindly contact your respective Account Manager within <strong> 7 business days </strong> from the date of this receipt if there any discrepancies.</p>

	</div>
</body>
</html>