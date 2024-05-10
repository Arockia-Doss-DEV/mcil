<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="x-apple-disable-message-reformatting"> 
<title></title> 
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<style>
	body {
		margin: 0 auto !important;
		padding: 0 !important;
		height: 100% !important;
		width: 100% !important;
		background: #f1f1f1;
		font-family: 'Poppins', sans-serif;
		font-weight: 400;
		font-size: 16px;
		line-height: 1.8;
		color: rgba(0,0,0,.4);
	}
	.primary{
		background: #ea168e;
	}
	.bg_white{
		background: #f2f2f2;
	}
	.bg_light{
		background: #f2f2f2 !important;
	}
	.bg_black{
		background: #000000;
	}
	.bg_dark{
		background: rgba(0,0,0,.8);
	}
	.email-section{
		padding: 2px 1.5em;
		padding-bottom: 5.5em;
	}
	.footer.email-section{
		padding: 30px 1.5em;
	}
	.btn{
		padding: 5px 15px;
		display: inline-block;
	}
	.btn.btn-primary{
		border-radius: 5px;
		background: #ea168e;
		color: #ffffff;
	}
	.btn.btn-white{
		border-radius: 5px;
		background: #ffffff;
		color: #000000;
	}
	.btn.btn-white-outline{
		border-radius: 5px;
		background: transparent;
		border: 1px solid #fff;
		color: #fff;
	}

	h1,h2,h3,h4,h5,h6{
		font-family: 'Poppins', sans-serif;
		color: #000000;
		margin-top: 0;
		font-weight: 400;
	}
	a{
		color: #ea168e;
	}

	table {
		width: 100%;
	}
	table tbody {
		padding: 0px;
	}
	/*LOGO*/
	.logo h1{
		margin: 0;
		line-height: 1;
	}
	.logo h1 a{
		color: #000000;
		font-size: 20px;
		font-weight: 700;
		text-transform: uppercase;
		font-family: 'Poppins', sans-serif;
		padding-top: 0;
	}
	.footer{
		color: rgba(0,0,0,.8);
	}
	p{
		line-height: 22px;
		font-size: 14px;
		color: #424242;
		margin-bottom: 5px;
		margin-top: 5px;
	}
	</style>
</head>
<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly;">
<center style="width: 100%; background-color: #FFF;">

<div style="max-width: 600px; margin: 0 auto;" class="email-container">

	<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
		<tr>
			<td valign="middle" class="bg_white" style="padding: 1em 2.5em;background: #f2f2f2 !important;">
				<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td valign="middle" class="logo" style="text-align: center;">
							<a href="#"><img src="http://mcil2.mcilintl.ltd/img/site/email_mcil_logo.png" alt="logo" class="logo" style="width:100px;" /></a>
						</td>
					</tr>
				</table>
				<hr>
			</td>
		</tr>
		<tr>
			<td class="bg_white">
				<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
					<tr>
						<td class="bg_white email-section">
							
							<div class="heading-section" style=" padding: 0 30px;">

								<h3>Dear {{ $data->name }},</h3><br>

								<p>We trust this message finds you well.</p>

								<p>Your investment contract, {{ $data->investment_no }}, is set to mature on {{ $data->maturity_date }}, and it will be automatically reinvested per the existing fund's terms. The details of your renewal share subscription are stipulated in the Private Fund Investment Agreement (PFIA). </p> <br>


								<p>No action is needed unless you choose to redeem.</p> <br>

								<p>To redeem, kindly complete the Redemption Notice form and upload it to the CRM at least 45 business days before the Maturity Day. Please be aware that delays in processing may occur if the notice is incomplete or submitted after the deadline. </p> <br>

								<p>Additionally, please note that for MCIL and MCIL S2, small investment contracts will not be renewed unless there is a contract with a minimum amount of USD 70,000 and/or above in your portfolio. For MCIL S3, the minimum contract amount is USD 125,000 and/or above. </p>
								
								<br>
								<p>For assistance, contact our customer support.</p>

								<br>
								<p>Thank you for choosing us.</p>

                                <br>
                                <p>Thank you.</p><br>
                                <span>Kind regards,</span><br>
                                <span>MCIL Team</span><br>

                                
								{{-- <h3>Dear {{ $data->name }},</h3>

								<p>Your contract: {{ $data->investment_no }} is maturing on {{ $data->maturity_date }}. You can either reinvest or redeem it on the CRM.</p>

								<p>If you wish to continue the investment, you are required to click to submit a new application form on the CRM. Your investment will be auto roll-over for another 2 years after Maturity Day.</p>

								<p>If you wish to redeem your investment, kindly complete and sign the Redemption Notice form. A friendly reminder that you must click to submit the redemption form on the CRM, a minimum of 45 business days before Maturity Day. Please be advised that the processing for payment of redemption proceeds may be delayed due to an incomplete Redemption Notice or it's submitted less than 45 days before Maturity Day. </p>

								<p>Besides that, if you have other smaller contracts that are below USD 70,000, kindly ensure that you have a minimum contract of USD 70,000 and/or above in your portfolio, should you wish to reinvest any of the small investment contracts. </p>
								
								<br>
								<p>Please contact us if you need any further support.</p>

                                <br>
                                <p>Thank you.</p><br>
                                <span>Kind regards,</span><br>
                                <span>MCIL Team</span><br> --}}
                                
							</div>

						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

	<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
		<tr>
			<td valign="middle" class="bg_light footer email-section"><hr>
				<table>
					<tr>
						<td valign="top">
							<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
								<tr>
									<td style="text-align: center;">
										<p>MCIL International Ltd (Company No: LL14041)</p>
										<p>Unit 3A-2, Level 3A, Labuan Times Square,</p>
										<p>Jalan Merdeka, 87000 W.P, Labuan, Malaysia.</p>
									 </td>
								</tr>
								<tr>
									<td style="text-align: center;">
										<p>&copy; <?= date('Y'); ?>. All Rights Reserved</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
</center>
</body>
</html>