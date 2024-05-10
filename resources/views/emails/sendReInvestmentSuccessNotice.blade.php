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


								<h3>Dear {{ $data->name }},<h3> <br>

								<p>We are pleased to inform you that your investment has been successfully rolled over under the new contract ID: {{ $data->new_investment_no }}. This action reflects our ongoing commitment to managing your investments efficiently and with your best interests at heart.</p> <br>

								<p>Should you have any questions, require further clarification, or wish to explore alternative investment opportunities, please do not hesitate to reach out to us. </p><br>

                                <p>Thank you.</p><br>
                                <span>Kind regards,</span><br>
                                <span>MCIL Team</span><br>
                                
							    
                                {{-- <h3>Dear {{ $data->name }},<h3>
                                

                                <p>We hereby confirmed that you have chosen to reinvest your Investment ID: {{ $data->old_investment_no }} , and the request was submitted via the CRM, the investors' portal.</p>

								<p>Pursuant to clause 9.9 of MCIL Fund’s Supplementary Information Memorandum dated 15th May 2019. Accordingly, we hereby confirmed that your Share Subscription Application will be renewed according to the aforesaid terms and conditions stated in the Information Memorandum.</p>

								<p>The details of your renewal share subscription are stipulated in the Private Fund Investment Agreement (PFIA) with a new Investment ID : {{ $data->new_investment_no }}</p>

								<p>If you have any further questions, please do not hesitate to contact our advisory intermediaries or us.</p>
								
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