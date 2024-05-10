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
        p{padding: 10px;margin: 0px;}
        h4 {font-size: 14px; font-weight: bold; padding: 0px; margin: 0px;}
        h1 {font-size: 18px; font-weight: bold; padding: 0px; margin: 0px;}
    </style>
<body>
    <div class="main_div">
        
        <table width="100%">
            <tr>
                <td rowspan="5" width="20%" align="left"><img src="data:image/png;base64, {{ base64_encode(@file_get_contents(public_path('img/media/mcil-logo.png'))) }}" width="120px;" height="100px"></td>
                <td align="left">
                    <h1><strong>MCIL INTERNATIONAL LIMITED (Company No. LL17226)</strong></h1>
                    <h4><u>(A private fund company incorporated in the Federal Territory of Labuan, Malaysia)</u></h4>
                    <h4>Labuan office: <h4>
                    <h4>Unit Level 14(B) &14(C), Main Office Tower, Financial Park Labuan</h4>
                    <h4> Jalan Merdeka, 87000  Labuan, Malaysia.</h4>
                    <h4><strong>Email: </strong><a href="mailto:admin@mcilintl.com"><strong>admin@mcilintl.com</strong></a></h4>
                </td>
            </tr>
        </table>
        <img src="data:image/png;base64, {{ base64_encode(@file_get_contents(public_path('img/media/hr.png'))) }}" width="100%" height="15px">
    
		<table width="100%">
            <tr>
                <td><h4>NAME : <?= $user->has('individual') ? $user->individual->salutation : '' ?> <?= $user->first_name ?>
                    <?php 
                        if($subscription->is_joint_applicant == 1){ 
                            echo " & ". $subscription->ja_salutation."  ".$subscription->ja_name; 
                        } 
                    ?></h4></td>
            </tr>
            <tr>
                <td width="100%">
                    <h4>Investment ID : <?= $old_investment_no; ?></h4></td>
            </tr>
            <tr>
                <td><?= $user->address_line1 ?>, 
                        <?= $user->address_line2 ?> 
                        <?= $user->city ?>  <?= $user->post_code ?> 
                        <?= $user->state ? $user->stateAs->name : '' ?>,
                        <?= $user->country ? $user->countryAs->name : '' ?>.
                </td>
            </tr>
            <tr><td>Date: <?php echo date('d-F-Y', strtotime($subscription->created_at)); ?></td></tr>
        </table>

        <br><br>
		<h4 style="padding: 3px;">Dear : <?= $user->has('individual') ? $user->individual->salutation : '' ?> <?= $user->first_name ?>
                    <?php 
                        if($subscription->is_joint_applicant == 1){ 
                            echo " & ". $subscription->ja_salutation."  ".$subscription->ja_name;
                        } 
                    ?></h4>

                    <br><br>

        <h4 style="padding: 3px;"><u><strong>RE: RENEWAL NOTICE OF THE SUBSCRIPTION IN MCIL FUND</strong></u></h4>
        <br>

        <p>Pursuant to clause 9.9 of MCIL Fund’s Supplementary Information Memorandum dated 15th May 2019. Accordingly, we hereby confirmed that your Share Subscription Application will be renewed according to the aforesaid terms and conditions stated in the Information Memorandum.</p>

        <br>

        <p>The details of your renewal share subscription are stipulated in the Private Fund Investment Agreement (PFIA) with a new Investment ID : <?= $new_investment_no; ?></p>

        <br>
        <p>If you have any further questions, please do not hesitate to contact our advisory intermediaries or us.</p>
        
        <br>

        <p>Thank you.</p>

        <br><br>

		
        <p>Warmest regards,</p>
        <p><img src="data:image/png;base64, {{ base64_encode(@file_get_contents(public_path('img/supporting-docs-samples/director_signature.png'))) }}"></p>
        <p><u>MUHAMMAD JACKSON YEOH ABDULLAH</u><br>Director</p>
	</div>
</body>
</html>