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
			fixed;
		width: 100%;
		border-collapse: separate;
		border-spacing: 0px;
	}

	th,
	td {
		border-width: 0px;
		padding: 0em;
		position: relative;
		border-radius: 0em;
		border-style: solid;
		border-color: #BBB;
		font-size: 13px;
		margin: 0px
	}

	table.page1 {
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
		font-size: 14px;
		margin: 1px;
		padding-left: 10px;
		padding-top: 1px;
		border-spacing: 0;
	}

	table.page2 {
		font-size: 10px;
		width: 100%;
		border-collapse: collapse;
		padding: 0px;
		/* border: 1px solid #000; */
		border-spacing: 0;
	}

	table.page2 tbody tr td {
		/* background-color: #d8dfdf; */
		vertical-align: top;
		padding: 3px;
		border-spacing: 0;
	}

	table.page2 tbody tr td>p {
		padding: 2px;
		margin: 0px;
		font-size: 10px;
	}

	table.page2 li {
		font-size: 11px;
	}

	table.page3 {
		font-size: 13px;
		width: 100%;
		border-collapse: collapse;
		padding: 0px;
		border: 2px solid #000;
		border-spacing: 0;
	}

	table.page3 tbody tr td {
		vertical-align: top;
		padding: 5px;
		border-spacing: 0;
		border: 2px solid #000;
	}

	table.page3 tbody tr td td {
		border: 0px solid #000;
	}

	table.page3 tbody tr td>p {
		padding: 2px;
		margin: 0px;
		font-size: 8px;
	}

	table.page4 {
		font-size: 12px;
		width: 100%;
		border-collapse: collapse;
		padding: 0px;
		border: 2px solid #000;
		border-spacing: 0;
	}

	table.page4 tbody tr td {
		vertical-align: top;
		padding: 5px;
		border-spacing: 0;
		border: 2px solid #000;
		font-size: 12px;
	}

	table.page4 tbody tr td td {
		border: 0px solid #000;
	}

	table.page4 tbody tr td>p {
		padding: 2px;
		margin: 0px;
		font-size: 12px;
	}

	table.page11 {
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

	table.page11 tbody tr td td {
		border: 0px solid #000;
	}

	table.page11 tbody tr td>p {
		padding: 2px;
		margin: 0px;
		font-size: 14px;
	}

	p {
		padding: 8px;
		margin: 0px;
	}

	h4 {
		font-size: 18px;
		font-weight: bold;
		padding: 0px;
		margin: 0px;
	}

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
		text-shadow: 2px 2px white, 2px -2px white, -2px 2px white, -2px -2px white;
	}

	.font-12 {
		font-size: 12px
	}

	.font-13 {
		font-size: 13px
	}

	.font-14 {
		font-size: 14px
	}

	.font-15 {
		font-size: 15px
	}

	.font-16 {
		font-size: 16px
	}

	.font-18 {
		font-size: 18px
	}

	.font-19 {
		font-size: 19px
	}

	.font-20 {
		font-size: 20px
	}

	.font-21 {
		font-size: 21px
	}

	.font-22 {
		font-size: 22px
	}

	.f-w-4 {
		font-weight: 400;
	}

	.f-w-6 {
		font-weight: 600;
	}

	.f-w-7 {
		font-weight: 700;
	}

	.f-w-1 {
		font-weight: 100;
	}

	.cl-5 {
		width: 5%;
	}

	.cl-35 {
		width: 35%;
		/* background: #d8dfde; */
	}

	.cl-30 {
		width: 30%;
		background: #d8dfde;
	}

	.cl-15 {
		width: 15%;
	}

	.cl-40 {
		width: 45%;
		background: #d8dfde;
	}

	.l-s {
		letter-spacing: 1px
	}

	.fo-rm td {
		padding: 17px 40px;
	}

	table.page6 {
		font-size: 12px;
		width: 100%;
		border-collapse: collapse;
		padding: 0px;
		border: 2px solid #000;
		border-spacing: 0;
	}

	table.page6 tbody tr td {
		vertical-align: top;
		padding: 5px;
		border-spacing: 0;
		border: 2px solid #000;
	}

	table.page6 tbody tr td td {
		border: 0px solid #000;
	}

	table.page6 tbody tr td>p {
		padding: 2px;
		margin: 0px;
		font-size: 12px;
	}

	table.page7 {
		font-size: 16px;
		width: 100%;
		border-collapse: collapse;
		padding: 0px;
		border: 0px !important;
		border-spacing: 0;
	}


	table.page13 {
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

	table.page13 tbody tr td>p {
		padding: 2px;
		margin: 0px;
		font-size: 14px;
	}


	table.page14 {
		font-size: 16px;
		width: 100%;
		border-collapse: collapse;
		padding: 0px;
		border: 2px solid #000;
		border-spacing: 0;
	}

	table.page14 tbody tr td {
		vertical-align: top;
		padding: 5px;
		border-spacing: 0;
		border: 2px solid #000;
		font-size: 15px;
	}

	table.page14 tbody tr td td {
		border: 0px solid #000;
	}

	table.page14 tbody tr td>p {
		padding: 2px;
		margin: 0px;
		font-size: 14px;
	}

	.page7.fo-rm td {
		padding: 10px 30px;
		border: 0px
	}

	.t-c {
		text-align: center;
	}

	.underline_text {
		border-bottom: solid 2px #000000;
		display: inline;
		padding-bottom: 3px;
		width: 100%
	}

	.watermark {
		letter-spacing: 2px;
		font-size: 70px;
		font-weight: 700;
		white-space: nowrap;
		opacity: .5;
		color: #ff3d00;
		position: absolute;
		top: 40%;
		left: 10%;
		transform-origin: 0 0;
		transform: rotate(30deg);
		-webkit-transform: rotate(-30deg);
		text-transform: uppercase;
		z-index: 2;
	}

	.pos-rel {
		position: relative;
	}

	/* new */
	.text-center {
		text-align: center;
	}

	table.m3page2 {
		font-size: 14px;
		width: 100%;
		border-collapse: collapse;
		padding: 0px;
		border: 1px solid #000;
		border-spacing: 0;
	}

	table.m3page2 tbody tr td {
		vertical-align: top;
		padding: 15px 10px !important;
		border-spacing: 0;
	}

	.my-2 {
		margin-top: 1rem;
		margin-bottom: 1rem;
	}

	table.mpage4 {
		font-size: 16px;
		width: 100%;
		border-collapse: collapse;
		padding: 0px;
		border: 1px solid #000;
		border-spacing: 0;
	}

	table.mpage4 tbody tr td {
		vertical-align: top;
		border-spacing: 0;
		border: 1px solid #000;
		font-size: 15px;
		padding: 10px 5px 10px 5px;
	}

	table.mpage4 tbody tr td td {
		border: 0px solid #000;
	}

	table.mpage4 tbody tr td>p {
		padding: 2px;
		margin: 0px;
		font-size: 14px;
	}

	.mpage-5 {
		font-size: 16px;
	}

	table.mpage-5 {
		font-size: 14px;
		width: 100%;
		border-collapse: collapse;
		padding: 0px;
		border-spacing: 0;
	}

	table.mpage-5 tr td {
		vertical-align: top;
		border-spacing: 0;
		font-size: 14px;
		padding: 6px 5px 6px 5px;
	}

	table.mpage7 {
		font-size: 16px;
		width: 100%;
		border-collapse: collapse;
		padding: 0px;
		border-spacing: 0;
	}

	table.mpage7 tbody tr td {
		vertical-align: top;
		border-spacing: 0;
		font-size: 15px;
		padding: 6px 5px 6px 5px;
	}

	table.mpage8 {
		font-size: 16px;
		width: 100%;
		border-collapse: collapse;
		padding: 0px;
		border: 1px solid #000;
		border-spacing: 0;
	}

	table.mpage8 tbody tr td {
		vertical-align: top;
		border-spacing: 0;
		border: 1px solid #000;
		font-size: 15px;
		padding: 7px 5px 7px 5px;
	}

	table.mpage8 tbody tr td td {
		border: 0px solid #000;
	}

	.border-bottom {
		border-bottom: 2px solid #000;
		padding: 3px 0 5px 0;
	}

	table.mpage9 {
		font-size: 13px;
		width: 100%;
		border-collapse: collapse;
		padding: 0px;
		border-spacing: 0;
	}

	table.mpage9 tbody tr td {
		vertical-align: top;
		border-spacing: 0;
		font-size: 13px;
		padding: 1px 1px 1px 1px;
	}

	table.mpage10 {
		font-size: 10px;
		width: 100%;
		border-collapse: collapse;
		padding: 0px;
		border-spacing: 0;
	}

	table.mpage10 tbody tr td {
		vertical-align: top;
		border-spacing: 0;
		font-size: 10px;
		padding: 1px 1px 1px 1px;
	}
</style>

<body>
	<!-- page 1 -->
	<div class="text-center f-w-6" style="margin:50px 50px 20px 50px; border: 1px solid #000;">
		<p style="font-size: 22px;">INFORMATION MEMORANDUM</p>
		<p style="font-size: 22px;">Dated 1st Day of March 2022</p>
		<p style="font-size: 22px;">MCIL INTL SERIES 3 LTD</p>
		<p style="font-size: 22px;">(Company No. LL17325)</p>
	</div>
	<table>
		<tbody align="center" class="f-w-6">
			<tr>
				<td><img src="data:image/png;base64, {{ base64_encode(@file_get_contents(public_path('mcil.png'))) }}" width="150px;" height="155px"></td>
			</tr>
			<tr>
				<td>
					<p style="font-size: 16px;">THE FUND NAME:</p>
				</td>
			</tr>
			<tr>
				<td>
					<p style="font-size: 16px;">MCIL Series 3 Fund</p>
				</td>
			</tr>
			<tr>
				<td>
					<p style="font-size: 16px;">PROMOTER AND FUND MANAGER :</p>
				</td>
			</tr>
			<tr>
				<td>
					<p style="font-size: 16px;">Mirac Financial Ltd</p>
				</td>
			</tr>
			<tr>
				<td>
					<p style="font-size: 15px;">(Company No. LL17325)</p>
				</td>
			</tr>
			<tr>
				<td>
					<p style="font-size: 16px;">AUDITORS:</p>
				</td>
			</tr>
			<tr>
				<td>
					<p style="font-size: 15px;">Approved Auditors in Labuan</p>
				</td>
			</tr>
		</tbody>
	</table>

	<table width="100%" class="table page-5 font-16 l-s">
		<tr>
			<td colspan="3" style="padding: 15px 0px;">
				THIS INFORMATION MEMORANDUM IS INTENDED TO PROVIDE INFORMATION TO ASSIST YOU TO CONSIDER INVESTING IN
				MCIL SERIES 3 FUND. IT DOES NOT AMOUNT TO A RECOMMENDATION, OFFER OR INVITATION, EITHER EXPRESSLY OR BY
				IMPLICATION, TO MAKE AN INVESTMENT IN MCIL INTL SERIES 3 LTD. THIS DOCUMENT MAY NOT CONTAIN ALL THE
				INFORMATION THAT YOU NEED TO EVALUATE INVESTING IN MCIL SERIES 3 FUND.</td>
		</tr>
		<tr>
			<td colspan="3" style="padding: 15px 0px;">
				YOU ARE ADVISED TO CAREFULLY READ AND UNDERSTAND THE CONTENTS OF THE INFORMATION MEMORANDUM BEFORE
				CONSIDERING INVESTING. YOU ARE ALSO ADVISED TO CONSULT A PROFESSIONAL AND INDEPENDENT INVESTMENT ADVISER
				PRIOR TO MAKING ANY INVESTMENT DECISION IN MCIL SERIES 3 FUND.
			</td>
		</tr>
		<tr>
			<td colspan="3" style="padding: 15px 0px;">
				MCIL SERIES 3 FUND SHALL NOT BE OFFERED TO MALAYSIAN RESIDENTS IN ANY PART OF MALAYSIA EXCEPT IN LABUAN.
			</td>
		</tr>
	</table>

	<!-- page 2 -->
	<div class="new-page"></div>
	<table class="m3page2" border="1px">
		<tbody>
			<tr>
				<td colspan="3" style="font-size: 17px; font-weight: bold; text-align: center;">
					RESPONSIBILITY STATEMENTS
				</td>
			</tr>
			<tr>
				<td colspan="3" style="padding: 15px 0px;">
					THE PROMOTER AND / OR MANAGER HAVE SEEN AND APPROVED THIS INFORMATION MEMORANDUM, THEY COLLECTIVELY
					AND INDIVIDUALLY ACCEPT FULL RESPONSIBILITY FOR THE ACCURACY OF INFORMATION CONTAINED HEREIN. HAVING
					MADE ALL REASONABLE ENQUIRIES, AND TO THE BEST OF THEIR KNOWLEDGE AND BELIEF, THEY CONFIRM THERE ARE
					NO FALSE OR MISLEADING STATEMENT OR OTHER FACTS WHICH, IF OMITTED, WOULD MAKE ANY STATEMENT IN THIS
					INFORMATION MEMORANDUM FALSE OR MISLEADING.
				</td>
			</tr>
			<tr>
				<td colspan="3" style="padding: 15px 0px;">
					MCIL SERIES 3 FUND SEEKS TO PROVIDE REGULAR INCOME TO INVESTORS BY INVESTING IN A WIDE RANGE OF
					HIGHLY LIQUID ASSETS SUCH AS FIXED INCOME, MONEY MARKETS, STOCKS, FUTURE, FORWARDS, OTHER COLLECTIVE
					INVESTMENT SCHEMES AND MANAGED ACCOUNTS OR FUNDS GLOBALLY.
				</td>
			</tr>
			<tr>
				<td colspan="3" style="padding: 15px 0px;">
					MOST MARKETS AND SECURITIES HAVE REGULAR PRICE MOVEMENTS AND IF THIS IS MONITORED AND ANALYZED
					CLOSELY, IT CREATES A RECOGNIZABLE PRICE TREND AND PATTERN OR ‘SWING WHICH CAN BE EXPLOITED BY FUND
					MANAGERS. THE WIDE INVESTMENT MANDATE OF THIS FUND IS TO GIVE MANAGER THE FLEXIBILITY TO CAPITALIZE
					ON THE PRICE ‘SWINGS OF A WIDE RANGE OF DIVERSE MARKETS TO GENERATE POSITIVE RETURNS.
				</td>
			</tr>
			<tr>
				<td colspan="3" style="padding: 15px 0px;">
					MCIL SERIES 3 FUND POSSIBLY WILL ALSO INVEST IN THE RESPECTIVE MARKET MANAGED BY SUB-MANAGER TO RIDE
					ON THEIR SYSTEM AND EXPERTISE. IN DOING SO, THE MANAGER WILL STUDY THEIR TRACK RECORD AND EXPERTISE
					TO ENSURE GOOD PERFORMANCE. ONE OF THE KEY CONSIDERATIONS WHICH THE MANAGER WILL LOOK AT, BESIDES
					CONSISTENT GOOD PERFORMANCE AND SYSTEMATIC TRADING STRATEGY, IS THEIR INVESTMENT STRATEGY MUST BE
					CONSISTENT WITH THE MCIL SERIES 3 FUND. THE MCIL SERIES 3 FUND MAY ALSO FULLY CAPITALIZE THE
					LEVERAGE OPPORTUNITY IN SOME MARKETS SUCH AS COMMODITY INTEREST TO MAXIMIZE RETURNS.
				</td>
			</tr>
			<tr>
				<td colspan="3" style="padding: 15px 0px;">
					MCIL SERIES 3 FUND MAY ALSO INVEST IN QUOTED & UNQUOTED EQUITY, REGULATED & NON- REGULATED FUND, OR
					ANY SEGREGATED FUND RELATED PRIVATE PLACEMENT AND RELATED SECURITIES. PRIVATE PLACEMENT SECURITIES
					ARE NOT REGISTERED WITH THE RELEVANT SECURITIES AND EXCHANGE COMMISSION AND OFTEN NOT LISTED. THEY
					ARE NOT GUARANTEED BY ANY GOVERNMENT OR OTHER PERSON. THE PRICE AT WHICH INVESTORS ARE ABLE TO SELL
					PRIVATE PLACEMENT SECURITIES IS UNCERTAIN. THEIR LISTED PRICE MAY GOES UP OR DOWN DEPENDING ON
					GENERAL FINANCIAL MARKET CONDITIONS AND THE AVAILABILITY OF BETTER RATES OF RETURN OF OTHER
					INVESTMENT INSTRUMENTS. THERE MAY BE NO LIQUID MARKET FOR THESE SECURITIES. INVESTORS WHO WISH TO
					SELL THEIR SECURITIES MAY BE UNABLE TO DO SO AT A PRICE ACCEPTABLE TO THEM, OR AT ALL.
				</td>
			</tr>
			<tr>
				<td colspan="3" style="padding: 15px 0px;">
					THERE ARE CERTAIN RISK FACTORS WHICH PROSPECTIVE INVESTORS SHOULD CONSIDER. TURN TO SECTION 7 OF
					THIS INFORMATION MEMORANDUM FOR “RISK FACTORS” THERE IS ALSO A RISK THAT THE MANAGER OF MCIL SERIES
					3 FUND MAY DECIDE AGAINST PAYING DIVIDENDS DUE TO REASONS SUCH AS INSUFFICIENT DISTRIBUTABLE INCOME.
					ACCORDINGLY, IN THE EVENT THAT MCIL SERIES 3 FUND DOES NOT PAY DIVIDEND, AN INVESTOR HAS NO
					ENTITLEMENT TO DEMAND FOR THE DIVIDEND.
				</td>
			</tr>
			<tr>
				<td colspan="3" style="padding: 15px 0px;">
					YOU SHOULD, THEREFORE, CAREFULLY CONSIDER WHETHER THIS INVESTMENT IS SUITABLE FOR YOU IN LIGHT OF
					YOUR FINANCIAL CONDITION. THIS BRIEF STATEMENT CANNOT DISCLOSE ALL THE RISKS AND SIGNIFICANT ASPECTS
					OF MCIL SERIES 3 FUND. THIS DOCUMENT ALSO DOES NOT PURPORT TO CONTAIN ALL THE INFORMATION THAT YOU
					MAY NEED TO EVALUATE A POTENTIAL INVESTMENT.
				</td>
			</tr>
		</tbody>
	</table>

	<!-- page 3 -->
	<div class="new-page"></div>
	<table class="m3page2" border="1px">
		<tbody>
			<tr>
				<td colspan="3" style="font-size: 17px; font-weight: bold; text-align: center;">
					STATEMENT OF DISCLAIMER
				</td>
			</tr>
			<tr>
				<td colspan="3" style="padding: 15px 0px;">
					YOU ARE ADVISED TO READ AND UNDERSTAND THE FULL CONTENTS OF THIS INFORMATION MEMORANDUM, IF IN
					DOUBT, YOU ARE STRONGLY ADVISED TO CONSULT A PROFESSIONAL ADVISER.
				</td>
			</tr>
			<tr>
				<td colspan="3" style="padding: 15px 0px;">
					A COPY OF THIS INFORMATION MEMORANDUM HAS BEEN LODGED WITH THE LABUAN FINANCIAL SERVICES AUTHORITY
					(“LFSA”) AS A PRIVATE MUTUAL FUND AND IS GOVERNED UNDER LABUAN FINANCIAL SERVICES AND SECURITIES ACT
					2(J1(J. THE CONTENTS OF THIS INFORMATION MEMORANDUM MAY BE CHANGED TO COMPLY WITH RELEVANT
					GUIDELINES ISSUED BY THE LFSA FROM TIME TO TIME.
				</td>
			</tr>
			<tr>
				<td colspan="3" style="padding: 15px 0px;">
					THE LODGMENT OF THIS INFORMATION MEMORANDUM WITH THE LFSA SHOULD NOT BE TAKEN AS AN INDICATION THAT
					THE LFSA RECOMMENDS ANY INVESTMENT IN MCIL INTL SERIES 3 LTD OR ASSUMES RESPONSIBILITY FOR THE
					CORRECTNESS OF ANY STATEMENT MADE, OR OPINION OR REPORT EXPRESSED IN THIS INFORMATION MEMORANDUM.
				</td>
			</tr>
			<tr>
				<td colspan="3" style="padding: 15px 0px;">
					THE LFSA IS NOT LIABLE FOR ANY NON-DISCLOSURES OR MISLEADING STATEMENTS IF ANY ON THE PART OF MCIL
					INTL SERIES 3 LTD AND IS NOT RESPONSIBLE FOR THE CONTENTS OF INFORMATION MEMORANDUM. THE LFSA MAKES
					NO REPRESENTATION ON THE ACCURACY AND COMPLETENESS OF THIS INFORMATION MEMORANDUM, AND EXPRESSLY
					DISCLAIMS ANY LIABILITY WHATSOEVER ARISING FROM, OR WHERE THERE IS ANY RELIANCE ON THE WHOLE OR ANY
					PART OF, ITS CONTENTS.

				</td>
			</tr>
			<tr>
				<td colspan="3" style="padding: 15px 0px;">
					THE CONTENTS IN THIS INFORMATION MEMORANDUM ARE INTENDED TO PROVIDE BACKGROUND INFORMATION OF MCIL
					SERIES 3 FUND ONLY. IT DOES NOT AMOUNT TO A RECOMMENDATION, SOLICITATION, OFFER OR INVITATION,
					EITHER EXPRESSLY OR BY IMPLICATION, TO MAKE AN INVESTMENT IN THE MCIL SERIES 3 FUND. THIS DOCUMENT
					ALSO DOES NOT PURPORT TO CONTAIN ALL THE INFORMATION THAT YOU MAY NEED TO EVALUATE AN INVESTMENT IN
					MCIL SERIES 3 FUND. INVESTORS ARE ADVISED NOT TO RELY SOLELY ON THE CONTENTS IN THIS INFORMATION
					MEMORANDUM AND TO MAKE THEIR OWN EVALUATION TO ASSESS THE MERITS AND RISKS OF INVESTING IN MCIL
					SERIES 3 FUND. IN CONSIDERING AN INVESTMENT IN MCIL SERIES 3 FUND, ALL INVESTORS ARE ADVISED TO
					CONSULT QUALIFIED PROFESSIONAL INVESTMENT ADVISERS BEFORE DECIDING ON PROCEEDING WITH ANY
					INVESTMENT. MCIL SERIES 3 FUND IS NOT OFFERED TO MALAYSIAN RESIDENTS IN MALAYSIA EXCEPT IN LABUAN.
				</td>
			</tr>
			<tr>
				<td colspan="3" style="padding: 15px 0px;">
					NO REDEEMABLE PREFERENCE SHARES IN MCIL SERIES 3 FUND WILL BE ISSUED OR SOLD BEFORE THE
					ACKNOWLEDGEMENT ISSUED BY THE LFSA.
				</td>
			</tr>
			<tr>
				<td colspan="3" style="padding-top:350px;"></td>
			</tr>
			<tr>
				<td colspan="3" style="font-weight:600; padding: 5px 0px 0px 15px !important">
					CHONG CHEONG SIN
				</td>
			</tr>
			<tr>
				<td colspan="3" style="font-weight:600; padding: 5px 0px 0px 15px !important">
					MANAGING DIRECTOR
				</td>
			</tr>
			<tr>
				<td colspan="3" style="font-weight:600; padding: 5px 0px 0px 15px !important">
					MIRAC FINANCIAL LTD
				</td>
			</tr>
		</tbody>

	</table>

	<!-- page 4 -->
	<div class="new-page"></div>
	<table class="m3page2" border="1px">
		<tbody>
			<tr>
				<td colspan="3" style="font-size: 17px; font-weight: bold; text-align: center;">
					Table of Contents
				</td>
			</tr>
		</tbody>
	</table>
	<table class="mpage9" width="100%">
		<tr>
			<td colspan="7">1.DEFINITIONS </td>
			<td align="left">
				5
			</td>
		</tr>
		<tr>
			<td colspan="7">2.INTERPRETATION</td>
			<td align="left"> 8</td>
		</tr>
		<tr>
			<td colspan="7">3.CORPORATE DIRECTORY</td>
			<td align="left"> 10</td>
		</tr>
		<tr>
			<td colspan="7">4.KEY DATA OF MCIL SERIES 3 FUND</td>
			<td align="left"> 11</td>
		</tr>
		<tr>
			<td colspan="7">5.STRUCTURE OF AND INFORMATION ON MCIL SERIES 3 FUND</td>
			<td align="left"> 15</td>
		</tr>
		<tr>
			<td colspan="7">6.INVESTMENT STRATEGY</td>
			<td align="left"> 16</td>
		</tr>
		<tr>
			<td colspan="7">7.RISK FACTORS</td>
			<td align="left"> 17</td>
		</tr>
		<tr>
			<td colspan="7">7.1 Dividend Payment</td>
			<td align="left"> 17</td>
		</tr>
		<tr>
			<td colspan="7">7.2. Concentration and Single Issuer</td>
			<td align="left"> 17</td>
		</tr>
		<tr>
			<td colspan="7">7.3.Market Risk</td>
			<td align="left"> 17</td>
		</tr>
		<tr>
			<td colspan="7">7.4.Liquidity</td>
			<td align="left"> 18</td>
		</tr>
		<tr>
			<td colspan="7">7.5.Managemen Riskt</td>
			<td align="left"> 18</td>
		</tr>
		<tr>
			<td colspan="7">7.6.Loan Financial Risk</td>
			<td align="left"> 18</td>
		</tr>
		<tr>
			<td colspan="7">7.7.Political, Economic and Environmental Risks</td>
			<td align="left"> 18</td>
		</tr>
		<tr>
			<td colspan="7">7.8.Currency Risk</td>
			<td align="left"> 19</td>
		</tr>
		<tr>
			<td colspan="7">7.9.Inflation Risk</td>
			<td align="left"> 19</td>
		</tr>
		<tr>
			<td colspan="7">7.10.Possible Effect of Substantial Redemptions</td>
			<td align="left"> 19</td>
		</tr>
		<tr>
			<td colspan="7">7.11.Deferral of Redemption Payment</td>
			<td align="left"> 19</td>
		</tr>
		<tr>
			<td colspan="7">7.12.Portfolio Turnover</td>
			<td align="left"> 19</td>
		</tr>
		<tr>
			<td colspan="7">7.13.Short Selling</td>
			<td align="left"> 20</td>
		</tr>
		<tr>
			<td colspan="7">7.14.Regulatory Change</td>
			<td align="left"> 20</td>
		</tr>
		<tr>
			<td colspan="7">7.15.Volatility Risk</td>
			<td align="left"> 20</td>
		</tr>
		<tr>
			<td colspan="7">7.16.CountryRisk</td>
			<td align="left"> 20</td>
		</tr>
		<tr>
			<td colspan="7">7.17.Non-compliance Risk</td>
			<td align="left"> 20</td>
		</tr>
		<tr>
			<td colspan="7">8. FEES, CHARGES AND EXPENSESS</td>
			<td align="left"> 21</td>
		</tr>
		<tr>
			<td colspan="7">8.1.Subscription Fee</td>
			<td align="left"> 21</td>
		</tr>
		<tr>
			<td colspan="7">8.2.Premature Redemption Fee.</td>
			<td align="left"> 21</td>
		</tr>
		<tr>
			<td colspan="7">8.3.Redemption Fee</td>
			<td align="left"> 21</td>
		</tr>
		<tr>
			<td colspan="7">8.4.Management Fee</td>
			<td align="left"> 21</td>
		</tr>
		<tr>
			<td colspan="7">8.5.Directors Fee</td>
			<td align="left"> 21</td>
		</tr>
		<tr>
			<td colspan="7">8.6.Transfer Fee</td>
			<td align="left"> 21</td>
		</tr>
		<tr>
			<td colspan="7">8.7.Others Fee</td>
			<td align="left"> 22</td>
		</tr>
		<tr>
			<td colspan="7">9. TRANSACTION INFORMATION</td>
			<td align="left"> 23</td>
		</tr>
		<tr>
			<td colspan="7">9.1. Borrowing Policy</td>
			<td align="left"> 23</td>
		</tr>
		<tr>
			<td colspan="7">9.2 Dividend Distribution Policy</td>
			<td align="left"> 23</td>
		</tr>
		<tr>
			<td colspan="7">9.3 Redemption Policy</td>
			<td align="left"> 23</td>
		</tr>
		<tr>
			<td colspan="7">9.4 Investment Restriction</td>
			<td align="left"> 23</td>
		</tr>
		<tr>
			<td colspan="7">9.5 Investment Information</td>
			<td align="left"> 23</td>
		</tr>
		<tr>
			<td colspan="7">9.6 Redemption</td>
			<td align="left"> 25</td>
		</tr>
		<tr>
			<td colspan="7">9.7 Cooling-Off Period</td>
			<td align="left"> 27</td>
		</tr>
		<tr>
			<td colspan="7">9.8 Investment Roll-over</td>
			<td align="left"> 27</td>
		</tr>
		<tr>
			<td colspan="7">10 INFORMATION ON THE FUND MANAGER</td>
			<td align="left"> 28</td>
		</tr>
		<tr>
			<td colspan="7">11 ARTICLES FOR THE REDEEMABLE PREFERENCE SHARES</td>
			<td align="left"> 30</td>
		</tr>
		<tr>
			<td colspan="7">12 FINANCIAL PROJECTION</td>
			<td align="left"> 31</td>
		</tr>
		<tr>
			<td colspan="7">12.1 Proforma Statement of Comprehensive Income</td>
			<td align="left"> 31</td>
		</tr>
		<tr>
			<td colspan="7">12.2 Proforma Statement of Financial Position</td>
			<td align="left"> 32</td>
		</tr>
		<tr>
			<td colspan="7">12.3 Proforma Cash Flow Statement</td>
			<td align="left"> 33</td>
		</tr>
		<tr>
			<td colspan="7">13 ADDITIONAL INFORMATION</td>
			<td align="left"> 34</td>
		</tr>
		<tr>
			<td colspan="7">13.1 Fund Manager’s Discretion</td>
			<td align="left"> 34</td>
		</tr>
		<tr>
			<td colspan="7">13.2 Anti-Money Laundering Policy</td>
			<td align="left"> 34</td>
		</tr>
		<tr>
			<td colspan="7">13.3 Conflict of Interest Policy</td>
			<td align="left"> 34</td>
		</tr>
		<tr>
			<td colspan="7">13.4 Termination of the MCIL Series 3</td>
			<td align="left"> 34</td>
		</tr>
		<tr>
			<td colspan="7">SHARES APPLICATION FORM</td>
			<td align="left"> 35</td>
		</tr>
		<tr>
			<td colspan="7">DECLARATION ON SOURCE OF FUNDS</td>
			<td align="left"> 42</td>
		</tr>
		<tr>
			<td colspan="7">REDEMPTION NOTICE</td>
			<td align="left"> 43</td>
		</tr>
	</table>

	<!-- page 5 -->
	<div class="new-page"></div>
	<table class="m3page2" border="1px">
		<tbody>
			<tr>
				<td colspan="3" style="font-size: 17px; font-weight: bold; text-align: left;">
					1. DEFINITIONS
				</td>
			</tr>
		</tbody>
	</table>
	<div class="my-2">
		In this Information Memorandum, the following abbreviations or words should have the following
		meanings unless expressly stated:
	</div>

	<table class="mpage4" width="100%">
		<tr>
			<td class="cl-35 f-w-6">Agent </td>
			<td align="left"> <span class="font-22 f-w-4"></span>
				means person who is registered as agents with the Manager.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Act </td>
			<td align="left"> <span class="font-22 f-w-4"></span>
				means the Labuan Financial Services and Securities Act 2010.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Auditor </td>
			<td align="left"> <span class="font-22 f-w-4"></span>
				means as the word assigned to that word in the Act.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Base Currency </td>
			<td align="left">
				means currency in United States Dollars denomination.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Business Day</td>
			<td align="left">
				means every public working day in Labuan excluding any public holidays.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Commencement Date</td>
			<td align="left">
				means the day of which the investments of MCIL Series 3 Fund may first be made and is the next Business
				Day after the Initial Offer Period closed date.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Cooling-Off Period </td>
			<td align="left">
				means a period set by the Manager within which investors may cancel the investment and the Manager shall
				return the invested sum by the investor net-off any cost incurred.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Financial Year End</td>
			<td align="left">
				means each period of twelve months ending on 3l "t December of each year.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Information Memorandum</td>
			<td align="left">
				refers to the Information Memorandum of MCIL INTL Series 3 Ltd dated 1st day of November 2021.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Initial Offer Period</td>
			<td align="left">
				means three (3) months period after MCIL Series 3 Fund have lodged its first Information Memorandum.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">LFSA / the Authority</td>
			<td align="left">
				means the Labuan Financial Services Authority.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6"> Lock-in Period</td>
			<td align="left">
				means two (2) years or twenty-four (24) months of investment tenure.
			</td>
		</tr>
	</table>
	<!-- page 6 -->
	<div class="new-page"></div>
	<table class="mpage4" width="100%">
		<tr>
			<td class="cl-35 f-w-6">Long-Term </td>
			<td align="left"> <span class="font-22 f-w-4"></span>
				means a period of 12 months. If the last day of the period end of 12 months falls on a public holiday,
				it shall be the next Business Day.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Maturity Day </td>
			<td align="left"> <span class="font-22 f-w-4"></span>
				means the next Business Day immediately following the end of Lock-In Period of the respective investment
				and /or Redeemable Preference Share class.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Fund or MCIL Series 3 Fund </td>
			<td align="left"> <span class="font-22 f-w-4"></span>
				means MCIL INTL Series 3 Ltd.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Premature Redemption </td>
			<td align="left">
				means the selling of investment and/or Redeemable Preference Shares subscribed by the investor of MCIL
				Series
				3 Fund before the expiry of the Maturity Day of the investment and/or Redeemable Preference Shares.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Redeemable Preference Shares</td>
			<td align="left">
				means the Non-Cumulative Redeemable Preference Shares issued by MCIL Series 3 Fund and made available
				for subscription at the offer price in accordance with the terms and conditions of this Information
				Memorandum.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Redemption</td>
			<td align="left">
				means the selling of Redeemable Preference Shares held by investors to MCIL Series 3 Fund or repurchase
				of Redeemable Preference Shares by MCIL Series 3 Fund from investors.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Redemption Fee</td>
			<td align="left">
				means redemption charges or fees imposed on investors when they sell their Shares.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Redemption Notice</td>
			<td align="left">
				means notice and/or request given to the Manager by the investors to redeem investment in MCIL Series 3
				Fund and/or Redeemable Preference Shares.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Securities</td>
			<td align="left">
				means any tradable financial asset including both debt and equity such as debt paper, certificate of
				deposit, banknotes, bonds, debentures, promissory notes, stock, shares or derivatives such as forwards,
				futures, options and swap irrespective whether they are listed in an exchange or not.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Fund Manager or Manager</td>
			<td align="left">
				means Micro Finiancial Ltd.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Subscription Feel Sales Charge</td>
			<td align="left">
				means an amount imposed to investor by MCIL Series 3 Fund that not exceeding a pre-descriped percentage
				of the Redeemable Preference shares subscribed.
			</td>
		</tr>
	</table>

	<!-- page 7 -->
	<div class="new-page"></div>
	<table class="mpage4" width="100%">
		<tr>
			<td class="cl-35 f-w-6">Subscription Date </td>
			<td align="left"> <span class="font-22 f-w-4"></span>
				means the first Business Day of each calendar month after the end of the Initial Offering Period and/or
				such other day or days as the Manager may determine, either generally or in any particular case.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">The Custodian </td>
			<td align="left"> <span class="font-22 f-w-4"></span>
				means a company who has been appointed by the Manager to be the custodian of MCIL Series 3 Fund’s assets
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Sub-Manager </td>
			<td align="left"> <span class="font-22 f-w-4"></span>
				means a third party appointed by the Manager to assist in the management of the Fund or specific
				portfolio.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">USD </td>
			<td align="left">
				Means United States Dollars
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Valuer</td>
			<td align="left">
				means firm(s) appointed by the Manager to value MCIL Series 3 Fund’s direct real estate in accofdance
				with this Information Memorandum.
			</td>
		</tr>
	</table>

	<!-- page 8 -->
	<div class="new-page"></div>
	<table class="m3page2" border="1px">
		<tbody>
			<tr>
				<td colspan="3" style="font-size: 17px; font-weight: bold; text-align: left;">
					2. INTERPRETATION
				</td>
			</tr>
		</tbody>
	</table>
	<div class="my-2 mpage-5 f-w-7">
		About this Information Memorandum
	</div>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				A copy of this Information Memorandum dated 1st day of November 2021 has been lodged with LFSA as a
				private mutual fund under the Labuan Financial Services and Securities Act 2010. This shall be guided by relevant guidelines issue by LFSA from time to time.
			</td>
		</tr>
		<tr>
			<td colspan="3">
				LFSA is not liable for any non-disclosure or misleading statement(s), if any in this Information
				Memorandum and has no responsibility for the contents of this Information Memorandum. LFSA takes no
				representation on the accuracy and completeness of this Information Memorandum, and expressly disclaims
				any liability whatsoever arising from, or in reliance upon, the whole or any part of contents herein.
			</td>
		</tr>
	</table>
	<div class="my-2 mpage-5 f-w-7">
		Defined words and expressions
	</div>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				Certain capitalized words and expressions used in this Information Memorandum have defined meanings
				which are explained in the Definitions.
			</td>
		</tr>
		<tr>
			<td colspan="3">
				All references to the plural herein shall also mean the singular and to the singular shall also mean the plural unless the context otherwise requires.
			</td>
		</tr>
	</table>
	<div class="my-2 mpage-5 f-w-7">
		Offer and issuer
	</div>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				The offer contained in this Information Memorandum is an offering to prospective investors to subscribe
				to a total of fifty million (50,000,000) Redeemable Preference Shares each with an issue price of USD
				One (USD 1.00) only. MCIL Series 3 Fund attempts to raise a total of USD Fifty Million (USD
				50,000,000.00) with the ability to raise more or less
			</td>
		</tr>
		<tr>
			<td colspan="3">
				Although at this juncture MCIL Series 3 Fund only offers to issue a single class Redeemable Preference
				Shares, MCIL Series 3 Fund is allowed to issue other classes of shares in the event that it decided to
				do so in a later date subject to the compliance of relevant laws and guidelines then by the LFSA.F
			</td>
		</tr>
	</table>
	<div class="my-2 mpage-5 f-w-7">
		How to obtain an Information Memorandum and ARRlication Form
	</div>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				This Information Memorandum may be obtained in electronic format that can be downloaded from MCIL INTL
				Series 3 Ltd.’s website www.mci1intl.com. However, please be reminded that this Information Memorandum
				is a private and confidential document. The ability to download this Information Memorandum
				electronically does not mean and should not be assumed that this is a recommendation, offer or
				invitation to make an investment in MCIL Series 3 Fund. The Information Memorandum downloaded from the
				website shall be used as an information and reference document only.

			</td>
		</tr>
	</table>

	<!-- page 9 -->
	<div class="new-page"></div>
	<div class="my-2 mpage-5 f-w-7">
		Restrictions on distribution
	</div>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				This Information Memorandum is intended to provide background and salient information to assist you to
				understand the investment objectives of MCIL Series 3 Fund. It does not constitute a recommendation,
				offer or invitation, either expressly or implication, to make an investment in MCIL Series 3 Fund. This
				Information Memorandum also does not purport to contain all the information that you may need to
				evaluate a potential investment.
			</td>
		</tr>
		<tr>
			<td colspan="3">
				You are advised to read and understand the contents of this Information Memorandum and you are strongly
				advised to consult a professional and independent financial or investment adviser before making any
				investment decision in MCIL Series 3 Fund. This Fund shall not be offered to Malaysian residents in any
				part of Malaysia except in Labuan.
			</td>
		</tr>
	</table>
	<div class="my-2 mpage-5 f-w-7">
		Tenure and Geographical
	</div>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				Subject to terms and conditions stated in clause 9.8 and 13.4 hereinafter, MCIL Series 3 Fund offers
				investments for period of two (2) years or twenty-four (24) months to potential investors. MCIL Series 3
				Fund shall operate perpetually, unless the Manager have foreseen that MCIL Series 3 Fund is
				unsustainable due to unforeseen circumstance.
			</td>
		</tr>
		<tr>
			<td colspan="3">
				MCIL Series 3 Fund is open to invest into generic investment in various financial instrument include but
				not limited to quoted & unquoted equity, regulated & non regulated fund, or any segregated fund related
				private placement and related securities in Europe, London, Middle East and Asia Region in particular
				China, Singapore, Malaysia and Vietnam.
			</td>
		</tr>
	</table>
	<div class="my-2 mpage-5 f-w-7">
		Exclusive distributer
	</div>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				In order to ensure MCIL Series 3 Fund is distributed by approved party, MCIL Series 3 Fund will only be
				distributed by exclusive distributor appointed by the Manager. The exclusive distributor may also
				provide nominee account in which shares belonging to clients are held, making buying and selling those
				shares easier.
			</td>
		</tr>
	</table>
	<div class="my-2 mpage-5 f-w-7">
		No representations other than this Information Memorandum
	</div>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				Unless appointed in writing by the Manager, no person is authorized to give any information or to make
				any representation in connection with this Information Memorandum.
			</td>
		</tr>
		<tr>
			<td colspan="3">
				This Information Memorandum does not take into account your investment objectives, financial situation
				or risk appetite. It also does not provide financial product or investment advice. You should carefully
				consider these factors in light of your personal circumstances. If you do not understand any part of
				this Information Memorandum, it is strongly recommended that you seek professional guidance before
				deciding whether nor not to invest. After obtaining independent and professional financial and
				investment advice and where you have still have doubts regarding MCIL Series 3 Fund, you are asked to
				not invest.
			</td>
		</tr>
	</table>
	<!-- page 10 -->
	<div class="new-page"></div>
	<table class="m3page2" border="1px">
		<tbody>
			<tr>
				<td colspan="3" style="font-size: 17px; font-weight: bold; text-align: left;">
					3. CORPORATE DIRECTORY
				</td>
			</tr>
		</tbody>
	</table>
	<div class="my-2 mpage-5 f-w-7">
		PROMOTER AND FUND MANAGER
	</div>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-35 f-w-6">Name: </td>
			<td align="left">
				Mirac Financial Ltd. (Company No. LL17325)
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Registered Office: </td>
			<td align="left">
				Unit Level 9F(2), Main Office, Financial Park Labuan Jalan Merdeka, 87000 F.T. Labuan, Malaysia.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Telephone Number: </td>
			<td align="left">
				+6087 - 416 111
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6"> Facsimile Number: </td>
			<td align="left">
				+6087 - 416 116
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Email:</td>
			<td align="left">
				contactHmiracfinancia1.com
			</td>
		</tr>
	</table>

	<div class="my-2 mpage-5 f-w-7">
		COMPANY SECRETARY
	</div>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-35 f-w-6">Name: </td>
			<td align="left">
				BBS Corporate Services Limited (Company No. LL15572)
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Registered Office: </td>
			<td align="left">
				Unit Level 9F(2), Main Office, Financial Park Labuan Jalan Merdeka, 87000 F.T. Labuan, Malaysia.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Telephone Number: </td>
			<td align="left">
				+6087 - 416 111
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6"> Facsimile Number: </td>
			<td align="left">
				+6087 - 416 116
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Email:</td>
			<td align="left">
				infoHbbstrust.com
			</td>
		</tr>
	</table>

	<div class="my-2 mpage-5 f-w-7">
		FUND ADMINISTRATOR
	</div>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-35 f-w-6">Name: </td>
			<td align="left">
				Silverknows CMB Ltd. (FKA BBS Corporate Consulting Limited) (Company No. LL13824)
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Registered Office: </td>
			<td align="left">
				Unit Level 9F(2), Main Office, Financial Park Labuan Jalan Merdeka, 87000 F.T. Labuan, Malaysia.

			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6"> Business Address: </td>
			<td align="left">
				Unit 3A-2, Level 3A, Labuan Times Square, Jalan Merdeka 87000.
				F.T. Labuan, Malaysia.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Telephone Number: </td>
			<td align="left">
				+6087 850 125
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Email:</td>
			<td align="left">
				infoHsi1verknows.com
			</td>
		</tr>
	</table>
	<div class="my-2 mpage-5 f-w-7">
		AUDITORS
	</div>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				As of date of this Information Memorandum, MCIL Series 3 Fund has not confirmed on
				appointment of Auditors, the proposed Auditors for the Company will be any approved Auditors in Labuan.
			</td>
		</tr>
	</table>
	<!-- page 11 -->
	<div class="new-page"></div>
	<table class="m3page2" border="1px">
		<tbody>
			<tr>
				<td colspan="3" style="font-size: 17px; font-weight: bold; text-align: left;">
					4. KEY DATA OF MCIL SERIES 3 FUND
				</td>
			</tr>
		</tbody>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				This section provides the summary of the information of MCIL Series 3 Fund for investors’ easy
				reference. Investors are advised to read and understand the whole Information Memorandum and
				if necessary, consult a qualified adviser before making any investment decision.
			</td>
		</tr>
	</table>
	<table class="mpage8" width="100%">
		<tr>
			<td colspan="2" align="center" style="background-color: #d8dfdf;">
				Fund Information
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Fund Name </td>
			<td align="left">
				MCIL Series 3 Fund
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Investment Objective</td>
			<td align="left">
				MCIL Series 3 Fund aims to provide regular income for investors seeking long-term investment.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Principal Investment Strategy</td>
			<td align="left">
				MCIL Series 3 Fund is focusing and open to invest into generic investment in various financial
				instrument include but not limited to quoted & unquoted equity, regulated & non regulated fund, or any
				segregated fund related private placement and related securities in Europe, London, Middle East and Asia
				Region in particular China, Singapore, Malaysia and Vietnam.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6"> Investor Profile </td>
			<td align="left">
				May be considered by investors who:
				<ul>
					<li> Seek regular income</li>
					<li>Have high risk tolerance in long-term investments</li>
					<li> Seek investment in international money market</li>
				</ul>
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Redeemable Preference Shares</td>
			<td align="left">
				Fifty million only (50,000,000) Redeemable Preference Shares issued for subscription by MCIL INTL Series
				3 Ltd with the ability to raise more or less.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Initial Offer Price</td>
			<td align="left">
				USD One Only (USD 1.00) each per Redeemable Preference Share.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Performance Indicator</td>
			<td align="left">
				Up to twelve percent (l 2%) per annum.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Tenure</td>
			<td align="left">
				Minimum of two (2) years or twenty-four (24) months.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Lock-in Period</td>
			<td align="left">
				This investment shall be Lock-in for a period of two (2) years or twenty- four (24) months.
			</td>
		</tr>
	</table>
	<!-- page 12 -->
	<div class="new-page"></div>
	<table class="mpage8" width="100%">
		<tr>
			<td colspan="2" align="center" style="border: none;">

			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Investment Roll-over </td>
			<td align="left">
				Any Redeemable Preference Shares not redeemed upon the expiry of Lock-in Period will automatically be
				rolled-over into the same Redeemable Preference Shares class with similar terms and conditions without
				prior notification to the investors.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Investor’s Risk Barometer</td>
			<td align="left">
				High risk with more than two (2) years or twenty-four (24) months investment horizon.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Financial Year End</td>
			<td align="left">
				A period of twelve (12) months ending 31"t December of every year.
			</td>
		</tr>
	</table>
	<table class="mpage8" width="100%">
		<tr>
			<td colspan="2" align="center" style="background-color: #d8dfdf;">
				DISTRIBUTION
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Dividend Distribution Policy</td>
			<td align="left">
				MCIL Series 3 Fund intend to distribute dividend every quarter subject to decisions by the Manager and
				the availability of distributed income.
			</td>
		</tr>
	</table>
	<table class="mpage8" width="100%">
		<tr>
			<td colspan="2" align="center" style="background-color: #d8dfdf;">
				REDEMPTION
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Redemption Policy</td>
			<td align="left">
				MCIL Series 3 Fund shall redeem the Redeemable Preference Shares at the end of Lock-in Period. However,
				the Manager reserves the right to redeem the Redeemable Preference Share at any point of time during the
				Lock-in Period when it deemed fit and necessary.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Redemption Price</td>
			<td align="left">
				At the value of USD One only (USD 1.00) per Redeemable Preference Share.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Redemption Notice</td>
			<td align="left">
				Investor must submit Redemption Notice to the Manager at least forty- five (45) Business Days before the
				intended redemption date or Maturity Day of the Redeemable Preference Shares. The Manager may reject or
				delay the processing for payment of redemption proceed in the event the investors failed to submit a
				complete Redemption Notice or part of the information stated in the Redemption Notice is incomplete or
				incorrect.
			</td>
		</tr>
	</table>
	<!-- page 13 -->
	<div class="new-page"></div>
	<table class="mpage8" width="100%">
		<tr>
			<td colspan="2" align="center" style="background-color: #d8dfdf;">
				FEES, CHARGES AND EXPENSES
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				There are fees and charges involved. Investors are advised to consider the fees and charges before
				investing in MCIL Series 3 Fund.
				The Manager reserves the right to reduce or waive any fees and/or charges on its absolute discretion.
				This table below describes the fees and charges that you may incur when you invest in MCIL Series 3
				Fund.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Subscription Fee/ Sales Charge</td>
			<td align="left">
				MCIL Series 3 Fund shall charge an upfront subscription fee up to five percent (5%) of the Redeemable
				Preference Shares issued and subscribed by the investors.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Premature Redemption</td>
			<td align="left">
				Premature Redemption is not allowed. However, the Manager has at its absolute discretion to allow
				Premature Redemption on a case-to-case basis and charge a premature penalty charge of up to fifteen
				percent (15%) of the total premature Redeemable Preference Shares redeemed.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Redemption Fee</td>
			<td align="left">
				No redemption fee shall be charged if the redemption is made on or after Maturity Day.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Transfer Fee</td>
			<td align="left">
				Up to zero-point five percent (0.5%) of the Redeemable Preference Shares issued and subscribed at the
				point of transfer. The Manager reserves the right to reject any transfer request that may contradict the
				interest of MCIL Series 3 Fund.
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				The table below describes the fees and expenses that you may incur in addition to the other fees
				stipulated in clause 8.7 when you invest in MCIL Series 3 Fund.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Management Fee</td>
			<td align="left">
				Point zero five percent (0.05%) per annum of the Redeemable Preference Shares issued and subscribed
				chargeable at end of every Financial Year End.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Directors Fee</td>
			<td align="left">
				Point one percent (0.1%) per annum based on Redeemable Preference Shares issued and subscribed as at
				every quarter of the financial year and payable to each Director at every quarter and on equal sharing
				basis.
			</td>
		</tr>
	</table>
	<!-- page 14 -->
	<div class="new-page"></div>
	<table class="mpage8" width="100%">
		<tr>
			<td colspan="2" align="center" style="background-color: #d8dfdf;">
				TRANSACTION INFORMATION
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Minimum Initial Investment during the Offer Period</td>
			<td align="left">
				Minimum USD One Hundred Twenty Five Thousand only (USD
				125,000.00) or any amount equal or not less than Ringgit Malaysia Five Hundred Thousand (RM 500,000.00)
				or an amount equivalent in any foreign currency (exclusive of any subscription fee) or such other amount
				as is consistent with MCIL Series 3 Fund being registered under Labuan Law.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Minimum Subsequent Investment during the Offer Period</td>
			<td align="left">
				Minimum USD Ten Thousand only (USD 10,000.00) or any amount equal (exclusive of any subscription fee) or
				such other amount as is consistent with MCIL Series 3 Fund being registered under Labuan Law.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Minimum Redemption Amount</td>
			<td align="left">
				No restriction on minimum redemption amount.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Cooling-Off Period</td>
			<td align="left">
				The period of three (3) Business Days from the date the Manager receives the funds together with the
				duly completed transaction form. A Cooling- Off right is only given to an eligible investor.
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				The table below describes the fees and expenses that you may incur in addition to the other fees
				stipulated in clause 8.7 when you invest in MCIL Series 3 Fund.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Management Fee</td>
			<td align="left">
				Point zero five percent (0.05%) per annum of the Redeemable Preference Shares issued and subscribed
				chargeable at end of every Financial Year End.
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-6">Directors Fee</td>
			<td align="left">
				Point one percent (0.1%) per annum based on Redeemable Preference Shares issued and subscribed as at
				every quarter of the financial year and payable to each Director at every quarter and on equal sharing
				basis.
			</td>
		</tr>
	</table>
	<!-- page 14 -->
	<div class="new-page"></div>
	<table class="m3page2" border="1px">
		<tbody>
			<tr>
				<td colspan="3" style="font-size: 17px; font-weight: bold; text-align: center;">
					5. STRUCTURE OF AND INFORMATION ON MCIL SERIES 3 FUND
				</td>
			</tr>
		</tbody>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				MCIL INTL Series 3 Ltd was incorporated as a Labuan company under the provisions of the Labuan Companies
				Act 1990 on 29t' of July 2021. The sole purpose of MCIL INTL Series 3 Ltd is to hold the Fund’s assets
				and liabilities. It performs no other activities
			</td>
		</tr>
		<tr>
			<td colspan="3">
				The Board of Directors are not responsible for the management and day-to-day operations of the MCIL
				Series 3 Fund, nor are they responsible for making or approving any investment decisions having mandated
				such investment responsibilities to the Manager pursuant to the Management Agreement.
			</td>
		</tr>
		<tr>
			<td colspan="3">
				In accordance with the Management Agreement, the Manager is responsible for the determination and
				execution of investment strategies and policies, and for marketing of the Fund. In fulfilling these
				obligations, the Manager may engage and rely on services of Sub-managers, consultants and advisers.
				Nevertheless, all investment and divestment decisions shall be taken by the Manager, in line with the
				investment policy. The authority to make investment or divestment decisions shall lie solely with the
				Manager. The Manager will review, on a periodic basis, the performance of the Administrator, the
				Custodian, if any and any other service providers.
			</td>
		</tr>
		<tr>
			<td colspan="3">
				A copy of MCIL INTL Series 3 Ltd’s Infofmation Memorandum dated 1"t day of November 2021 has been lodged
				with LFSA as a private mutual fund and is governed under the Labuan Financial Services and Securities
				Act 2010 and shall be guided by relevant guidelines issue by LFSA from time to time.
			</td>
		</tr>
		<tr>
			<td colspan="3">
				The offer contained in this Information Memorandum is an offering to prospective investors to subscribe
				to a total of fifty million (50,000,000) Redeemable Preference Shares at an issue price of USD One (USD
				1.00) each. MCIL Series 3 Fund attempts to raise a total of USD Fifty Million (USD 50,000,000.00) with
				the ability to raise more or less.
			</td>
		</tr>
		<tr>
			<td colspan="3">
				MCIL Series 3 Fund currently plans to issue a single class Redeemable Preference Shares. However, MCIL
				Series 3 Fund is allowed to issue multi-classes of other type of shares in the event that it decided to
				do so in a later date subject to the compliance of relevant laws and guidelines then issued by LFSA.
			</td>
		</tr>
		<tr>
			<td colspan="3">
				MCIL Series 3 Fund plans to provide regular income to investors as well as to provide long-term returns
				from various financial instrument. However, the investors should fully understand the risks and rewards
				in funds such as this with a heavy focus, possible at any time in the investment period, on only a
				single or a few financial instruments. Investors should be reminded that past performance do not mean or
				should be assumed to assure that the present or future performance can continue or be repeated.
			</td>
		</tr>
	</table>
	<!-- page 15 -->
	<div class="new-page"></div>
	<table class="m3page2" border="1px">
		<tbody>
			<tr>
				<td colspan="3" style="font-size: 17px; font-weight: bold; text-align: center;">
					6. INVESTMENT STRATEGY
				</td>
			</tr>
		</tbody>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				MCIL Series 3 Fund attempts to provide regular income to investors when hold to expiry of the Lock-in
				Period. MCIL Series 3 Fund is focusing and open to invest into generic investment in various financial
				instrument include but not limited to quoted and unquoted equity, regulated and non-regulated fund, or
				any segregated fund related to private placement and related securities or other financial related
				marketable trade which are domiciled in Europe, London, Middle East and Asia Region in particular China,
				Singapore, Malaysia and Vietnam. MCIL Series 3 Fund also allows the investors to participate in
				large-scale enterprises, projects and development that would normally be far out of reach. This may be
				done by enabling investors to allocate a suitable proportion of their assets to invest into a specific
				investment portfolio without acquiring a directly held portfolio. MCIL Series 3 Fund may also acquire
				stakes or securities of companies in profitable and potential business or investment.
			</td>
		</tr>
		<tr>
			<td colspan="3">
				A proportion of the MCIL Series 3 Fund’s assets may be managed by Sub-manager who is specialized in an
				identified area of investment relevant to MCIL Series 3 Fund’s objective including investing in other
				collective investment schemes.
			</td>
		</tr>
		<tr>
			<td colspan="3">
				MCIL Series 3 Fund will apply a bottom-up approach to investable assets selection, the objective of
				which is to deliver out-performance by targeting absolute return to provide for regular income to
				investors. From time-to-time MCIL Series 3 Fund may adopt an aggressive weighting to financial
				instrument which the Manager believes offer the prospect of out-performance and conversely, may
				underweight to sectors which the Manager believes will under-performed.
			</td>
		</tr>
		<tr>
			<td colspan="3">
				MCIL Series 3 Fund will adopt an unconstrained investment strategy there can be no assurance that MCIL
				series 3 Fund's investments will be successful or that the objectives of MCIL series 3 Fund will be
				achieved,Investment results may vary Substantially over time.
			</td>
		</tr>
		<tr>
			<td colspan="3">
				Although the Manager may have during the period of investment an unconstrained investment strategy there
				can be no assurance hat MCIL series 3 Fund's investments will be successful or that the objactive of
				MCIL series 3 Fund Will be
				achieved.Investment results may vary Substantially over time.
			</td>
		</tr>
		<tr>
			<td colspan="3">
				There are several risks associated with this investment approach,many of which are beyond he contral of
				the manager.
				Please refer to the following Risk Factors section that lists all potential investment risks relating to
				investment in MCIL Series 3 Fund.
			</td>
		</tr>
		<tr>
			<td colspan="3">
				The minimun amount required for initial investment is USD one Hundred Twenty Five Thousand (USD
				123,000.00).
				Subsequent subscriptions must be made in an amount not less than USD Ten Thousand (USD 10,000.00) or as
				the Manager may generally or in any particular case determine from time to time.
			</td>
		</tr>
		<tr>
			<td colspan="3">
				The Manager has the right to exclude category of persons whose participation may adversely affect Mcil
				series 3 Fund.
			</td>
		</tr>
	</table>
	<!-- page 16 -->
	<div class="new-page"></div>
	<table class="m3page2" border="1px">
		<tbody>
			<tr>
				<td colspan="3" style="font-size: 17px; font-weight: bold; text-align: center;">
					7. RISK FACTORS
				</td>
			</tr>
		</tbody>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				In evaluating an investment in MCIL Series 3 Fund, the prospective investors should carefully consider
				all the information contained in this Information Memorandum, including but not limited to the following
				general and specific risk factors:
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">7.1.</td>
			<td align="left">Dividend Payment</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				The ability to pay future dividend and the ability to sustain our dividend policy in the future are
				largely dependent on the performance of MCIL Series 3 Fund. Hence, in determining the size of any
				dividend recommendation, MCIL Series 3 Fund will also take into consideration a number of factors,
				including but not limited to the financial performance, cash flow requirements, debt servicing and
				financing commitments, availability of distributed reserves and profits/tax credits, future expansion
				plans, loan covenants and compliance with regulator. There is risk that dividends will not be paid,
				including where the Manager decides not to pay a dividend. In such circumstances, investors have no
				entitlement to any payments of dividends.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">7.2.</td>
			<td align="left"> Concentration and Single Issuer</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				MCIL Series 3 Fund may invest large investments in a single issuer or security to meet its objective. In
				the event that this single issuer becomes insolvent or default on its securities, MCIL Series 3 Fund
				will be considered as unsecured creditor and will have no preferential claims to any assets held by the
				issuer. This excessive concentration into single issuer can also give rise to possible liquidity risk if
				the issuer failed to make any repayment or commitment to repay any debt securities. However, in order to
				mitigate this risk, the Manager endeavors to mitigate this risk by employing a systematic investment
				process incorporating sound risk management process.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">7.3.</td>
			<td align="left"> Market Risk</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				Generally, the investment return on a particular asset is correlated to the return on other assets from
				the same market, region or asset class. Market risk is impacted by broad factors such as interest rates,
				availability of credit, economic uncertainty, changes in laws and regulations (including government
				responses to financial crises and laws relating to taxation of MCIL Series 3 Fund’s investment), trade
				barriers, currency exchange controls, political environment, investor sentiment and significant external
				events (e.g. natural disasters). These factors may affect the level and volatility of the prices of
				securities or other financial instruments and the liquidity of MCIL Series 3 Fund’s investments.
				Volatility or illiquidity could impair MCIL Series 3 Fund’s profitability or result in losses. MCIL
				Series 3 Fund may maintain substantial trading positions that can be adversely affected by the level of
				volatility in the financial markets; the larger the positions, the greater the potential for loss.
			</td>
		</tr>
	</table>
	<!-- page 17 -->
	<div class="new-page"></div>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">7.4.</td>
			<td align="left"> Liquidity Risk</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				MCIL Series 3 Fund may invest in investment instruments that later become illiquid or otherwise
				restricted. MCIL Series 3 Fund might only be able to liquidate these positions at disadvantageous
				prices, should the Manager determine, or it become necessary, to do so. The decision to hold or
				liquidate such securities is at the sole discretion of the Manager. Illiquidity in certain markets could
				make it difficult for MCIL Series 3 Fund to liquidate positions on favorable terms, thereby resulting in
				losses of MCIL Series 3 Fund. In addition, some of the securities that MCIL Series 3 Fund may acquire
				may be traded on public exchanges, each exchange typically has the right to suspend or limit trading in
				the securities which it lists. Such a suspension could render it difficult or impossible for MCIL Series
				3 Fund to liquidate its positions and would thereby expose MCIL Series 3 Fund to losses. MCIL Series 3
				Fund therefore may be locked into an adverse price movement for several days or more which may result in
				immediate and substantial loss to investors. This risk is even more prominent in MCIL Series 3 Fund
				where it is allowed to invest in single issuer, securities and/or sector.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">7.5.</td>
			<td align="left"> Management Risk</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				Poor management of MCIL Series 3 Fund may jeopardize the investment of investors. Therefore, it is
				important for the Manager to set investment policies and appropriate strategies to be in line with the
				investment objective before any investment activities can be considered, there can be no guarantee that
				these measures will produce the desired results. However, this risk can be mitigated by incorporating
				strong corporate governance process within the Manager’s operating pfocedures.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">7.6.</td>
			<td align="left"> Loan Financial Risk</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				Some of the investments undertaken by MCIL Series 3 Fund may be partly financed by loans. Investors
				should be aware that they might be asked to provide additional funds or security to top up on the loan
				margins of MCIL Series 3 Funds borrowed, if the value of these investments goes down. Investors may be
				asked to bear the additional responsibilities and interest costs of financing the loan. Investors may
				also under these circumstances risk losing their initial capital.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">7.7.</td>
			<td align="left"> Political, Economic and Environmental Risks</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				The performance of MCIL Series 3 Fund may be affected by unforeseen changes in economic and market
				conditions; uncertainties in political developments such as military conflict and civil unrest, changes
				in government policies, the imposition of restrictions on the transfer of capital and in legal,
				regulatory and tax requirements; adverse natural events and conditions such as earthquake and tsunami,
				pandemic or other natural calamity beyond the control of the management.
			</td>
		</tr>
	</table>
	<!-- page 18 -->
	<div class="new-page"></div>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">7.8.</td>
			<td align="left"> Currency Risk</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				MCIL Series 3 Fund may invest in assets that are denominated in a currency other than the Base Curfency
				of that Fund. Accordingly, the value of an investof s investment may be affected favorably or
				unfavorably by fluctuations in the rates of the different currencies, as changes in the exchange rate
				between the Base Currency of MCIL Series 3 Fund and the designated currency of a class may lead to a
				depreciation and losses of the value of such investments made. However, the Manager may enter into
				hedging contracts with any bank to mitigate this currency risk if it is anticipated that the exchange
				rate fluctuation between these currencies will have significant negative impact on MCIL Series 3 Fund.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">7.9.</td>
			<td align="left"> Inflation Risk</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				This risk refers to the likelihood that an investor’s investments does not keep pace with inflation,
				thus resulting in the investor’s decreasing purchasing powef even though the investment in monetary
				terms may have increased.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">7.10.</td>
			<td align="left"> Possible Effect of Substantial Redemptions</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				Substantial redemptions of Redeemable Preference Shares could require MCIL Series 3 Fund to liquidate
				its positions more rapidly than otherwise desired in ordef to raise the cash necessary to fund the
				redemptions. Illiquidity in certain securities could make it difficult for MCIL Series 3 Fund to
				liquidate positions on favorable terms, which could result in losses or a decrease in the Redeemable
				Preference Shares of MCIL Sefies 3 Fund. MCIL Series 3 Fund is permitted to bofrow cash necessary to
				make payments in connection with redemption of the Redeemable Preference Shares when it determines that
				it would not be advisable to liquidate ponfolio assets fOf that purpose. MCIL Sefies 3 Fund is also
				authorized to pledge portfolio assets as collateral security for the repayment of such loans. In these
				circumstances, the continuing investofs will bear the fisk of any subsequent decline in the value of
				MCIL Series 3 Fund’s assets
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">7.11.</td>
			<td align="left"> Deferral of Redemption Payment</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				During the period of deferral, the Manager may be required to realize assets in MCIL Series 3 Fund to
				fund redemption requests, and this may entail disposals on a forced sale basis which will adversely
				impact MCIL Series 3 Fund’s financial performance
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">7.12.</td>
			<td align="left"> Portfolio Turnover</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				The investment strategy of MCIL Series 3 Fund will involve the taking of frequent trading positions,
				and, as a result, turnover, processing fee or any other associate expenses of MCIL Series 3 Fund may
				significantly exceed those of other investment entities of comparable size.
			</td>
		</tr>
	</table>
	<!-- page 19 -->
	<div class="new-page"></div>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">7.13.</td>
			<td align="left"> Short Selling</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				MCIL Series 3 Fund’s investing program might include short selling. Short sales can, in certain
				circumstances, substantially increase the impact of adverse price movements on MCIL Series 3 Fund’s
				ponfolio. A short sale of an investment instrument involves the risk of a theoretically unlimited
				increase in the market price of the investment instrument which could result in an inability to cover
				the short position or a theoretically unlimited loss. There can be no assurance that investment
				instruments necessary to cover a short position will be available for purchase.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">7.14.</td>
			<td align="left"> Regulatory Change</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				Investing and trading in Securities, and particularly in derivatives, may be subject to regulatory
				change. The possible regulatory changes which may result from these developments are unclear at this
				time. This process could result in new regulations or restrictions having a material adverse impact on
				the operations of MCIL Series 3 Fund. Further, there can be no assurance any such changes would not
				materially impact the ability of the Manager to implement the strategy described herein.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">7.15.</td>
			<td align="left"> Volatility Risk</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				MCIL Series 3 Fund’s investment program may involve the purchase and sale of relatively volatile
				securities and other instruments. Fluctuations or prolonged changes in the volatility of such
				instruments can adversely affect the value of investments held by MCIL Series 3 Fund.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">7.16. </td>
			<td align="left"> Country Risk</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				MCIL Series 3 Fund invest into generic investment in various financial instrument include but not
				limited to quoted and unquoted equity, regulated and non-regulated fund, or any segregated fund related
				to private placement and related securities which are domiciled in Europe, London, Middle East and Asia
				Region in particular China, Singapore, Malaysia and Vietnam. Any adverse changes in the countries’
				economic fundamentals, social and political stability, currency movements and foreign investments
				policies in countries may have an impact on the prices of the securities that invests in and
				consequently may also affect MCIL Series 3 Fund’s Redeemable Preference Shares.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">7.17. </td>
			<td align="left"> Non-compliance Risk</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				This risk arises from non-compliance with laws, rules and regulations, prescribed practices and the
				management company’s internal policies and procedures, for example, due to oversight by the Manager.
				Such non-compliance may force the Manager to sell down the investments at a loss to rectify
				non-compliance and in turn affect the value of investors’ investment in the wholesale fund.
			</td>
		</tr>
	</table>
	<!-- page 20 -->
	<div class="new-page"></div>
	<table class="m3page2" border="1px">
		<tbody>
			<tr>
				<td colspan="3" style="font-size: 17px; font-weight: bold; text-align: left;">
					8. FEES, CHARGES AND EXPENSES
				</td>
			</tr>
		</tbody>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				There are fees and charges involved. Investors are advised to consider the fees and charges before
				investing in MCIL Series 3 Fund. The Manager reserves the right to reduce or waive any fees and/or
				charges on its absolute discretion.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">8.1. </td>
			<td align="left"> Subscription Fee</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				MCIL Series 3 Fund shall charge an upfront subscription fee up to five percent (5%) of the Redeemable
				Preference Shares issued and subscribed by the investor.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">8.2. </td>
			<td align="left"> Premature Redemption Fee</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				A premature redemption is not allowed in MCIL Series 3 Fund. The Manager has absolute discretion to
				allow premature redemption on a case-to-case basis and deduct a penalty charge of up to fifteen percent
				(15%) of the total of Redeemable Preference Shares.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">8.3. </td>
			<td align="left"> Redemption Fee</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				No Redemption Fee shall be charged if the redemption is made on or after Maturity Day
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">8.4. </td>
			<td align="left"> Management Fee</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				The Manager will charge yearly fee of point zero five percent (0.05%) per annum of the Redeemable
				Preference Shares issues and subscribed at the end of Financial Period, payable annually.</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				The Manager will also be entitled to be reimbursed for all out-of-pocket expenses properly incurred by
				it in the performance of its duties for MCIL Series 3 Fund including, without limitation to travailing
				and related costs of attending meetings in relation to the investments and prospective investments of
				MCIL Series 3 Fund.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">8.5. </td>
			<td align="left"> Directors Fee</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				The proposed director fee is point one percent (0.1%) per annum based on the Redeemable Preference
				Shares issued and subscribed as at end of every quarter of the financial period and payable to the board
				of directors on an equal sharing basis.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">8.6. </td>
			<td align="left"> Transfer Fee</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3">
				Share transfer fees is up to zero-point five percent (0.5%) of the Redeemable Preference Shares issued
				and subscribed at the point of transfer. The Manager reserves the right to reject any share transfer
				request that may have negative impact and interest on MCIL Series 3 Fund.
			</td>
		</tr>
	</table>
	<!-- page 20 -->
	<div class="new-page"></div>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">8.7. </td>
			<td align="left"> Others Fees</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3" style="padding: 10px;">
				<ul>
					<li>Auditors' fee</li>
					<li>Tax advisers' fee</li>
					<li>Taxes</li>
					<li>Tax vouchers</li>
					<li>Cost of printing reports</li>
					<li>Committee members’ fee</li>
					<li>Fund initial set-up cost, licensing, and other fund maintenance cost</li>
					<li>Insurance premium on Fund’s physical assets (if any)</li>
					<li>Company’s government fee</li>
					<li>Information Technology fee</li>
					<li>Professional fee*</li>
				</ul>
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left"> *Note: These include fees paid to professionals such as consultants, investment advisers,
				Sub-
				Managers and valuers for the provision of services including but not limited to, advisory, research,
				valuation and so on for the benefits of MCIL Series 3 Fund.</td>
		</tr>
	</table>
	<!-- page 21 -->
	<div class="new-page"></div>
	<table class="m3page2" border="1px">
		<tbody>
			<tr>
				<td colspan="3" style="font-size: 17px; font-weight: bold; text-align: left;">
					9. TRANSACTION INFORMATION
				</td>
			</tr>
		</tbody>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">9.1. </td>
			<td align="left">Borrowing Policy</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left"> When deemed appropriate, MCIL Series 3 Fund may employ leverage including, without
				limitation, through borrowing cash, securities and other instruments and entering into derivative
				transactions and repurchase agreements. MCIL Series 3 Fund may pledge assets as security for borrowings.
				The use of leverage by MCIL Series 3 Fund will increase the risk of an investment. For the purposes of
				making investments, MCIL Series 3 Fund may borrow an amount equal to up to fifty percent (50%) of the
				total Redeemable Preference Shares. The total leverage in MCIL Series 3 Fund will not normally exceed an
				amount equal to up to fifty percent (50%) of the total Redeemable Preference Shares. MCIL Series 3 Fund
				may also borrow for the purposes of satisfying redemption requests or paying expenses, if required.</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">9.2. </td>
			<td align="left">Dividend Distribution Policy</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left"> MCIL Series 3 Fund intends to distribute dividend every quarter as determined by the
				Manager and subject to the availability of distributed income.</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">9.3. </td>
			<td align="left">Redemption Policy</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left"> The Manager shall redeem the Redeemable Preference Shares at the end of Lock-in Period.
				However, the Manager reserves the rights to redeem at the share based on the Redeemable Preference
				Shares at any point of time during the Lock-in Period when it deem fit and necessary. The Redemption
				Policy of the MCIL Series 3 Fund with respect of this Redeemable Preference Shares will be determined by
				the Manager at their sole discretion.</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">9.4. </td>
			<td align="left">Investment Restriction</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left"> Although MCIL Series 3 Fund will generally make direct investments, there is no
				restriction preventing MCIL Series 3 Fund from investing indirectly through one or more wholly owned
				subsidiaries or other vehicles where the Manager consider that this would be commercially and/or tax
				efficient and/or provide the only practicable means of access to the relevant instrument or strategy.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">9.5. </td>
			<td align="left"> Investment Information</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left"><span class="f-w-6"> (c) Operational Currency</span><br>
				The operational currency of the MCIL Series 3 Fund will be in USD.
			</td>
		</tr>
		<tr>
			<td align="left"><span class="f-w-6">(b) Minimum Initial Subscription Amount</span><br>
				The minimum initial investment per applicant is USD One Hundred Twenty Five Thousand (USD 125,000.00) or
				such lesser amount as the Manager may generally or in any particular case determine, provided that such
				amount is not less than Ringgit Malaysia Five Hundred Thousand (RM 500,000.00) (exclusive of any
				subscription fee) or any amount equivalent in any foreign currency or such other amount as is consistent
				with MCIL Series 3 Fund being registered under Labuan Law.
			</td>
		</tr>
	</table>
	<!-- page 25 -->
	<div class="new-page"></div>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left">
				In accordance with the Labuan Financial Services and Securities Act 2010 for the establishment of
				private mutual fund, MCIL Series 3 Fund may have any number of investors in view that the minimum
				initial investment for each investor shall be at least Ringgit Malaysia Five Hundred Thousand
				(RM500,000) or its equivalent in foreign currency.
			</td>
		</tr>
		<tr>
			<td align="left"><span class="f-w-6">(c) Minimum Subscription Amount for Subsequent Subscriptions</span><br>
				Subsequent subscriptions must be made in an amount not less than USD Ten Thousand (USD 10,000.00), or
				the Manager may generally or in any particular case determine from time to time.
			</td>
		</tr>
		<tr>
			<td align="left"><span class="f-w-6">(d) Subscription in currencies other than United State
					dollars</span><br>
				In the event that subscription monies are received in any currency other than the requested currency,
				namely, USD, conversion into the requested currency will be arranged by the Manager and/or its appointed
				exclusive distributors at the risk and expense of the applicant. Any bank charges in respect of
				electronic transfers will be deducted from subscriptions and the net amount only invested in MCIL Series
				3 Fund.
			</td>
		</tr>
		<tr>
			<td align="left"><span class="f-w-6">(e) Subscription Procedure</span><br>
				Subscribers of the MCIL Series 3 Fund during the Initial Offering Period must send their completed
				Application Form (refer to Annexure I) so as to be received by the Manager and/or its appointed
				exclusive distributors by no later than 5:00 p.m. (Labuan time) on the last Business Day of the Initial
				Offering Period. Cash subscription monies must be sent by electronic transfer, net of bank charges, so
				that cleared funds are received in the bank account of MCIL Series 3 Fund.
			</td>
		</tr>
		<tr>
			<td align="left">
				After the Initial Offer Period, subscribers and investors who wish to apply for additional units must
				send their completed Application Form so as to be received by the Manager and/or its appointed exclusive
				distributors by no later than 5:00 p.m. (Labuan time) on the last Business Day prior to the applicable
				Subscription Day. Applications received after this time will be dealt with on the next Subscription Day
				unless the Manager determine otherwise. Cash subscription monies must be sent by electronic transfer,
				net of bank charges, so that cleared funds are received in the bank account of the MCIL Series 3 Fund.
			</td>
		</tr>
		<tr>
			<td align="left">
				Applications may be sent by email provided the original follows promptly. None of Manager and/or its
				appointed exclusive distributors accepts any responsibility for any loss caused as a result of
				non-receipt or illegibility of any application sent by facsimile or for any loss caused in respect of
				any action taken as a consequence of such facsimile instructions believed in good faith to have
				originated from properly authorised persons.
			</td>
		</tr>
	</table>

	<!-- page 26 -->
	<div class="new-page"></div>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left">
				The Manager and/or its appointed exclusive distributors may reject any application in whole or part and
				without giving any reason for doing so. If an application is rejected, the subscription monies paid, or
				the balance thereof, as the case may be, will be returned (without interest) as soon as practicable to
				the account from which the subscription monies were originally remitted, at the risk and cost of the
				applicant.
			</td>
		</tr>
		<tr>
			<td align="left">
				Once a completed Application Form has been received by the Manager and/or its appointed Exclusive
				Distributors, it is irrevocable. <span class="f-w-6">Please note that the share certificates will not be
					distributed to
					investors in respect of MCIL Series 3 Fund.</span>
			</td>
		</tr>
		<tr>
			<td align="left"><span class="f-w-6">
					The Manager and/or its appointed exclusive distributors shall not accept cash investment directly
					into MCIL Series 3 Fund.
				</span>
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">9.6. </td>
			<td align="left">Redemption</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left"><span class="f-w-6">(a) Redemption Notice</span><br>
				Investor must submit Redemption Notice to the Manager at least forty-five (45) Business Days before the
				intended redemption date or Maturity Day of the Redeemable Preference Shares. The Manager may reject or
				delay the processing for payment of redemption proceed in the event the investors fail to submit a
				complete Redemption Notice or part of the information stated in the Redemption Notice is incomplete or
				incorrect.
			</td>
		</tr>
		<tr>
			<td align="left">
				The Redemption Notice should send to the address below.
			</td>
		</tr>
		<tr>
			<td align="left">
				Attn: Mirac Financial Ltd.,The Fund Manager of MCIL INTL Series 3 Ltd
			</td>
		</tr>
		<tr>
			<td align="left">
				Address: Unit Level 9F(2), Main Office Tower, Financial Park Labuan, Jalan Merdeka, 87000 F.T. Labuan,
				Malaysia
			</td>
		</tr>
		<tr>
			<td align="left"><span class="f-w-6">(b) Redemption Price</span><br>
				The redemption price at the value of USD One only (USD 1.00) per Redeemable Preference share.
			</td>
		</tr>
		<tr>
			<td align="left"><span class="f-w-6">(c) Lock-in Period</span><br>
				The Lock-in period shall have the same tenure and meaning as per described in the MCIL Series 3 Fund key
				features of the investment subscribed by the investor.
			</td>
		</tr>
		<tr>
			<td align="left" style="padding: 5px;"><span class="f-w-6">(i) Redemption Procedure and Notice
					Period</span><br>
				Investors wishing to redeem their Redeemable Preference Shares should send a completed Redemption Notice
				(refer to Annexure II) to the Manager and/or exclusive distributors, so as to be received by the Manager
				and/or exclusive distributors no later than 5:00 p.m. (Labuan time) on a Business Day falling at least
				forty-five (45) Business Days (or such shorter period as the Manager may generally or in any particular
				case permit) prior to the relevant Redemption Day. Unless the Manager agree otherwise, any Redemption
				Notice received after this time will be held over and dealt with on the next Redemption Day.
			</td>
		</tr>
	</table>
	<!-- page 26 -->
	<div class="new-page"></div>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left">The Redemption Notice may be sent by email to the following email address:-
			</td>
		</tr>
		<tr style="padding: 20px;">
			<td align="left">
				(a) Attn to The Fund Manager: contact H miracfinancia1.com
			</td>
		</tr>
		<tr style="padding:20px;">
			<td align="left">
				(b) C.c to The Fund Administrator: infoHsi1verknows.com
			</td>
		</tr>
		<tr>
			<td align="left">
				The redemption proceeds will not be paid until the original Redemption Notice is received by the Manager
				and/or exclusive distributors. None of the Manager, and/or exclusive distributors accepts any
				responsibility for any loss caused as a result of non-receipt or illegibility of any Redemption Notice
				sent by facsimile or for any loss caused in respect of any action taken as a consequence of such
				facsimile instructions believed in good faith to have originated from properly authorized persons.
			</td>
		</tr>
		<tr>
			<td align="left">
				The Manager and/or exclusive distributors will confirm, in writing, receipt of all Redemption Notice
				that are received in good order. An investor who does not receive a confirmation within three (3)
				Business Days should contact the Manager and/or exclusive distributors to confirm receipt.
			</td>
		</tr>
		<tr>
			<td align="left">
				A Redemption Notice may not be revoked by the investor save where redemption has been suspended by the
				Manager in the circumstances set out in this Information Memorandum.
			</td>
		</tr>
		<tr>
			<td align="left" style="padding: 5px;">
				The Manager are authorised and permitted at its sole discretion to take such action as it reasonably
				considers necessary or desirable, to suspend any redemption request. Provided however that the Manager
				may not suspend redemption request for more than six (6) months from the date of Redemption Day in
				respect of which it fall due.
			</td>
		</tr>
		<tr>
			<td align="left" style="padding: 5px;"><span class="f-w-6">(ii) Payment of Redemption Proceeds</span><br>
				Payment of redemption proceeds will normally be made within thirty (30) Business Days of the later of:
			</td>
		</tr>
		<tr>
			<td align="left" style="padding: 5px;"><span class="f-w-6">(a) the relevant Redemption Day; and</span>
			</td>
		</tr>
		<tr>
			<td align="left" style="padding: 5px;">(b) the date on which the Manager and/or exclusive distributors has
				received the original of the Redemption Notice and such other documentation as may be required.
			</td>
		</tr>
		<tr>
			<td align="left" style="padding: 5px;">
				The Manager are authorised and permitted at its sole discretion to take such action as it reasonably
				considers necessary or desirable, to defer any redemption payment. Provided however that the Manager may
				not defer redemption payment for more than three (3) months from the date of Redemption payment is due
				to be paid in respect of which an investor s fedemption request is first made.
			</td>
		</tr>
	</table>
	<!-- page 27 -->
	<div class="new-page"></div>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">9.7. </td>
			<td align="left"> Cooling-Off Period</td>
		</tr>

	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left" style="padding: 5px;">
				The cooling-off right is only given to an eligible investor. An eligible investor is a person who is
				investing in MCIL Series 3 Fund approved by the Manager. The cooling-off right allows investor the
				opportunity to reverse an investment decision which could have been unduly influenced by certain
				external elements or factors.
			</td>
		</tr>
		<tr>
			<td align="left" style="padding: 5px;">
				The refund to the investor pursuant to the exercise of his cooling-off right shall be the sum of:
			</td>
		</tr>
		<tr>
			<td align="left" style="padding: 5px;">(a) the Redeemable Preference Shares on the day were first purchased;
				and
			</td>
		</tr>
		<tr>
			<td align="left" style="padding: 5px;">(b) the sales charge originally imposed on the day the Redeemable
				Preference Shares were purchased.
			</td>
		</tr>
		<tr>
			<td align="left" style="padding: 5px;">
				The cooling-off period shall be within three (3) Business Days which shall be effective from the date
				the Manager receives the funds together with the duly completed transaction form. Investor may exercise
				cooling-off right on any Business Day by giving written notice to the Manager.
			</td>
		</tr>
		<tr>
			<td align="left" style="padding: 5px;">
				Cooling-off application should be made before the cut-off time of 5.00 p.m. on any Business Day. The
				cut-off time will be determined based on the time and date stamp made at the Manager’s office
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">9.8. </td>
			<td align="left"> Investment Roll-over</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left" style="padding: 5px;">
				Any Redeemable Preference Shares not redeemed upon the expiry of Lock-in Period will automatically be
				rolled-over into the same Redeemable Preference share class with the similar terms for another two (2)
				years or twenty-four (24) months Lock-in Period without prior notification to the investors.
			</td>
		</tr>
	</table>
	<!-- page 29 -->
	<div class="new-page"></div>
	<table class="m3page2" border="1px">
		<tbody>
			<tr>
				<td colspan="3" style="font-size: 17px; font-weight: bold; text-align: left;">
					10. INFORMATION ON THE FUND MANAGER
				</td>
			</tr>
		</tbody>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left" style="padding: 5px;">
				The strategic direction and investment policies of the MCIL Series 3 Fund will be under the stewardship
				of the Managef s principal, Mr. Chong Cheong Sin and Mr. Koh Thong Kheng.
			</td>
		</tr>
	</table>
	<table class="m3page2" style="border: none;">
		<tbody>
			<tr>
				<td colspan="3" style="font-weight:700; padding: 5px 0px 0px 15px !important">
					CHONG CHEONG SIN
				</td>
			</tr>
			<tr>
				<td colspan="3" style="font-weight:700; padding: 5px 0px 0px 15px !important">
					MANAGING DIRECTOR
				</td>
			</tr>
			<tr>
				<td colspan="3" style="font-weight:700; padding: 5px 0px 0px 15px !important">
					MIRAC FINANCIAL LTD
				</td>
			</tr>
		</tbody>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left" style="padding: 5px;">
				Mr. Chong Cheong Sin, fondly known as Jacky, is an institutional fund management expert, specialising in
				the areas of wealth management, investment research, investment advisory and portfolio management.
				Having been in the field for more than 20 years, he has established himself as a self-driven
				entrepreneur, with proven track records.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left" style="padding: 5px;">
				Jacky graduated with a bachelor's degree in Business Administration from the International Teaching
				University of Georgia in 2014 and a master’s degree in strategic management from the same university in
				2018. He has also completed the Doctor of Business Administration program with Collegium Humanum, Warsaw
				Management University and awaiting graduation in June 2022.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left" style="padding: 5px;">
				Jacky’s ability to build and nunure long-term relationships with business partners and institutional
				clients is solely based on his strong knowledge and technicalities of the international currency market,
				as well as sound understanding on future business derivatives. He has been invited by several brokerage
				firms in Asia as a corporate advisor, helping to create commerce systems, IT environments, and product
				strategies.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left" style="padding: 5px;">
				Jacky has formed strategic alliances with asset management firms in Singapore by creating Variable
				Capital Corporation (VCC) funds and advises portfolio managers on fund structure, trading systems and
				strategies for exclusive investors. In addition, he sits on the investment committee of two offshore
				investment funds based in Mauritius and Delaware, advising on fund formation, trading strategies and
				brokerage firm designation.
			</td>
		</tr>
	</table>
	<!-- page 30 -->
	<div class="new-page"></div>
	<table class="m3page2" style="border: none;">
		<tbody>
			<tr>
				<td colspan="3" style="font-weight:700; padding: 5px 0px 0px 15px !important">
					KOH THONG KHENG
				</td>
			</tr>
			<tr>
				<td colspan="3" style="font-weight:700; padding: 5px 0px 0px 15px !important">
					Director
				</td>
			</tr>
			<tr>
				<td colspan="3" style="font-weight:700; padding: 5px 0px 0px 15px !important">
					Mirac Financial Ltd.
				</td>
			</tr>
		</tbody>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left" style="padding: 5px;">
				With a multi-faceted career spanning close to two decades, Mr. Koh Thong Kheng possesses extensive
				knowledge and experience in a wide range of industries. Starting off in business trading, Mr. Koh Thong
				Kheng gained exposure to the export and import business as an export manager. He then ventured into the
				pharmaceutical industry, joining several multi-national companies such as Sanofi-genzyme, Alexion and
				Celgene. There, he successfully expanded the regional businesses that he was responsible for, in the
				process winning several awards for his achievements.
			</td>
		</tr>
		<tr>
			<td align="left" style="padding: 5px;">
				With his extensive business knowledge and experience, Mr. Koh Thong Kheng started a new partnership
				company, tapping into the vast growth potential and market for information and computer technology. In
				the same year, he was recruited to join the MCIL International Ltd, a private fund registered in Labuan,
				Malaysia, as their Head of Market Analyst, as well as to manage the fund’s operations. His valuable
				knowledge and experience in a wide range of entrepreneurial and leadership capacities made him the
				perfect fit, coupled with a keen personal interest in finance and investment.
			</td>
		</tr>
		<tr>
			<td align="left" style="padding: 5px;">
				Mr. Koh Thong Kheng has been professionally trained in numerous fields of trading and investment,
				including technical analysis on indicators, market patterns, Elliottwave theory and Delta timing.
				Additionally, he is adept in using multiple industry level trading software. From 2015-2016, he was a
				team leader for traders under a prop trading firm based in Singapore. Since 2016, he has been providing
				market analysis and commentary services to private funds. By harnessing his combined expertise in
				computer programming technology and investment savviness, he has helped his clients to develop and
				improve their proprietary trading system to comprehensively and safely analyse the financial market.
			</td>
		</tr>
	</table>
	<!-- page 31 -->
	<div class="new-page"></div>
	<table class="m3page2" border="1px">
		<tbody>
			<tr>
				<td colspan="3" style="font-size: 17px; font-weight: bold; text-align: left;">
					11.ARTICLES FOR THE REDEEMABLE PREFERENCE SHARES
				</td>
			</tr>
		</tbody>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left" style="padding: 5px;">
				The rights, privileges, restrictions and conditions of the investors of Redeemable Preference Shares are
				governed by the Articles of MCIL Series 3 Fund. Any prospective investors should examine these documents
				thoroughly and consult a professional legal counsel concerning his rights, privileges, restrictions, and
				conditions before subscribing for the Redeemable Preference share of MCIL Series 3 Fund. Copies of the
				Articles of MCIL Series 3 Fund are available for inspection by an interested investor at the Registered
				Office of MCIL Series 3 Fund’s office during normal business working hours on any Business Day. The
				below statements in this Information Memorandum are only a summary, and do not purport to be complete.
			</td>
		</tr>
		<tr>
			<td align="left" style="padding: 5px;">
				MCIL Series 3 Fund has issued and paid up capital of 10,000 ordinary share of USD1.00 each. In the event
				of liquidation, the ordinary shares rank only for a return of the nominal paid up on those shares after
				any payment to the investors of the Redeemable Preference Shares or any other shares ranking pari passu
				with the Redeemable Preference Shares.
			</td>
		</tr>
		<tr>
			<td align="left" style="padding: 5px;">
				The investors of the ordinary shares shall be entitled to attend, vote at all general meetings and to
				take any action by written resolution. Ordinary shares carry one (l) vote each on a poll. The investors
				of ordinary shares are entitled to dividend after the investor of Redeemable Preference Shares.
			</td>
		</tr>
		<tr>
			<td align="left" style="padding: 5px;">
				The Redeemable Preference Shares investors is entitled to receive notice, attend, speaks and voting
				rights in its own class of share only.
			</td>
		</tr>
	</table>

	<!-- 12 -->
	<!-- page 33 -->
	<div class="new-page"></div>
	<table class="m3page2" border="1px">
		<tbody>
			<tr>
				<td colspan="3" style="font-size: 17px; font-weight: bold; text-align: left;">
					12. FINANCIAL PROJECTION
				</td>
			</tr>
		</tbody>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">12.1. </td>
			<td align="left"> Proforma Statement of Comprehensive Income</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left">
				MCIL Intl Series 3 Ltd.
			</td>
		</tr>
		<tr>
			<td align="left">
				Projected Income Statement for he financial yezr ended 31 December
				<br>(All Figures are in USD)
			</td>
		</tr>
		<tr>
			<td align="center">
				Proforma Income Statement
			</td>
		</tr>
	</table>
	<table>
		<tbody>
			<tr>
				<td><strong>Revenue</strong></td>
			</tr>
			<tr>
				<td></td>
				<td><strong>Year 1</strong></td>
				<td><strong>Year 2</strong></td>
				<td><strong>Year 3</strong></td>
				<td><strong>Year 4</strong></td>
				<td><strong>Year 5</strong></td>
				<td><strong>Total</strong></td>
			</tr>
			<tr>
				<td>Interest Income</td>
				<td>38,000</td>
				<td>91,200</td>
				<td>148,000</td>
				<td>220,400</td>
				<td>277,400</td>
				<td>775,200</td>
			</tr>
			<tr>
				<td>Investment Return</td>
				<td class="border-bottom">760,000</td>
				<td class="border-bottom">1,824,000</td>
				<td class="border-bottom">2,964,000</td>
				<td class="border-bottom">4,408,000</td>
				<td class="border-bottom">5,548,000</td>
				<td class="border-bottom">15,504,000</td>
			</tr>
			<tr>
				<td><strong>Total Revenue</strong></td>
				<td>798,000</td>
				<td>1,915,200</td>
				<td>3,112,200</td>
				<td>4,628,400</td>
				<td>5,825,400</td>
				<td>16,279,200</td>
			</tr>
			<tr>
				<td><strong>Operating expenses</strong></td>
			</tr>
			<tr>
				<td>Subscription Fee</td>
				<td>(250,000)</td>
				<td>(350,000)</td>
				<td>(500,000)</td>
				<td>(650,000)</td>
				<td>(750,000)</td>
				<td>(2,500,000)</td>
			</tr>
			<tr>
				<td>Management Fee</td>
				<td>(1,900)</td>
				<td>(4,560)</td>
				<td>(7,410)</td>
				<td>(11,020)</td>
				<td>(13,870)</td>
				<td>(38,760)</td>
			</tr>
			<tr>
				<td>Director Fees</td>
				<td>(4,750)</td>
				<td>(6,650)</td>
				<td>(9,500)</td>
				<td>(12,350)</td>
				<td>(14,250)</td>
				<td>(47,500)</td>
			</tr>
			<tr>
				<td>Administrative Expenses</td>
				<td>(30,000)</td>
				<td>(350,000)</td>
				<td>(33,075)</td>
				<td>(34,729)</td>
				<td>(36,465)</td>
				<td>(165,769)</td>
			</tr>
			<tr>
				<td>Auditor's Remuneration</td>
				<td>(10,000)</td>
				<td>(10,600)</td>
				<td>(11,236)</td>
				<td>(11,910)</td>
				<td>(12,625)</td>
				<td>(56,371)</td>
			</tr>
			<tr>
				<td>Professional Fees</td>
				<td>(60,000)</td>
				<td>(63,600)</td>
				<td>(67,416)</td>
				<td>(71,461)</td>
				<td>(75,749)</td>
				<td>(338,226)</td>
			</tr>
			<tr>
				<td>Other Operating expenses</td>
				<td class="border-bottom">(30,000)</td>
				<td class="border-bottom">(31,800)</td>
				<td class="border-bottom">(33,708)</td>
				<td class="border-bottom">(35,730)</td>
				<td class="border-bottom">(37,874)</td>
				<td class="border-bottom">(169,113)</td>
			</tr>
			<tr>
				<td>Total Operating expenses</td>
				<td>(386,650)</td>
				<td>(498,710)</td>
				<td>(662,345)</td>
				<td>(827,200)</td>
				<td>(940,833)</td>
				<td>(3,315,738)</td>
			</tr>
			<tr class="mt-2">
				<td>Profit Before Tax</td>
				<td>411,350</td>
				<td>1,416,490</td>
				<td>2,449,855</td>
				<td>3,801,200</td>
				<td>4,884,567</td>
				<td>12,963,462</td>
			</tr>
			<tr class="mt-2">
				<td>Taxation(assuming ESR compiled)</td>
				<td class="border-bottom">-</td>
				<td class="border-bottom">-</td>
				<td class="border-bottom">-</td>
				<td class="border-bottom">-</td>
				<td class="border-bottom">-</td>
				<td class="border-bottom">-</td>
			</tr>
			<tr class="mt-2">
				<td>Profit After Taxation</td>
				<td>411,350</td>
				<td>1,416,490</td>
				<td>2,449,855</td>
				<td>3,801,200</td>
				<td>4,884,567</td>
				<td>12,963,462</td>
			</tr>
			<tr class="mt-2">
				<td>Net Profit b/f</td>
				<td>-</td>
				<td>78,850</td>
				<td>459,840</td>
				<td>1,161,695</td>
				<td>2,274,395</td>
				<td>-</td>
			</tr>
			<tr class="mt-2">
				<td>Distribution of Dividend</td>
				<td class="border-bottom">(332,500)</td>
				<td class="border-bottom">(1,035,500)</td>
				<td class="border-bottom">(1,748,000)</td>
				<td class="border-bottom">(2,688,500)</td>
				<td class="border-bottom">(3,448,500)</td>
				<td class="border-bottom">(9,253,000)</td>
			</tr>
			<tr class="mt-2">
				<td>Profit After Distribution of Dividend c/f</td>
				<td>78,850</td>
				<td>459,840</td>
				<td>1,161,695</td>
				<td>2,274,395</td>
				<td>3,710,462</td>
				<td>3,710,463</td>
			</tr>
		</tbody>

	</table>
	<!-- page 33 -->
	<div class="new-page"></div>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">12.2. </td>
			<td align="left"> Proforma Statement of Financial Position</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left">
				MCIL Intl Series 3 Ltd.
			</td>
		</tr>
		<tr>
			<td align="left">
				Projected Income Statement for he financial yezr ended 31 December
				<br>(All Figures are in USD)
			</td>
		</tr>
		<tr>
			<td align="center">
				Proforma Income Statement
			</td>
		</tr>
	</table>
	<table>
		<tbody>
			<tr>
				<td><strong>ASSETS</strong></td>
			</tr>
			<tr>
				<td></td>
				<td><strong>Year 1</strong></td>
				<td><strong>Year 2</strong></td>
				<td><strong>Year 3</strong></td>
				<td><strong>Year 4</strong></td>
				<td><strong>Year 5</strong></td>
			</tr>
			<tr>
				<td>Non Current Assets </td>
			</tr>
			<tr>
				<td>Investment</td>
				<td class="border-bottom">3,800,000</td>
				<td class="border-bottom">9,120,000</td>
				<td class="border-bottom">14,820,000</td>
				<td class="border-bottom">22,040,000</td>
				<td class="border-bottom">27,740,000</td>
			</tr>
			<tr>
				<td><strong>Total Non Current Assets</strong></td>
				<td>3,800,000</td>
				<td>9,120,000</td>
				<td>14,820,000</td>
				<td>22,040,000<</td>
				<td>27,740,000</td>
			</tr>
			<tr>
				<td>Current Assets </td>
			</tr>
			<tr>
				<td>Bank and Cash Equivalents</td>
				<td class="border-bottom">1,038,850</td>
				<td class="border-bottom">2,749,840</td>
				<td class="border-bottom">4,876,695</td>
				<td class="border-bottom">7,794,395</td>
				<td class="border-bottom">10,655,462</td>
			</tr>
			<tr>
				<td><strong>Total Current Assets</strong></td>
				<td class="border-bottom">1,038,850</td>
				<td class="border-bottom">2,749,840</td>
				<td class="border-bottom">4,876,695</td>
				<td class="border-bottom">7,794,395</td>
				<td class="border-bottom">10,655,462</td>
			</tr>
			<tr>
				<td><strong>Total Assets</strong></td>
				<td>4,838,580</td>
				<td>11,869,840</td>
				<td>19,696,695</td>
				<td>29,834,395</td>
				<td>38,395,462</td>
			</tr>
			<tr>
				<td>EQUITY AND LIABILITIES </td>
			</tr>
			<tr>
				<td>EQUITY </td>
			</tr>
			<tr>
				<td>Ordinary Shares</td>
				<td>10,000</td>
				<td>10,000</td>
				<td>10,000</td>
				<td>10,000</td>
				<td>10,000</td>
			</tr>
			<tr>
				<td>Participatings Shares</td>
				<td>4,750,000</td>
				<td>11,400,000</td>
				<td>18,525,000</td>
				<td>27,550,000</td>
				<td>34,675,000</td>
			</tr>
			<tr>
				<td>Retained Earnings</td>
				<td class="border-bottom">78,850</td>
				<td class="border-bottom">459,840</td>
				<td class="border-bottom">1,161,695</td>
				<td class="border-bottom">2,274,395</td>
				<td class="border-bottom">3,710,462</td>
			</tr>
			<tr>
				<td>Total Equity</td>
				<td>4,838,850</td>
				<td>11,869,840</td>
				<td>19,696,695</td>
				<td>29,834,395</td>
				<td>38,395,462</td>
			</tr>
			<tr>
				<td>TOTAL EQUITY AND LIABILITIES </td>
				<td>4,838,850</td>
				<td>11,869,840</td>
				<td>19,696,695</td>
				<td>29,834,395</td>
				<td>38,395,462</td>
			</tr>
		</tbody>

	</table>
	<!-- page 34 -->
	<div class="new-page"></div>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">12.3. </td>
			<td align="left"> Proforma Cash Flow Statement</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left">
				MCIL Intl Series 3 Ltd.
			</td>
		</tr>
		<tr>
			<td align="left">
				Projected Income Statement for he financial yezr ended 31 December
				<br>(All Figures are in USD)
			</td>
		</tr>
		<tr>
			<td align="center">
				Proforma Income Statement
			</td>
		</tr>
	</table>
	<table class="mpage10">
		<tbody>
			<tr>
				<td><strong>Cash In Flow</strong></td>
			</tr>
			<tr>
				<td></td>
				<td><strong>Year 1</strong></td>
				<td><strong>Year 2</strong></td>
				<td><strong>Year 3</strong></td>
				<td><strong>Year 4</strong></td>
				<td><strong>Year 5</strong></td>
				<td><strong>Total</strong></td>
			</tr>
			<tr>
				<td>Participating Shares subscribed</td>
				<td>4,750,000</td>
				<td>6,650,000</td>
				<td>9,500,000</td>
				<td>12,350,000</td>
				<td>14,250,000</td>
				<td>47,500,000</td>
			</tr>
			<tr>
				<td>Interest Income</td>
				<td>38,000</td>
				<td>91,200</td>
				<td>148,000</td>
				<td>220,000</td>
				<td>277,400</td>
				<td>775,200</td>
			</tr>
			<tr>
				<td>Investment Return</td>
				<td class="border-bottom">760,000</td>
				<td class="border-bottom">1,824,000</td>
				<td class="border-bottom">2,964,000</td>
				<td class="border-bottom">4,408,000</td>
				<td class="border-bottom">5,548,000</td>
				<td class="border-bottom">15,504,000</td>
			</tr>
			<tr>
				<td><strong>Total Cash Flow</strong></td>
				<td>5,548,000</td>
				<td>8,565,200</td>
				<td>12,612,000</td>
				<td>16,978,400</td>
				<td>20,075,400</td>
				<td>63,779,200</td>
			</tr>
			<tr>
				<td><strong>Cash Out Flow</strong></td>
			</tr>
			<tr>
				<td>Investment</td>
				<td>(3,800,000)</td>
				<td>(5,320,000)</td>
				<td>(5,700,000)</td>
				<td>(7,220,000)</td>
				<td>(5,700,000)</td>
				<td>(27,740,000)</td>
			</tr>
			<tr>
				<td>Redemption of Participating Shares</td>
				<td>-</td>
				<td>-</td>
				<td>(2,375,000)</td>
				<td>(3,325,000)</td>
				<td>(1,125,000)</td>
				<td>(12,825,000)</td>
			</tr>
			<tr>
				<td><strong>Operating expenses</strong></td>
			</tr>
			<tr>
				<td>Subscription Fee</td>
				<td>(250,000)</td>
				<td>(350,000)</td>
				<td>(500,000)</td>
				<td>(650,000)</td>
				<td>(750,000)</td>
				<td>(2,500,000)</td>
			</tr>
			<tr>
				<td>Management Fee</td>
				<td>(1,900)</td>
				<td>(4,560)</td>
				<td>(7,410)</td>
				<td>(11,020)</td>
				<td>(13,870)</td>
				<td>(38,760)</td>
			</tr>
			<tr>
				<td>Director Fees</td>
				<td>(4,750)</td>
				<td>(6,650)</td>
				<td>(9,500)</td>
				<td>(12,350)</td>
				<td>(14,250)</td>
				<td>(47,500)</td>
			</tr>
			<tr>
				<td>Administrative Expenses</td>
				<td>(30,000)</td>
				<td>(350,000)</td>
				<td>(33,075)</td>
				<td>(34,729)</td>
				<td>(36,465)</td>
				<td>(165,769)</td>
			</tr>
			<tr>
				<td>Auditor's Remuneration</td>
				<td>(10,000)</td>
				<td>(10,600)</td>
				<td>(11,236)</td>
				<td>(11,910)</td>
				<td>(12,625)</td>
				<td>(56,371)</td>
			</tr>
			<tr>
				<td>Professional Fees</td>
				<td>(60,000)</td>
				<td>(63,600)</td>
				<td>(67,416)</td>
				<td>(71,461)</td>
				<td>(75,749)</td>
				<td>(338,226)</td>
			</tr>
			<tr>
				<td>Other Operating expenses</td>
				<td class="border-bottom">(30,000)</td>
				<td class="border-bottom">(31,800)</td>
				<td class="border-bottom">(33,708)</td>
				<td class="border-bottom">(35,730)</td>
				<td class="border-bottom">(37,874)</td>
				<td class="border-bottom">(169,113)</td>
			</tr>
			<tr class="mt-2">
				<td>Taxation</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
			</tr>
			<tr class="mt-2">
				<td>Dividend Paid to shareholders of Participating shares</td>
				<td>(332,500)</td>
				<td>(1,035,500)</td>
				<td>(1,748,000)</td>
				<td>(2,688,500)</td>
				<td>(3,448,500)</td>
				<td>(9,253,000)</td>
			</tr>
			<tr class="mt-2">
				<td>Total Outflow</td>
				<td>(4,519,150)</td>
				<td>(6,854,210)</td>
				<td>(10,485,345)</td>
				<td>(14,060,700)</td>
				<td>(17,214,333)</td>
				<td>(53,133,738)</td>
			</tr>
			<tr class="mt-2">
				<td>Net Increase in Cash & Cash Equivalent</td>
				<td class="border-bottom">1,028,850</td>
				<td class="border-bottom">1,710,990</td>
				<td class="border-bottom">2,126,855</td>
				<td class="border-bottom">2,917,700</td>
				<td class="border-bottom">2,861,067</td>
				<td class="border-bottom">10,645,462</td>
			</tr>
			<tr class="mt-2">
				<td> Cash & Cash Equivalent at the begining of the year</td>
				<td class="border-bottom">10,000</td>
				<td class="border-bottom">1,038,850</td>
				<td class="border-bottom">2,749,840</td>
				<td class="border-bottom">4,876,695</td>
				<td class="border-bottom">7,794,395</td>
				<td class="border-bottom">10,000</td>
			</tr>
			<tr class="mt-2">
				<td>Cash & Cash Equivalent at the end of the year</td>
				<td>1,038,850</td>
				<td>2,749,840</td>
				<td>4,876,695</td>
				<td>7,794,395</td>
				<td>10,655,462</td>
				<td>10,655,462</td>
			</tr>
		</tbody>

	</table>
	<!-- 13 -->

	<!-- page 35 -->
	<div class="new-page"></div>
	<table class="m3page2" border="1px">
		<tbody>
			<tr>
				<td colspan="3" style="font-size: 17px; font-weight: bold; text-align: left;">
					13.ADDITIONAL INFORMATION
				</td>
			</tr>
		</tbody>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">13.1. </td>
			<td align="left"> Fund Manager’s Discretion
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left">
				The Manager has the absolute discretion to accept or reject, in whole or in
				part, any application for
				Redeemable Preference Shares of MCIL Series 3 Fund without giving any reason
				whatsoever, as recommended
				by the Manager.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">13.2. </td>
			<td align="left">Anti-Money Laundering Policy</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left">The administration of MCIL Series 3 Fund is fully compliant with
				current anti-money
				laundering requirements and checks will be made on all applicants. All
				application for Redeemable
				Preference Shares must be accompanied by proper identification documents for our
				verification. We
				reserve the right to check our investors against various reliable sources for
				money laundering
				information. Enhanced due diligence process will be conducted on high-risk
				customers which would require
				Managers’ review and approval. Categorizing of high-risk investors is based on
				the Manager’s sole
				discretion. Any cases which are suspicious will be reported to our internal
				Money Laundering Prevention
				personnel and if necessary, the matter will then be reported to the LFSA and/or
				Bank Negara Malaysia.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">13.3. </td>
			<td align="left">Conflict of Interest Policy</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left">The Manager of MCIL Series 3 Fund is or may be involved in other
				financial, investment and
				professional activities which may, on occasion, cause conflicts of interest in
				the management of MCIL
				Series 3 Fund. In addition, the MCIL Series 3 Fund may enter into transactions
				at arm’s length with
				companies in the same group as or controlled directly or indirectly by the
				Manager. In doing so, all
				parties shall ensure that the performance of their respective duties will not be
				impaired by any such
				involvement.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-5 f-w-6">13.4. </td>
			<td align="left"> Termination of the MCIL Series 3 Fund</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td align="left">MCIL Series 3 Fund may be terminated by giving written notice to
				investors if at any time
				after the Commencement Date, MCIL Series 3 Fund is deemed to be uneconomical to
				continue. Investors will
				be paid an amount in accordance with the Redeemable Preference Shares of the
				MCIL Series 3 Fund at the
				point of termination as calculated by the Auditors of the MCIL Series 3 Fund.
				For the avoidance of
				doubt, investors will not be charged any Redemption Fee if the aforesaid is
				done.
			</td>
		</tr>
		<tr>
			<td align="left">In the event of any disruptive acts or events which are beyond its
				control, the Manager may
				terminate or liquidate MCIL Series 3 Fund, in which case any surplus assets
				after paying off debts,
				liabilities and fees that are associated with this exercise shall be distributed
				to the investors
				accordingly.
			</td>
		</tr>
	</table>
	<!-- 11111111111111111111111111111111 -->
	<div class="new-page"></div>
	<p style="text-align: center; padding: 0px; font-size: 25px;">SHARES APPLICATION FORM
		(股份申请书)</p>
	<hr>
	<p style="font-size: 10px; font-weight: bold;">Important Notes (重要事项):</p>

	<table class="page2" border="1px">
		<tbody>
			<tr>
				<td>
					<p style="font-size: 10px; font-weight: bold;">Application (申请书)</p>
					<ol>
						<li>Minimum initial investment amount shall be USD 70,000.00 or any
							amount equal or more than
							Ringgit Malaysia Two Hundred Fifty Thousand (RM250,000.00)
							(首次投资，最低金额为70,000.00美元
							或任何等于或超过马币二十五万令吉(RM250,000.00)。)</li>
						<li>Applicant must be 18 years old and above. (Joint applicant maybe a
							minor)
							(申请者必须年满18岁。（联合申请人可以是未成年人）)</li>
						<li>A clear and enlarged photocopy or both sides of the Identity
							Card/Passport.(须提交清晰、放大的身份证或护照复印件（双面）。）</li>
						<li>For an application who is a corporation （法人实体申请者）:

							<ul>
								<li>
									<p>the common seal or the company's stamp will have to be
										affixed.<br>(须加盖公章或公司印章。）
									</p>
								</li>

								<li>
									<p>corporation filling the share application form under the
										hand of the official
										must state the capacity of that
										official.<br>(须注明填写股份申请书的官员的职务。)</p>
								</li>

								<li>
									<p>certified copies of the Certificate of Incorporation or
										Registration together
										with a certified copy of the Memorandum and Articles of
										Association or
										Constitution or By-Laws or Charter and certified copies
										of the relevant
										resolutions should be forwarded together with the Share
										Application Form to the
										Board of
										Directors.<br>(须将公司成立登记证或注册证的核证副本；章程及规章、公司章程、附则、宪章的核证副本；相关议决的核证副本连同本股份申请书一起提交予董事会。)
									</p>
								</li>

								<li>
									<p>special resolution of the applicant's Board of Directors,
										as verified and signed
										by the company secretary, to invest for as pecified sum
										in The
										Fund.<br>(若要投资于本基金，必须事先通过该公司董事会的特别议决，再由公司秘书核实及签字。)</p>
								</li>
							</ul>
						</li>
					</ol>
					<p style="font-size: 10px; font-weight: bold;">Payment (付款)</p>
					<ol start="5">
						<li>Unless otherwise instructed / informed by the company, all cheques,
							bank drafts or
							cashiers/money orders must be made payable to "<b>MCIL INTL SERIES 3
								LTD</b>" and crossed
							"<b>ACCOUNT PAYEE ONLY</b>". Please write your name/company's name,
							NRIC/Passport
							number/Certificate of Incorporation number on the back of all
							cheques, bank drafts or
							cashier's orders/ money
							orders.<br>(除非公司另有指示/通知,支票、银行汇票或银行本票抬头请写“<b>MCIL INTL SERIES 3
								LTD</b>”, 并且在支票左上角画两条平行线，写上“<b>ACCOUNT PAYEE
								ONLY</b>”只限存入抬头人账户）。请在支票、银行汇票或银行本票背面注明你的姓名或公司名称；身份证号码或护照号码或公司成立登记证号码。
						</li>

						<li>For joint investment:（联合投资）:

							<ul>
								<li>
									<p>applicants must specify the person whom the company may
										give a Redemption Notice.
										If not, the Board of Directors will only act upon an
										instruction signed by all
										the applicants aged 18 years old and above.
										<br>(申请人必须指明公司可发出赎回通知的人。否则，董事会只能根据所有18 岁及以上的申请人签署的指示行事。）
									</p>
								</li>
							</ul>
						</li>
					</ol>

				</td>
				<td>

					<ul>
						<li>
							<p>Payment instruction for Redemption Notice, Applicants must
								specify to whom payment will
								be made. If not, all payments will be made in the name of the
								<b>Principal Holder and/or
									Joint Holder Accounts</b>.<br>(赎回通知的付款指示，申请人必须指定付款对象。否则，
								所有款项将以申请人和/或联合申请人账户的名义支付。)
							</p>
						</li>

						<li>
							<p>Please e-mail the form to us at admin@mcilintl.com or post it to
								us at: <b>MCIL INTL
									SERIES 3 LTD</b>, Address: Unit 3A-2, Level 3A, Labuan Times
								Square, Jalan Merdeka,
								87000 F.T. Labuan, Malaysia. (请通过电子邮件将申请书发送至 admin@mcilintl.com
								或将申请书邮寄至： F.T.Labuan,
								Malaysia.) <b>MCIL INTL SERIES 3 LTD</b>，地址：Unit 3A-2, Level 3A,
								Labuan Times Square,
								Jalan Merdeka, 87000 F.T. Labuan, Malaysia.</p>
						</li>
					</ul>
					<p style="font-size: 10px; font-weight: bold;">Share/Unit Certificate (股份证书)
					</p>
					<ol start=7>
						<li>
							<p>Investments in the share/unit of The Fund managed by the Board of
								Directors are
								script-less, that is, no share/unit certificate(s) will be
								issued. Only Acknowledgment /
								Receipt(s) will be issued to investors as confirmation of their
								investment.
								(由董事会负责管理的本基金不 发股票给投资者，仅发出确认通知或收据予投资者作为投资的确 认。)</p>
					</ol>
					<p style="font-size: 10px; font-weight: bold;">Rights of MCIL Intl Series 3
						Ltd Board of Directors
						(MCIL 基金董事会的权利)</p>

					<ol start=8>
						<li>The Board of Directors reserve the right to accept or reject any
							application in whole or in
							part there of with out assigning reasons inrespect there
							of.(董事会保留接受或拒绝任何申请认购的权利，无论是全部或一部分，而且无需提供任何理由。)</li>
						<li>Investor(s) hereby agree to indemnify the Board of Directors and any
							of its agents against
							any losses, costs and expenses which maybe incurred by any or all of
							them arising either
							directly or indirectly in connection with maintaining an investment
							account with the Board
							of Directors or, in connection with any instructions /confirmation
							given in any format made
							by or on behalf of investor,unless the losses, costs and expenses
							are due to the wilful
							defaultor negligence of the Board of Directors or its
							agents.((若是基于要维持投资账户，或因为投资
							者或其代表以任何形式发出任何指示或确认而直接或间接导致 投资发生任何损失、开销和费用，投资者愿意对董事会及它所委
							任的任何代理人作出赔偿，除非有关损失、开销和费用是因董事
							会或其代理人蓄意违约或疏忽所致。)</li>
						<li>Investor(s) hereby note and acknowledge that they may have provided
							and may provide personal
							information ("Data") to the Board of Directors and / or any of its
							agents. Investors are
							responsible to notify the Board of Directors in writing within one
							(l)calendar month of any
							change to the Data. Investor(s) hereby agreeand acknowledge that the
							Data and investment
							data may be used or processed by the Board of Directors and / or its
							agents within or
							outside Malaysia for the purpose of the provision of any services
							related to The Fund and /
							or investor's investments.(投资者了解并确认，本身可能已经提供，和将来有
							可能会提供其个人信息（以下简称“资料”）予董事会和/或它所
							委任的任何代理人。若有关资料有任何变更，投资者有责任在壹 （1）个月内发出书面通知予董事会。投资者特此同意并确认，
							董事会和/或其代理人可在马来西亚境内外使用或处理上述资料
							和投资资料，作为提供与MCIL 基金和/或投资相关的任何服务 之用途。</li>
					</ol>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="new-page"></div>

	<h3 style="font-size: 12px;">(A) PRIVATE INDIVIDUAL (私人个体)</h3>
	<h4 style="font-size: 12px;">Name and Particulars of Principal Applicant (申请者姓名和资料)</h4>
	<table class="page3" border="1px;" width="100%">
		<tbody>
			<tr>
				<td width="35%" style="background-color:#d8dfdf;">
					<p>Name (as per NRIC/Passport)<br />姓名(如同身份证件/护照)</p>
				</td>
				<td width="65%">
					<p><?= $subscription->has('individual') ? $subscription->individual->salutation : '' ?> <?= strtoupper($subscription->user->first_name); ?><br/>Gender (性别):  <?= $subscription->has('individual') ? $subscription->individual->gender : '' ?></p>
				</td>
			</tr>
			<tr>
				<td style="background-color:#d8dfdf;">
					<p>Address:<br>(地址)</p>
				</td>
				<td>
					<p><?= $subscription->user->address_line1 ?>, <?= !empty($subscription->user->address_line2) ? $subscription->user->address_line2 . "," : '' ?> <?= $subscription->user->city ?>, <?= $subscription->has('user') ? $subscription->user->stateAs->name : '' ?></p>
					<table width="100%" border="1px">
						<tr>
							<td width="40%">
								<p>Postcode (邮编): <?= $subscription->user->post_code ?></p>
							</td>
							<td width="60%">
								<p>Mobile No.(手机号码): +<?= $subscription->has('user') ? $subscription->user->mobilePrefix->calling_code : '' ?> <?= $subscription->user->mobile_no;?></p>
							</td>
						</tr>
						<tr>
							<td>
								<p>Country (国家): <?= $subscription->has('user') ? $subscription->user->countryAs->name : '' ?></p>
							</td>
							<td>
								<p>Email （电邮地址）: <?= $subscription->user->email ?></p>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style="background-color:#d8dfdf;">
					<p>NRIC/Passport No. (身份证件/护照号码)</p>
				</td>
				<td>
					<p><?= $subscription->has('individual') ? $subscription->individual->passport : '' ?></p>
				</td>
			</tr>
			<tr>
				<td style="background-color:#d8dfdf;">
					<p>Nationality (国籍)</p>
				</td>
				<td>
					<p><?= $subscription->has('individual') ? $subscription->individual->nationality : '' ?></p>
				</td>
			</tr>
			<tr>
				<td style="background-color:#d8dfdf;">
					<p>Occupation (职业)</p>
				</td>
				<td>
					<p><?= $subscription->has('individual') ? $subscription->individual->occupation : '' ?></p>
				</td>
			</tr>
			<tr>
				<td style="background-color:#d8dfdf;">
					<p>Date of Birth (出生日期) – DD-MM-YYYY</p>
				</td>
				<td>
					<p><?= $subscription->has('individual') ? date('d-m-Y', strtotime($subscription->individual->dob)) : '' ?></p>
				</td>
			</tr>
		</tbody>
	</table>
	<br>

	<h4 style="font-size: 12px;">Name and Particulars of Joint Applicant(联合申请者姓名和资料)</h4>

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
            <td> <p><?= $subscription->ja_addr_line_1 ?>, <?= !empty($subscription->ja_addr_line_2) ? $subscription->ja_addr_line_2 . "," : '' ?> <?= $subscription->ja_city ?>, <?= $subscription->ja_state_id ? $subscription->SubscriptionJaState->name : '' ?></p>
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
	<h4 style="font-size: 12px;">Payment Instruction for Dividend Payouts(红利支付指示)</h4>

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
                    <?= !empty($subscription->address_line_2) ? $subscription->address_line_2 . "," : '' ?> 
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
	<h4 style="font-size: 12px;">Investment Details (投资信息)</h4>

    <?php
        $initial_investment = $subscription->initial_investment;
        if($initial_investment >= 125000) {
            $subscription_fee = 1;
        } else {
            $subscription_fee =  0.5;
        }

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
            <td>Subscription Fee (%) (费用-%): <?= $subscription_fee; ?>%</td>
            <td colspan="2">Total Amount (USD) (金额-美元): <?= number_format($total) ?></td>
        </tr>
    </table>

	<!-- page 4 -->
	<div class="new-page"></div>
	<h2 style="font-size: 14px;">Name and Particulars of Beneficiary (受益人姓名和资料)</h2>

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
            <td><?= $subscription->b1_address_line_1 ?>,
                    <?= !empty($subscription->b1_address_line_2) ? $subscription->b1_address_line_2 . "," : '' ?>   
                    <?= $subscription->b1_city ?>, 
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

	<h3 style="font-size: 12px;">Payment Instruction for Redemption (赎回指示)</h3>
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
	<table width="100%">
		<tr>
	        <td colspan="3" style="padding: 15px 0px;" class="font-16">Relationship to Applicant (与申请人的关系) <u><?= $subscription->b1_relationship ?></u></td>
	    </tr>
	</table>


	<h3 style="font-size: 12px;">BENEFICIARY 2 (第二受益人)</h3>
	<table class="page4" border="1px;" width="100%">
		<tr>
			<td class="cl-35">Name (as per NRIC/Passport)<br />姓名(如同身份证件/护照)</td>
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

	<h3 style="font-size: 12px;">Payment Instruction for Redemption (赎回指示)</h3>
	<table class="page4" border="1px;" width="100%">
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
			<td style="padding: 8px 0px;" class="font-12"><b>Relationship to Applicant</b>
				(与申请人的关系)
				__________________________________________________</td>
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
            <td><?= $subscription->b1_address_line_1 ?>,
                    <?= !empty($subscription->b1_address_line_2) ? $subscription->b1_address_line_2 . "," : '' ?> 
                    <?= $subscription->b1_city ?>, 
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
            <td><?= $subscription->b2_address_line_1 ?>,
                    <?= !empty($subscription->b2_address_line_2) ? $subscription->b2_address_line_2 . "," : '' ?>   
                    <?= $subscription->b2_city ?>, 
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

	<!-- page 5 -->

	<p style="padding: 8px 0px;">Any specific instructions (if any) kindly write in to the
		Company (任何具体说明（如有）请以书信通知公司)
	</p>

	<table class="table" width="100%">
		<tr>
			<td colspan="3" style="padding: 8px 0px;">DECLARATION BY APPLICANT(S) (投资者声明):</td>
		</tr>
		<tr>
			<td colspan="3">I/WE THE UNDERSIGNED HEREBY AFFIRM THAT ON MY OWN BEHALF, FREE WILL,
				CHOICE AND INITIATE
				HAVE ENQUIRED ABOUT THEFUND AND REQUESTED THE FUND’S DISTRIBUTOR / SALES AGENT
				OF THE FUND TO BRIEF
				AND/OR PROVIDE INFORMATION ABOUT THE FUND TO OURSELVES. THE INFORMATION
				PRESENTED, RECEIVED, AND LEARNED
				FROM THE DISTRIBUTOR / SALES AGENT SHALL BETREATED AS STRICTLY PRIVATE AND
				CONFIDENTIAL AND FOR OUR OWN
				CONSUMPTION AND REFERENCE
				ONLY.(本人/我们,以下署名者,特此声明本人乃是代表本身,并在自己的选择下,出于自愿和自发的精神对本基金提出查询,并要求本基金或其代理人为本人/我们扼要讲解和/或提供本基金的相关信息。对于基金或其代理人向本人/我们呈现的信息,本人/我们将严加保密,仅供本身参考
				和使用。)</td>
		</tr>
	</table>



	<div class="new-page"></div>


	<table width="100%" class="table page-5 font-18 l-s">
		<tr>
			<td colspan="3" style="padding: 15px 0px;">
				I/WE FULLY UNDERSTAND THAT THE FUND IS STRICTLY NOT INTENDED TO BE MARKETED OR
				OFFERED IN MALAYSIA OR
				MADE
				AVAILABLE TO ANY MALAYSIANS IN MALAYSIA EXCEPT LABUAN. THE RELEVANT MALAYSIAN
				AUTHORITIES INCLUDING THE
				SECURITIES
				COMMISSION MALAYSIA AND LABUAN FINANCIAL SERVICES AUTHORITY ARE NOT LIABLE FOR
				ANY NONDISCLOSURE OR
				MISLEADING
				STATEMENT ON THE PART OF THE FUND AND TAKE NO RESPONSIBILITY ON THE CONTENTS OF
				THE SUPPLEMENTARY
				INFORMATION
				MEMORANDUM OF THE FUND. THESE AUTHORITIES ALSO TAKE NO REPRESENTATIONS ON THE
				ACCURACY AND COMPLETENESS
				OF THE
				SUPPLEMENTARY INFORMATION MEMORANDUM OF THE FUND AND SHALL NOT BE CLAIMED ON ANY
				LIABILITY WHATSOEVER
				ARISING
				FROM, OR IN RELIANCE UPON, THE WHOLE OR ANY PART OF THE CONTENT OF THE
				SUPPLEMENTARY INFORMATION
				MEMORANDUM OF
				THE FUND. (本人/我们明白, 除了在纳闽,本基金不拟在马来西亚境内销售, 或在马来西亚境内提供应给任何马来西亚人。马来西亚证券委

				员会和纳闽金融服务管理局等相关马来西亚当局不对本基金可能产生的信息遗漏或误导性陈述负责,也不对基金补充信息备忘录呈现的内容
				负责。此外,上述有关当局概不对基金补充信息备忘录的准确性和完整性作出任何陈述,也不应被要求对基金补充信息备忘录的全部或任何
				部分内容所招致或引起的任何情况承担任何责任。)</td>
		</tr>
		<tr>
			<td colspan="3" style="padding: 15px 0px;">
				I/WE CONFIRM THAT I/WE AM/ARE A SOPHISTICATED INVESTOR BY ALL DEFINITIONS OF
				THAT CLASSIFICATION KNOWN
				TO ME; I/WE
				AM/ARE A SAVVY INVESTOR, I/WE MAKE MY/OUR OWN INVESTMENT DECISIONS AND HAVE
				LEGALLY ACQUIRED ASSETS
				AVAILABLE. (凭
				着本人/我们对各类型投资者的定义的了解,本人/我们确认本身为一名成熟的投资者,也是一名精明的投资者。本人/我们有能力自行作投资
				决定,并拥有通过合法途径获得的资产。)
			</td>
		</tr>
		<tr>
			<td colspan="3" style="padding: 15px 0px;">
				I/WE FURTHER CONFIRM THAT I/WE HAVE REQUESTED INFORMATION FROM THE DISTRIBUTOR /
				SALES AGENT AND THE
				DISTRIBUTOR /
				SALES AGENT HAVE NEITHER SOLICITS OFFERS NOR MARKETS THE FUND TO ME/US DIRECTLY
				OR INDIRECTLY. THE
				INFORMATION
				PROVIDED BY THE DISTRIBUTOR / SALES AGENT IS MERELY INTENDED TO PROVIDE
				BACKGROUND AND SALIENT
				INFORMATION OF THE
				FUND ONLY. IT DOES NOT AMOUNT TO A RECOMMENDATION, OFFER OR INVITATION, EITHER
				EXPRESSLY OR IMPLICATION,
				TO MAKE AN
				INVESTMENT IN THE FUND. (本人/我们进一步确认,本人/我们已要求基金或其代理人提供信息,而基金或其代理人并无直接或间接向本人/
				我们提出献购或销售本基金。基金或其代理人所提供的信息仅为说明该基金的背景和重点,不可等同为对本基金作出明示或暗示性投资建议、
				献议或邀约。)
			</td>
		</tr>
		<tr>
			<td colspan="3" style="padding: 15px 0px;">
				I/WE UNDERSTAND THAT I/WE SHOULD RELY ON MY/OUR OWN EVALUATION TO ASSESS THE
				MERITS AND RISKS OF THE
				INVESTMENT. IN
				CONSIDERING THE INVESTMENT, IF IN DOUBT AS TO THE ACTION TO BE TAKEN, I/WE SHALL
				CONSULT A QUALIFIED
				ADVISER
				IMMEDIATELY. I/WE CONFIRM THAT THE DISTRIBUTOR / SALES AGENT IS SHARING
				INFORMATION ABOUT THE FUND WITH
				ME/US ON A
				REVERSE ENQUIRY BASIS INITIATED BY ME/US. I/WE AGREE THAT ALL EMAILS AND
				FACSIMILE TRANSMITTED DOCUMENTS
				SHALL BE
				TREATED AS ORIGINAL DOCUMENTS. (本人/我们明白本人应凭个人的判断力来评估投资的优势与风险。在考虑投资时,若对本身即将采取
				的行动有所疑虑,本人/我们将即刻咨询合格的投资顾问。本人/我们确认,基金或其代理人乃是基于本人/我们发出投资询问而展开反向查询,
				再与我/我们分享本基金的信息。本人/我们同意,所有电子邮件和通过传真发送的文件将被视为原件处理。)
			</td>
		</tr>
		<tr>
			<td colspan="3" style="padding: 15px 0px;">
				I/WE THE UNDERSIGNED HAVE READ AND FULLY UNDERSTAND ALL THE NOTES AND THE TERMS
				AND CONDITIONS STATED IN
				THIS
				FORM AND I/WE WISH TO INVEST IN THE ABOVE-MENTIONED PREFERENCE SHARES AND AGREE
				TO BE BOUND BY THE
				AFOREMENTIONED NOTES, TERMS AND CONDITIONS. I/WE AM/ARE ALSO AWARE OF THE FEES
				AND CHARGES DIRECTLY AND
				INDIRECTLY INCURRED WHEN INVESTING. I/WE HEREBY DECLARE THAT I/WE AM/ARE THE
				BENEFICIAL OWNER(S) OF THIS
				INVESTMENT
				AND THIS APPLICATION IS NOT FUNDED BY GAINS FROM ANY UNLAWFUL ACTIVITIES AND
				THAT THE SOURCE OF MY / OUR
				FUNDS ARE
				FULLY COMPLIANT WITH THE ANTI-MONEY LAUNDERING AND ANTI TERRORISM LAWS OF
				MALAYSIA. (本人/我们已阅读并充分理解本申请
				书的附加说明、条款和条件。本人/我们有意投资上述优先股,并同意遵守前述附加说明、条款和条件的规定。本人/我们也知悉投资每项/任
				何基金时必须承担直接和间接的费用与收费。本人/我们特此声明,本人/我们为本投资的受益拥有人,同时声明即将投入的资金非来自任何非
				法活动的收益。本人/我们的资金来源完全符合马来西亚的反洗钱和反恐法律。)
			</td>
		</tr>
		<tr>
			<td colspan="3" style="padding: 15px 0px;">
				I/WE ALSO ARE WELL AWARE OF AND FULLY AGREE TO BEAR AND TO TAKE ON FOR OURSELVES
				ONLY ALL THE INVESTMENT
				RISKS AS
				OUTLINED IN THE FUND’S SUPPLEMENTARY INFORMATION MEMORANDUM AND TO ACCEPT THIS
				INVESTMENT AS A VENTURE
				ON MY
				/OUR PART WITH AN UNCONDITIONAL ACCEPTANCE OF ANY RETURNS OR LOSSES AS THE CASE
				MAY BE WITHOUT ANY
				RECOURSE TO
				THE FUND, THE FUND MANAGERS OR THE BOARD OF DIRECTORS. I/WE HAVE TAKEN THE
				ADVICE HIGHLIGHTED IN THE
				FUND’S
				SUPPLEMENTARY INFORMATION MEMORANDUM AND HAVING READ AND FULLY UNDERSTOOD ALL
				THE CONTENTS HAVE
				MYSELF/OURSELVES CONSULTED WITH INDEPENDENT AND COMPETENT INVESTMENT AND
				FINANCIAL ADVISERS BEFORE
				DECIDING TO
				MAKE AN INVESTMENT IN THE FUND. (本人/我们亦清楚并完全同意只承受及承担基金补充信息备忘录所列的所有投资风险,并接受本项投
				资为本人/我们的一项风险投资,并无条件接受任何回报或损失(视情况而定),而无需向基金,基金经理或董事会追索。本人/我们已采纳基
				金补充信息备忘录中强调的建议,并已阅读并充分理解所有内容,在决定投资基金之前,本人/我们已与独立且有能力的投资和财务顾问协商。)
			</td>
		</tr>
	</table>
	<table width="100%" class="fo-rm page-5 font-18 l-s">
		<tr>
			<td><b><u></u></b></td>
			<td><b><u></u></b></td>
		</tr>
		<tr>
			<td>----------------------------------<br>Principal Applicant (申请者)</td>
			<td>-------------------------------------------------------------<br>Joint Applicant
				(if applicable) (联合申请者
				(如果适用)</td>
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
			<td>Date(日期):</td>
			<td>Date(日期):</td>
		</tr>
	</table>


	<!-- page 6 -->
	<div class="new-page"></div>

	<div class="pos-rel">
	<p class="watermark">Not applicable</p>

		<h3 style="font-size: 13px;">(B) CORPORATE INVESTOR (企业投资者)</h3>
		<h4 style="font-size: 12px;"> Name and Particulars of Corporation(申请公司名称和资料)</h4>
		<table width="100%" class="page6" border="1px">
			<tr>
				<td class="cl-35">Name (as per Certificate of
					Incorporation)<br />名称(如同法人实体的成立登记证)</td>
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
				<td class="cl-35">Date of Incorporation (公司成立日期)-<br />DD/MM/YYYY</td>
				<td></td>
			</tr>
			<tr>
				<td class="cl-35">Principal Business Activity (主要业务活动)</td>
				<td></td>
			</tr>
		</table>

		<h3 style="font-size: 12px;">Type of Company -公司类型 (√)</h3>
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


		<h3 style="font-size: 12px;">Redemption / Repurchase Instruction Only -仅限赎回或回购指示 (√)</h3>
		<table width="100%" class="page6" border="1px">
			<tr>
				<td></td>
				<td class="cl-40">One To Sign (其中一人签字)</td>
				<td></td>
				<td class="cl-40">Both To Sign (两人签字)</td>
			</tr>
		</table>

		<h3 style="font-size: 12px;">Payment Instruction for Dividend Payouts -(红利支付指示)</h3>
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

		<h3 style="font-size: 12px;">Investment Details -(投资信息)</h3>
		<table width="100%" class="page6" border="1px">

			<tr>
				<td class="cl-35">Amount(USD)金额(美元):</td>
				<td>
					<table class="">
						<tr>
							<td><input type="checkbox" /> Initial Investment<br />(首次投资)</td>
							<td><input type="checkbox" /> Additional Investment<br />(附加投资)</td>
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


	</div>


	<!-- page 7 -->
	<div class="new-page"></div>
    
	
	<p>Any specific instructions (if any) kindly write in to the Company
		(任何具体说明(如有)请以书信通知公司)</p>
	<h7>DECLARATION BY APPLICANT(S) (投资者声明):</h7>

	<p>
		I/WE THE UNDERSIGNED HEREBY AFFIRM THAT ON MY OWN BEHALF, FREE WILL, CHOICE AND
		INITIATE HAVE ENQUIRED ABOUT
		THE FUND AND REQUESTED THE FUND’S DISTRIBUTOR / SALES AGENT OF THE FUND TO BRIEF
		AND/OR PROVIDE INFORMATION
		ABOUT THE FUND TO OURSELVES. THE INFORMATION PRESENTED, RECEIVED, AND LEARNED FROM
		THE DISTRIBUTOR / SALES
		AGENT SHALL BE TREATED AS STRICTLY PRIVATE AND CONFIDENTIAL AND FOR OUR OWN
		CONSUMPTION AND REFERENCE ONLY.
		(本人/我们,以下署名者, 特此声明本人乃是代表本身,并在自己的选择下,出于自愿和自发的精神对本基金提出查询,并要求本基金或其代理人为本人/我们扼要讲解
		和/提供本基金的相关信息。对于基金或其代理人向本人/我们呈现的信息,本人/我们将严加保密,仅供本身参考和使用。)
	</p>
	<div class="pos-rel">
		<p class="watermark">Not applicable</p>
		<p>
			I/WE FULLY UNDERSTAND THAT THE FUND IS STRICTLY NOT INTENDED TO BE MARKETED OR
			OFFERED IN MALAYSIA OR MADE
			AVAILABLE TO ANY MALAYSIANS IN MALAYSIA EXCEPT LABUAN. THE RELEVANT MALAYSIAN
			AUTHORITIES INCLUDING THE
			SECURITIES COMMISSION MALAYSIA AND LABUAN FINANCIAL SERVICES AUTHORITY ARE NOT
			LIABLE FOR ANY NONDISCLOSURE
			OR MISLEADING STATEMENT ON THE PART OF THE FUND AND TAKE NO RESPONSIBILITY ON THE
			CONTENTS OF THE
			SUPPLEMENTARY INFORMATION MEMORANDUM OF THE FUND. THESE AUTHORITIES ALSO TAKE NO
			REPRESENTATIONS ON THE
			ACCURACY AND COMPLETENESS OF THE SUPPLEMENTARY INFORMATION MEMORANDUM OF THE FUND
			AND SHALL NOT BE CLAIMED
			ON ANY LIABILITY WHATSOEVER ARISING FROM, OR IN RELIANCE UPON, THE WHOLE OR ANY PART
			OF THE CONTENT OF THE
			SUPPLEMENTARY INFORMATION MEMORANDUM OF THE FUND. (本人/
			我们明白,除了在纳闽,本基金不拟在马来西亚境内销售,或在马来西亚境内提供应给任何马来西亚人。马来西亚证券委员会和纳闽金融服务管理局等相关马来西亚当局不对本基金可能产生的信息遗漏或误导性陈述负责,也不对基金补充信息备忘录呈现的内容负责。此外,上述有关当局概不对基金补充信息备忘录的准确性和完整性作出任何陈述,也不应被要求对基金补充信息备忘录的全部或任何部分内容所招致或引起的任何情况承担任何责任。)
		</p>

		<p>
			I/WE CONFIRM THAT I/WE AM/ARE A SOPHISTICATED INVESTOR BY ALL DEFINITIONS OF THAT
			CLASSIFICATION KNOWN TO
			ME; I/WE AM/ARE A SAVVY INVESTOR, I/WE MAKE MY/OUR OWN INVESTMENT DECISIONS AND HAVE
			LEGALLY ACQUIRED ASSETS
			AVAILABLE. (凭着本人/我们对各类型投资者的定义的了解,本人/我们确认本身为一名成熟的投资者,也是一名精明的投资者。本人/我们有能力自行作投资
			决定,并拥有通过合法途径获得的资产。)</p>

		<p>
			I/WE FURTHER CONFIRM THAT I/WE HAVE REQUESTED INFORMATION FROM THE DISTRIBUTOR /
			SALES AGENT AND THE
			DISTRIBUTOR / SALES AGENT HAVE NEITHER SOLICITS OFFERS NOR MARKETS THE FUND TO ME/US
			DIRECTLY OR INDIRECTLY.
			THE INFORMATION PROVIDED BY THE DISTRIBUTOR / SALES AGENT IS MERELY INTENDED TO
			PROVIDE BACKGROUND AND
			SALIENT INFORMATION OF THE FUND ONLY. IT DOES NOT AMOUNT TO A RECOMMENDATION, OFFER
			OR INVITATION, EITHER
			EXPRESSLY OR IMPLICATION, TO MAKE AN INVESTMENT IN THE FUND. \
			(本人/我们进一步确认,本人/我们已要求基金或其代理人提供信息,而基金或其代理人并无直接或间接向本人/我们提出献购或销售本基金。基金或其代理人所提供的信息仅为说明该基金的背景和重点,不可等同为对本基金作出明示或暗示性投资建议、献议或邀约。)
		</p>

		<p>
			I/WE UNDERSTAND THAT I/WE SHOULD RELY ON MY/OUR OWN EVALUATION TO ASSESS THE MERITS
			AND RISKS OF THE
			INVESTMENT. IN CONSIDERING THE INVESTMENT, IF IN DOUBT AS TO THE ACTION TO BE TAKEN,
			I//WE SHALL CONSULT A
			QUALIFIED ADVISER IMMEDIATELY. I/WE CONFIRM THAT THE DISTRIBUTOR / SALES AGENT IS
			SHARING INFORMATION ABOUT
			THE FUND WITH ME/US ON A REVERSE ENQUIRY BASIS INITIATED BY ME/US. I/WE AGREE THAT
			ALL EMAILS AND FACSIMILE
			TRANSMITTED DOCUMENTS SHALL BE TREATED AS ORIGINAL DOCUMENTS.
			(本人/我们明白本人应凭个人的判断力来评估投资的优势与风险。在考虑投资时,若对本身即将采取
			的行动有所疑虑,本人/我们将即刻咨询合格的投资顾问。本人/我们确认,基金或其代理人乃是基于本人/我们发出投资询问而展开反向查询,
			再与我/我们分享本基金的信息。本人/我们同意,所有电子邮件和通过传真发送的文件将被视为原件处理。)</p>

		<p>
			I/WE THE UNDERSIGNED HAVE READ AND FULLY UNDERSTAND ALL THE NOTES AND THE TERMS AND
			CONDITIONS STATED IN THIS FORM AND I/WE WISH TO INVEST IN THE ABOVE-MENTIONED
			PREFERENCE SHARES AND AGREE TO
			BE BOUND BY THE AFOREMENTIONED NOTES, TERMS AND CONDITIONS. I/WE AM/ARE ALSO AWARE
			OF THE FEES AND CHARGES
			DIRECTLY AND INDIRECTLY INCURRED WHEN INVESTING. I/WE HEREBY DECLARE THAT I/WE
			AM/ARE THE BENEFICIAL
			OWNER(S) OF THIS INVESTMENT AND THIS APPLICATION IS NOT FUNDED BY GAINS FROM ANY
			UNLAWFUL ACTIVITIES AND
			THAT THE SOURCE OF MY / OUR FUNDS ARE FULLY COMPLIANT WITH THE ANTI-MONEY LAUNDERING
			AND ANTI TERRORISM LAWS
			OF MALAYSIA.
			(本人/我们已阅读并充分理解本申请书的附加说明、条款和条件。本人/我们有意投资上述优先股,并同意遵守前述附加说明、条款和条件的规定。本人/我们也知悉投资每项/任何基金时必须承担直接和间接的费用与收费。本人/我们特此声明,本人/我们为本投资的受益拥有人,同时声明即将投入的资金非来自任何非法活动的收益。本人/我们的资金来源完全符合马来西亚的反洗钱和反恐法律。)
		</p>

		<p>
			I/WE ALSO ARE WELL AWARE OF AND FULLY AGREE TO BEAR AND TO TAKE ON FOR OURSELVES
			ONLY ALL THE INVESTMENT
			RISKS AS OUTLINED IN THE FUND’S SUPPLEMENTARY INFORMATION MEMORANDUM AND TO ACCEPT
			THIS INVESTMENT AS A
			VENTURE ON MY /OUR PART WITH AN UNCONDITIONAL ACCEPTANCE OF ANY RETURNS OR LOSSES AS
			THE CASE MAY BE WITHOUT
			ANY RECOURSE TO THE FUND, THE FUND MANAGERS OR THE BOARD OF DIRECTORS. I/WE HAVE
			TAKEN THE ADVICE
			HIGHLIGHTED IN THE FUND’S SUPPLEMENTARY INFORMATION MEMORANDUM AND HAVING READ AND
			FULLY UNDERSTOOD ALL THE
			CONTENTS HAVE MYSELF/OURSELVES CONSULTED WITH INDEPENDENT AND COMPETENT INVESTMENT
			AND FINANCIAL ADVISERS
			BEFORE DECIDING TO MAKE AN INVESTMENT IN THE FUND.
			(本人/我们亦清楚并完全同意只承受及承担基金补充信息备忘录所列的所有投资风险,并接受本项投资为本人/我们的一项风险投资,并无条件接受任何回报或损失(视情况而定),而无需向基金,基金经理或董事会追索。本人/我们已采纳基金补充信息备忘录中强调的建议,并已阅读并充分理解所有内容,在决定投资基金之前,本人/我们已与独立且有能力的投资和财务顾问协商。
		</p>


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

	<div class="new-page"></div>

	<h1 class="t-c font-22">MCIL Intl Series 3 Ltd. (Company No. LL17325) <br>
		<p class="t-c font-16">(A private fund company incorporated in the Federal Territory of
			Labuan, Malaysia)</p>
	</h1>

	<hr class="double">
	<hr class="double">
	<p class="t-c font-20" style="border-bottom: 2px solid #000;font-weight: 700;">DECLARATION
		ON SOURCE OF FUNDS
		(关于资金来源的宣言) </p>

	<p class="font-13">I/we understand that I/we am/are required to declare the source of the
		funds that I/we will be
		depositing into the account/s including future deposits whether in cash, cheque, EFT,
		RTGS, SWIFT or any other
		method. Accordingly, I/we wish to declare as follows: (本人/我们理解,
		本人/我们需要申报本人/我们将存入账户的资金来源,包括未来存款,无论是现金,支票,电子转帐(EFT),实时结算(RTGS),SWIFT或是任何其他方式。
		因此,本人/我们希望申报如下:)</p>

	<br>

	<p class="font-18" style="width: 100%;">That, I/We (本人/我们) <span class="underline_text"><?= $subscription->has('individual') ? $subscription->individual->salutation : '' ?> <?= $subscription->user->first_name; ?> </span></p>
    <p class="font-18">(Name/s of account holder/holders) (账户持有人的名称) of (在于)</p>
    <p class="font-18" style="border-bottom: 1px solid #000;width: 100%;margin-bottom: 10px;">
        <?= $subscription->user->address_line1 ?>,
                    <?= !empty($subscription->user->address_line_2) ? $subscription->user->address_line_2 . "," : '' ?>    
                    <?= $subscription->user->city ?>, 
                    <?= $subscription->user->post_code ?>,  
                    <?= $subscription->has('user') ? $subscription->user->stateAs->name : '' ?>, 
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

	<p class="font-13">I/we further confirm that these funds are derived from legitimate sources
		as stated above; and
		I/we will also provide the required evidence of the source of funds if required to do so
		in future. (本人/我们
		进一步确认, 上述资金来自合法的来源;如果今后需要, 本人/我们还将提供所需的资金来源证据。)</p>
	<p class="font-13" style="margin-top: 15px;margin-bottom: 40px">I/we declare the foregoing
		details to be true.
		(本人/我们也在此声明上述细节属实。)</p>

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

	<!-- new page -->
	<div class="new-page"></div>
	<div class="my-2 mpage-5 f-w-7 font-20 text-center">
		Redemption Notice
	</div>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-35 f-w-4"> Investor Name: </td>
			<td align="left">
				__________________________
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-4">Address: </td>
			<td align="left">
				__________________________
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-4">Email:</td>
			<td align="left">
				__________________________
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-4">Contact Number: </td>
			<td align="left">
				__________________________
			</td>
		</tr>
	</table>
	<hr>
	<table class="table" width="100%">
		<tr>
			<td colspan="3">I/We here by wish to redeem the following preference shares held by me/us
				in MCIL International Lts as Specified below:
			</td>
		</tr>
	</table>
	<table class="table mpage4" width="100%">
		<tr>
			<td><strong>Investor Name</strong></td>
			<td><strong>Reference</strong></td>
			<td><strong>Share Unit(Qty)</strong></td>
			<td><strong>Unit Price(USD)</strong></td>
			<td><strong>Total in value(USD)</strong></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 f-w-6 l-s">
		<tr>
			<td colspan="3"> Redemption Bank Account Details
			</td>
		</tr>
	</table>
	<table width="100%" class="table mpage-5 font-20 l-s">
		<tr>
			<td colspan="3"> The Redemption amount will be paid to the following bank account unless otherwise
				notified by me/us.
			</td>
		</tr>
	</table>
	<table class="mpage7" width="100%">
		<tr>
			<td class="cl-35 f-w-4"> Name of Payee: </td>
			<td align="left">
				__________________________
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-4">Name of Bank: </td>
			<td align="left">
				__________________________
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-4">Account No:</td>
			<td align="left">
				__________________________
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-4">Branch Code: </td>
			<td align="left">
				__________________________
			</td>
		</tr>
		<tr>
			<td class="cl-35 f-w-4">Account Type: </td>
			<td align="left">
				<input type="checkbox">
				<label for="vehicle1"> Current</label>
				<input type="checkbox">
				<label for="vehicle1"> Savings</label>
			</td>
		</tr>
	</table>
	<div style="padding-top: 50px;">__________________________</div>
	<div>
		<p>Authorial Signatory:</p>
		<p> Name:</p>
		<p> Date:</p>
	</div>
	<table width="100%" class="table mpage-5 font-12 l-s" style="font-style: italic;">
		<tr>
			<td colspan="3">
				Reminder.
			</td>
		</tr>
		<tr>
			<td colspan="3">
				a) Premature redemption (before the maturity date) is subject to a penalty charge up to 15% of the
                total Redeemable Preference Shares.
			</td>
		</tr>
		<tr>
			<td colspan="3">
				b) The Redemption form must be submitted to the Manager atleast 4 Sbusiness days before the maturity day.
			</td>
		</tr>
	</table>
</body>

</html>