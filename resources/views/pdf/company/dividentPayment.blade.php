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
                    <h1><strong>

                    @if (@$dividend['fundId'] == 1)
                        MCIL INTERNATIONAL LIMITED (Company No. LL14041)
                    @elseif(@$dividend['fundId'] == 2)
                        MCIL INTL SERIES 2 LTD (Company No. LL17226)
                    @elseif(@$dividend['fundId'] == 3)
                        MCIL INTL SERIES 3 LTD (Company No. LL17539)
                    @else
                        MCIL INTERNATIONAL LIMITED (Company No. LL14041)
                    @endif

                    </strong></h1>
                    <h4><u>(A private fund company incorporated in the Federal Territory of Labuan, Malaysia)</u></h4>
                    <h4>Labuan office: Unit 3A-2, Level 3A, Labuan Times Square,</h4>
                    <h4> Jalan Merdeka, 87000 W.P, Labuan, Malaysia.</h4>
                    <h4><strong>Email: </strong><a href="mailto:admin@mcilintl.com"><strong>admin@mcilintl.com </strong>/</a><a href="mailto:support@miracfinancial.com "><strong>support@miracfinancial.com </strong></a></h4>
                </td>
            </tr>
        </table>
        <img src="data:image/png;base64, {{ base64_encode(@file_get_contents(public_path('img/media/hr.png'))) }}" width="100%" height="15px">
        
        <table width="100%">
            <tr><td><h4>DATE</h4></td>
                <td colspan="3"><?php echo date('d-F-Y H:i:s'); ?></td>
            </tr>
            <tr><td colspan="4"></td><br></tr>
            <tr>
                <td><h4>NAME</h4></td> 
                <td colspan="2"><h4><?= $user->last_name ?></h4></td>
            </tr>
            
        </table>

        <br>
        <h4><u><strong>Declaration of Dividend Distribution for 
            @if (@$dividend['fundId'] == 1)
                MCIL International Limited
            @elseif(@$dividend['fundId'] == 2)
                MCIL Intl Series 2 Ltd
            @elseif(@$dividend['fundId'] == 3)
                MCIL Intl Series 3 Ltd
            @else
                MCIL International Limited
            @endif
        (“the Fund”)</strong></u></h4>

        <br>
        <p>Greetings from 
            @if (@$dividend['fundId'] == 1)
                MCIL International Limited!
            @elseif(@$dividend['fundId'] == 2)
                MCIL Intl Series 2 Ltd!
            @elseif(@$dividend['fundId'] == 3)
                MCIL Intl Series 3 Ltd!
            @else
                MCIL International Limited!
            @endif</p>

        <p>Thank you for investing in 
            @if (@$dividend['fundId'] == 1)
                MCIL International Limited
            @elseif(@$dividend['fundId'] == 2)
                MCIL Intl Series 2 Ltd
            @elseif(@$dividend['fundId'] == 3)
                MCIL Intl Series 3 Ltd
            @else
                MCIL International Limited
            @endif 
        (“the Fund”). We are pleased to announce the Fund’s dividend distribution declaration as follows:</p>
        
        <br>
        <table width="100%" class="dividentdetails" cellspacing="0" cellpadding="0">
            <tbody>     
                <tr>
                    <td width="60%"><p><strong>Payment Date (Before)</strong></p></td>
                    <td width="60%"><p><strong>Investment ID</strong></p></td>

                    {{-- <td width="40%"><p><strong>Investment Status</strong></p></td> --}}

                    <td width="60%"><p><strong>Period</strong></p></td>
                    <td width="40%"><p><strong>Principal (USD)</strong></p></td>

                    {{-- <td width="40%"><p><strong>Year</strong></p></td> --}}

                    @if ($dividend['global_payout_type'] == "Dividend")
                        <td width="60%"><p><strong>Dividend (%)</strong></p></td>
                    @endif
                    <td width="60%"><p><strong>Quarter Dividend Payout(USD)</strong></p></td>
                </tr>

                <?php $total_dividend_earned = 0; ?>   
                @for ($i = 0; $i < count($dividend['subscription']); $i++)
                <tr>
                    <td>
                        @if ($dividend['payout_type'][$i] == "Dividend")
                            {{-- <p> 15 <sup>th </sup><?= $dividend['dividend_quarter_date'][$i]; ?></p> --}}
                            <p>
                                <?php 
                                    $payoutDate=strtotime($dividend['payout_date'][$i]);
                                    echo date('d F, Y', $payoutDate); 
                                ?>
                            </p>
                        @else
                            {{-- <p><?= $dividend['dividend_quarter_date'][$i]; ?></p> --}}
                            <p>
                                <?php 
                                    $payoutDate=strtotime($dividend['payout_date'][$i]);
                                    echo date('d F, Y', $payoutDate); 
                                ?>
                            </p>
                        @endif
                    </td>
                    <td><p>{{ $dividend['investment_id'][$i] }}</p></td>

                    {{-- <td><p>{{ $dividend['status'][$i] }}</p></td> --}}

                    <td><p>{{ $dividend['dividend_quater_dates'] }}</p></td>
                    <td><p>{{ number_format($dividend['principal_amount'][$i]) }}</p></td>

                    {{-- <td><p>{{ $dividend['dividend_year'][$i] }}</p></td> --}}

                    @if ($dividend['payout_type'][$i] == "Dividend")
                        <td>
                            <p>{{ number_format($dividend['dividend_percentage'][$i], 2, '.', ',');  }}%</p>
                        </td>
                    @endif

                    <td><p>{{ number_format($dividend['dividend_earned_amount'][$i], 2, '.', ','); }}</p></td> 
                        
                    <?php $total_dividend_earned += $dividend['dividend_earned_amount'][$i]; ?>
                </tr>
                @endfor

                <tr>
                    <td></td>  
                    <td></td>  
                    <td></td>
                    @if ($dividend['global_payout_type'] == "Dividend")
                        <td></td>
                    @endif 
                    <td><p><strong>Total</strong></p></td>
                    <td><p><strong>{{ number_format($total_dividend_earned, 2, '.', ','); }}</strong></p></td>
                     
                </tr>

            </tbody>
        </table>

        <br>
        <p>Please contact our customer care at <a href="mailto:admin@mcilintl.com"><strong>admin@mcilintl.com </strong>/</a><a href="mailto:support@miracfinancial.com "><strong>support@miracfinancial.com </strong></a>,  if you have any queries or require further clarification on this matter.</p>

        <br>
        <p>Thank you for investing with us.</p>
        
        <br>

        <p><strong>MCIL Team</strong></p>

        <br>
        <br>

        <p  align="center">This is a computer-generated receipt and no signature is required.
        Kindly contact us within <strong> 7 business days </strong> from the date of this receipt if there is any discrepancy.</p>

    </div>
</body>
</html>