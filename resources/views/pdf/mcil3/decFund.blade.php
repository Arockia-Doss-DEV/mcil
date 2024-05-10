<!DOCTYPE html>
<html>
<head>
	<title></title>
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
	.underline_textimg {
		border-bottom: solid 2px #000000;
		display: inline;
		padding-bottom: 3px;
		width: 30%
	}
</style>
<body>
	<h1 class="t-c font-22">MCIL INTL SERIES 3 LTD (Company No. LL17539)</h1>
	<p class="t-c font-16">(A private fund company incorporated in the Federal Territory of Labuan, Malaysia)</p>
	<hr class="double">
	<hr class="double">
	<p  class="t-c font-20" style="border-bottom: 2px solid #000;font-weight: 700;">DECLARATION ON SOURCE OF FUNDS (关于资金来源的宣言) </p>

	<p class="font-18">I/we understand that I/we am/are required to declare the source of the funds that I/we will be depositing into the account/s including future deposits whether in cash, cheque, EFT, RTGS, SWIFT or any other method. Accordingly, I/we wish to declare as follows: (本人/我们理解, 本人/我们需要申报本人/我们将存入账户的资金来源,包括未来存款,无论是现金,支票,电子转帐(EFT),实时结算(RTGS),SWIFT或是任何其他方式。 因此,本人/我们希望申报如下:)</p>

	<br>

    <p class="font-18" style="width: 100%;">That, I/We (本人/我们) <span class="underline_text">
        <?= $user->has('individual') ? $user->individual->salutation : '' ?> <?= $user->first_name ?> 
        <?= $user->last_name ?>  </span></p>
	<p class="font-18">(Name/s of account holder/holders) (账户持有人的名称) of (在于)</p>
	<p class="font-18" style="border-bottom: 1px solid #000;width: 100%;margin-bottom: 10px;">
		<?= $user->addr_line_1 ?> 
                    <?= $user->addr_line_2 ?>  
                    <?= $user->city ?> 
                    <?= $user->postcode ?>  
                    <?= $user->has('user_state') ? $user->user_state->name : '' ?> 
                    <?= $user->has('user_country') ? $user->user_country->name : '' ?> </p>
	<p class="font-18" style="border-bottom: 1px solid #000;width: 100%;margin-bottom: 10px;"> </p>
	<p class="font-18" style="border-bottom: 1px solid #000;width: 100%;margin-bottom: 10px;"> </p>
	<p class="font-18">(address-地址) do hereby declare that the source of the funds that: (在此声明资金来源:)-</p>
	<p class="font-18">The income depositing into my/our account is/are from the source of (tick as appropriate, can be more</p>
	<p class="font-18">than one):</p>
	<p class="font-18">(存入本人/我们账户的收入来自(根据需要勾选,可以多于一个)):</p>

		<?php
		$source_wealth = $user->has('individual') ? $user->individual->source_wealth : '-';

		switch ($source_wealth) {
		    case "Personal Saving / Salary":
		        echo '<p class="font-18">( &nbsp;&nbsp;√&nbsp;&nbsp;) &nbsp;&nbsp; Personal Saving / Salary (个人储蓄/工资)</p>
					<p class="font-18">( &nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp; Business Income (营业收入)</p>
					<p class="font-18">( &nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp; Dividends from other entry (来自其他投资项目的股息)</p>
					<p class="font-18">( &nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp; Benefits of transactions due to me all of which are known to me. (应付给我的交易收益而所有这些交易 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp; 都是我所知道)</p>
					<p class="font-18">( &nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp; Others (please provide details) (其他 (请提供详细信息))</p>';
		        break;
		    case "Business Income":
		        echo '<p class="font-18">( &nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp; Personal Saving / Salary (个人储蓄/工资)</p>
					<p class="font-18">(&nbsp;&nbsp;√&nbsp;&nbsp;) &nbsp;&nbsp; Business Income (营业收入)</p>
					<p class="font-18">( &nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp; Dividends from other entry (来自其他投资项目的股息)</p>
					<p class="font-18">( &nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp; Benefits of transactions due to me all of which are known to me. (应付给我的交易收益而所有这些交易 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;都是我所知道)</p>
					<p class="font-18">( &nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp; Others (please provide details) (其他 (请提供详细信息))</p>';
		        break;
		    case "Dividends from other entry":
		        echo '<p class="font-18">( &nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp; Personal Saving / Salary (个人储蓄/工资)</p>
					<p class="font-18">( &nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp; Business Income (营业收入)</p>
					<p class="font-18">( &nbsp;&nbsp;√&nbsp;&nbsp;) &nbsp;&nbsp; Dividends from other entry (来自其他投资项目的股息)</p>
					<p class="font-18">( &nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp; Benefits of transactions due to me all of which are known to me. (应付给我的交易收益而所有这些交易 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;都是我所知道)</p>
					<p class="font-18">( &nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp; Others (please provide details) (其他 (请提供详细信息))</p>';
		        break;
		    case "Benefits of transactions due to me all of which are known to me":
		        echo '<p class="font-18">( &nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp; Personal Saving / Salary (个人储蓄/工资)</p>
					<p class="font-18">( &nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp; Business Income (营业收入)</p>
					<p class="font-18">( &nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp; Dividends from other entry (来自其他投资项目的股息)</p>
					<p class="font-18">( &nbsp;&nbsp;√&nbsp;&nbsp;) &nbsp;&nbsp; Benefits of transactions due to me all of which are known to me. (应付给我的交易收益而所有这些交易 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;都是我所知道)</p>
					<p class="font-18">( &nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp; Others (please provide details) (其他 (请提供详细信息))</p>';
		        break;
		    case "Other":
		        echo '<p class="font-18">( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp; Personal Saving / Salary (个人储蓄/工资)</p>';
				echo '<p class="font-18">( &nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp; Business Income (营业收入)</p>';
				echo '<p class="font-18">( &nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp; Dividends from other entry (来自其他投资项目的股息)</p>';
				echo '<p class="font-18">( &nbsp;&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp; Benefits of transactions due to me all of which are known to me. (应付给我的交易收益而所有这些交易 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;都是我所知道)</p>';
				echo '<p class="font-18">( &nbsp;&nbsp;√&nbsp;&nbsp;) &nbsp;&nbsp; Others (please provide details) (其他 (请提供详细信息))</p>';
				echo '<p class="font-18">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				echo $user->has('individual') ? $user->individual->source_wealth_other : '';
				echo  '</p>';
		        break;
		    default:
		        echo "";
		}
	?>
	
	
	
	
	
	<p class="font-18">I/we further confirm that these funds are derived from legitimate sources as stated above; and I/we will also provide the required evidence of the source of funds if required to do so in future. (本人/我们 进一步确认, 上述资金来自合法的来源;如果今后需要, 本人/我们还将提供所需的资金来源证据。)</p>
	
	<p class="font-18" style="margin-top: 15px;margin-bottom: 40px">I/we declare the foregoing details to be true. (本人/我们也在此声明上述细节属实。)</p>
	
	
    <p class="font-18">Signature(签字) : <u>________________________________</u>  Name(姓名): <?= strtoupper($user->first_name); ?></p>

	<p class="font-18">Date(日期) : <?= date('d-m-Y'); ?></p>

</body>
</html>