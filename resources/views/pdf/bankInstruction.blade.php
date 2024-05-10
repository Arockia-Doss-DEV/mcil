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
    t
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
    p{padding: 8px;margin: 0px;}
    h4 {font-size: 14px; font-weight: bold; padding: 0px; margin: 0px;}
    h1 {font-size: 18px; font-weight: bold; padding: 0px; margin: 0px;}
    small{padding: 0px;font-weight: 400;}
</style>
<body>
    <div class="main_div">
    <?php if($subscription['bi_address'] == 1){ ?>
        <?php if($old_address == 1){ ?>
            <table width="100%">
                <tr>
                    <td rowspan="5" width="20%" align="left"><img src="data:image/png;base64, {{ base64_encode(@file_get_contents(public_path('img/media/mcil-logo.png'))) }}" width="120px;" height="100px"></td>
                    <td align="left">
                    	<h1><strong>MCIL INTERNATIONAL LIMITED (Company No. LL14041)</strong></h1>
                    	<h4><u>(A private fund company incorporated in the Federal Territory of Labuan, Malaysia)</u></h4>
                		<h4>Labuan office: Unit 3A-2, Level 3A, Labuan Times Square,</h4>
                		<h4> Jalan Merdeka, 87000 W.P, Labuan, Malaysia.</h4>
                		<h4><strong>Email: </strong><a href="mailto:admin@mcilintl.com"><strong>admin@mcilintl.com</strong></a></h4>
                    </td>
                </tr>
            </table>
            <img src="data:image/png;base64, {{ base64_encode(@file_get_contents(public_path('img/media/hr.png'))) }}" width="100%" height="15px">
        <?php }else{ ?>
            <table width="100%">
                <tr>
                    <td rowspan="5" width="20%" align="left"><img src="data:image/png;base64, {{ base64_encode(@file_get_contents(public_path('img/media/mcil-logo.png'))) }}" width="120px;" height="100px"></td>
                    <td align="left">
                    	<h1><strong>MCIL INTERNATIONAL LIMITED (Company No. LL14041)</strong></h1>
                    	<h4><u>(A private fund company incorporated in the Federal Territory of Labuan, Malaysia)</u></h4>
                		<h4>Labuan office: Unit 3A-2, Level 3A, Labuan Times Square,</h4>
                		<h4> Jalan Merdeka, 87000 W.P, Labuan, Malaysia.</h4>
                		<h4><strong>Email: </strong><a href="mailto:admin@mcilintl.com"><strong>admin@mcilintl.com</strong></a></h4>
                    </td>
                </tr>
            </table>
            <img src="data:image/png;base64, {{ base64_encode(@file_get_contents(public_path('img/media/hr.png'))) }}" width="100%" height="15px">
        <?php } ?>
        
        
        
        <table  width="100%">
            <tr>
                <td width="10%"></td>
                <td align="right"></td> <td align="right"></td>
                <td align="right">
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
                    <h4>Investment ID : <?= $investment_no; ?></h4></td>
            </tr>
            <tr>
                <td><h4>NAME</h4></td> <td colspan="3"><h4><?= $user->has('individual') ? $user->individual->salutation : '' ?>  <?= $user->first_name ?>
                    <?php 
                        if($subscription->is_joint_applicant == 1){ 
                            echo " & ". $subscription->ja_salutation."  ".$subscription->ja_name;
                        } 
                    ?>
                </h4></td>
            </tr>
            <tr>
                <td><h4>Address</h4></td>
                <td  colspan="3"><?= $user->address_line1 ?> 
                        <?= $user->address_line2 ?> 
                        <?= $user->city ?> <?= $user->post_code ?> 
                        <?= $user->state ? $user->stateAs->name : '' ?>
                        <?= $user->country ? $user->countryAs->name : '' ?>.
                </td>
            </tr>
	        <tr>
                <td><h4>Date:</h4></td>
                <td  colspan="3">
                <?php 
			        if(!empty($subscription->bi_date)){ 
				        echo date('d-F-Y', strtotime($subscription->bi_date)); 
			        }else{ 
				        echo date('d-F-Y', strtotime($subscription->created_at));
			        } 
		        ?>
                </td>
            </tr>
            <tr><td colspan="4"></td></tr>
        </table>

        <br>
        <h1>Dear : <?= $user->has('individual') ? $user->individual->salutation : '' ?> <?= $user->first_name ?>
                    <?php 
                        if($subscription->is_joint_applicant == 1){ 
                            echo " & ". $subscription->ja_salutation."  ".$subscription->ja_name;
                        } 
                    ?></h1>
        <h1><u><strong>RE: BANKING DETAILS</strong></u></h1>
        <br>
        <table width="100%" class="bankdetails" cellspacing="0" cellpadding="0">
                
            <tr>
                <td width="40%"><p>Name of Recipient :</p></td>
                <td width="60%"><p>MCIL INTERNATIONAL LIMITED</p></td>
            </tr>
            <tr>
                <td><p>Recipient&rsquo;s Account Number :</p></td>
		        <?php 
                    if( ($user->id == 124) || ($user->id == 127) || ($user->id == 135)){ ?>
                    	<td><p>8883-0500-4748</p></td>
		        <?php }else{ ?>
			            <td><p>888-3000-27-1498</p></td>
		        <?php } ?>
            </tr>
            <tr>
                <td><p>Recipient&rsquo;s Contact No :</p></td>
                <td><p>+6087-599 242</p></td>
            </tr>
            <tr>
                <td><p>Recipient&rsquo;s Address :</p></td>
                <td>
                    <p>Unit Level 14(B) & 14(C), Main Office Tower, Financial<br>
                    Park Labuan, Jalan Merdeka, 87000 F.T. Labuan</p>
                </td>
            </tr>

            <tr>
                <td><p>Beneficiary Bank :</p></td>
	           <?php if( ($user->id == 124) || ($user->id == 127) || ($user->id == 135)){ ?>
                	<td><p>KUWAIT FINANCE HOUSE (LABUAN) BERHAD</p></td>
	           <?php }else{ ?>
		          <td><p>AMBANK (M) BERHAD</p></td>
	           <?php } ?>
            </tr>
            <tr>
                <td><p>Beneficiary Bank&rsquo;s SWIFT Code :</p></td>
	            <?php if( ($user->id == 124) || ($user->id == 127) || ($user->id == 135)){ ?>
                	<td><p>KFHOMYKL</p></td>
	            <?php }else{ ?>
		            <td><p>ARBKMYKL</p></td>
	            <?php } ?>                    
            </tr>
            <tr>
                <td><p>Beneficiary Bank&rsquo;s Address :</p></td>
	            <?php if( ($user->id == 124) || ($user->id == 127) || ($user->id == 135)){ ?>
                	<td><p>Level 7C(1), Main Office Tower, Financial Park Complex Labuan, <br>Jalan Merdeka, 87000 Labuan Federal Territory, Malaysia</p></td>
	            <?php }else{ ?>
		            <td><p>14332 & 14333, Batu 4, Jalan Klang Lama, 58100 Kuala<br>Lumpur.</p></td>
	            <?php } ?> 
            </tr>
            <tr>
                <?php if($subscription->is_first == 1){ ?>
                    <td><p>Initial Investment (USD) : </p></td>
                <?php }else if($subscription->is_first == 0){ ?>
                    <td><p>Additional Investment (USD) : </p></td>
                <?php } ?>
                
                <td><p> <?= number_format($subscription->initial_investment) ?></p>
                </td>
            </tr>

            <?php
        		$initial_investment = $subscription->initial_investment;
        		$subscription_fee =  $subscription->service_charge;
        		$percent = ($initial_investment * $subscription_fee)/100;
        		$total = $initial_investment + $percent;
        	?>

            <tr>
                <td><p><?= $subscription_fee; ?>% Subscription Fee (USD) :</p></td>
                <td><p><?= number_format($percent) ?></p></td>
            </tr>
            <tr>
                <td><p> Processing Fee (USD) :</p></td>
                <td><p>Waived</p></td>
            </tr>
            <tr>
                <td><p>Total of Wire Transfer (USD): </p></td>
                <td><p><?= number_format($total) ?></p></td> 
            </tr>
            <tr>
                <td><p>Charges :</p></td>
                <td><p>All charges to be borne by Sender(Full Amount Must Be Received by MCIL INTERNATIONAL LIMITED).</p></td>
            </tr>
        </table>

        <p></p>
        <p>Thank you.</p>
        <p>Warmest regards,</p>
        <p></p>
        <p><img src="data:image/png;base64, {{ base64_encode(@file_get_contents(public_path('img/supporting-docs-samples/director_signature.png'))) }}"></p>
        <p></p>
        <p><u>MUHAMMAD JACKSON YEOH ABDULLAH</u><br>Director</p>
    <?php }else{ ?>

        <table width="100%">
            <tr>
                <td rowspan="5" width="20%" align="left"><img src="data:image/png;base64, {{ base64_encode(@file_get_contents(public_path('img/media/mcil-logo.png'))) }}" width="120px;" height="100px"></td>
                <td align="left">
                    <h1><strong>MCIL INTERNATIONAL LIMITED (Company No. LL14041)</strong></h1>
                    <h4><u>(A private fund company incorporated in the Federal Territory of Labuan, Malaysia)</u></h4>
                    <h4>Labuan office: <h4>
                    <h4>Unit Level 14(B) &14(C), Main Office Tower, Financial Park Labuan</h4>
                    <h4> Jalan Merdeka, 87000  Labuan, Malaysia.</h4>
                    <h4><strong>Email: </strong><a href="mailto:admin@mcilintl.com"><strong>admin@mcilintl.com</strong></a></h4>
                </td>
            </tr>
        </table>
        <img src="data:image/png;base64, {{ base64_encode(@file_get_contents(public_path('img/media/hr.png'))) }}" width="100%" height="15px">
                
        <table  width="100%">
            <tr>
                <td width="10%"></td>
                <td align="right"></td> 
                <td align="right"></td>
                <td align="right">
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
                    <h4>Investment ID : <?= $investment_no; ?></h4>
                </td>
            </tr>
            <tr>
                <td><h4>NAME</h4></td> <td colspan="3"><h4><?= $user->has('individual') ? $user->individual->salutation : '' ?>  <?= $user->first_name ?>
                    <?php 
                        if($subscription->is_joint_applicant == 1){ 
                            echo " & ". $subscription->ja_salutation."  ".$subscription->ja_name; 
                        } 
                    ?>
                </h4></td>
            </tr>
            <tr>
                <td><h4>Address</h4></td>
                <td  colspan="3"><?= $user->address_line1 ?> 
                        <?= $user->address_line2 ?> 
                        <?= $user->city ?> <?= $user->post_code ?> 
                        <?= $user->state ? $user->stateAs->name : '' ?>
                        <?= $user->country ? $user->countryAs->name : '' ?>.
                </td>
            </tr>
            <tr>
                <td><h4>Date:</h4></td>
                <td  colspan="3">
                <?php 
                    if(!empty($subscription->bi_date)){ 
                        echo date('d-F-Y', strtotime($subscription->bi_date));
                    }else{ 
                        echo date('d-F-Y', strtotime($subscription->created_at));
                    } 
                ?>
                </td>
            </tr>
            <tr><td colspan="4"></td></tr>
        </table>

        <br>
        <h1>Dear : <?= $user->has('individual') ? $user->individual->salutation : '' ?> <?= $user->first_name ?>
                    <?php 
                        if($subscription->is_joint_applicant == 1){ 
                            echo " & ". $subscription->ja_salutation."  ".$subscription->ja_name;
                        } 
                    ?></h1>
        <h1><u><strong>RE: BANKING DETAILS</strong></u></h1>
        <br>
        <table width="100%" class="bankdetails" cellspacing="0" cellpadding="0">
                
            <tr>
                <td width="40%"><p>Name of Recipient :</p></td>
                <td width="60%"><p>MCIL INTERNATIONAL LIMITED</p></td>
            </tr>
            <tr>
                <td><p>Recipient&rsquo;s Account Number :</p></td>
                <td><p>7151-2002-2434</p></td>
            </tr>
            <tr>
                <td><p>Recipient&rsquo;s Contact No :</p></td>
                <td><p>+6087 850 182</p></td>
            </tr>
            <tr>
                <td><p>Recipient&rsquo;s Address :</p></td>
                <td>
                    <p>Unit 3A-2, Level 3A, Labuan Times Square,<br>
                        Jalan Merdeka, 87000 Labuan F.T.</p>
                </td>
            </tr>

            <tr>
                <td><p>Beneficiary Bank :</p></td>
                <td><p>MALAYAN BANKING BERHAD (MAYBANK)</p></td>
            </tr>
            <tr>
                <td><p>Beneficiary Bank&rsquo;s SWIFT Code :</p></td>
                    <td><p>MBBEMYKLXXX</p></td>
            </tr>
            <tr>
                <td><p>Beneficiary Bank&rsquo;s Address :</p></td>
                <td><p>Lot E005, Ground Floor Podium, Financial Park Complex Labuan, <br>Jalan Merdeka, 87000 Labuan Federal Territory, Malaysia</p></td>
            </tr>
            <tr>
                <?php if($subscription->is_first == 1){ ?>
                    <td><p>Initial Investment (USD) : </p></td>
                <?php }else if($subscription->is_first == 0){ ?>
                    <td><p>Additional Investment (USD) : </p></td>
                <?php } ?>
                
                <td><p> <?= number_format($subscription->initial_investment) ?></p>
                </td>
            </tr>

            <?php
                $initial_investment = $subscription->initial_investment;
                $subscription_fee =  $subscription->service_charge;
                $percent = ($initial_investment * $subscription_fee)/100;
                $total = $initial_investment + $percent;
            ?>

            <tr>
                <td><p><?= $subscription_fee; ?>% Subscription Fee (USD) :</p></td>
                <td><p> <?= number_format($percent) ?> ( <?= $subscription_fee; ?>% )</p></td>
            </tr>
           
            <tr>
                <td><p>Total of Wire Transfer (USD): </p></td>
                <td><p><?= number_format($total) ?></p></td> 
            </tr>
            <tr>
                <td><p>Charges :</p></td>
                <td><p>All charges to be borne by Sender</p></td>
            </tr>
        </table>
        <p>**Kindly email us the wire transfer slip/ receipt as proof of funding.</p>
        <p></p>
        <p>Thank you.</p>
        <p>Warmest regards,</p>
        <p></p>
        <p><img src="data:image/png;base64, {{ base64_encode(@file_get_contents(public_path('img/supporting-docs-samples/director_signature.png'))) }}"></p>
        <p></p>
        <p><u>MUHAMMAD JACKSON YEOH ABDULLAH</u><br>Director</p>

    <?php } ?>
    </div>
</body>
</html>