<div class="outer-cont">
<table id="example" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>SALUTATION</th>
            <th>NAME (PLUS) JOINT APPLICANT</th>
            {{-- <th>INVESTMENT TYPE</th> --}}
            <th>PRINCIPAL INVESTMENT (USD)</th>
            <th>INVESTMENT ID</th>
            <th>COMMENCEMENT DATE</th>
            <th>HEDGE (USD)</th>
            <th>HOME ADDRESS</th>
            <th>BANKING ADDRESS</th>
            <th>GENDER</th>
            <th>REMARKS</th>
        </tr>
    </thead>
    <tbody>
    @if ($subscriptions->count() > 0)

        @php
            $col2 = 1;
            $row2 = 2;
            $i =1;
            $invest_total = 0;
        @endphp

        @foreach ($subscriptions as $key => $subscription)

            <?php 
                $user_id = $subscription->user_id;
                if(!empty($user_id)){

                    $user = \App\Models\User::with('countryAs','stateAs','mobilePrefix','individual','company')->findOrFail($user_id);

                    if(!empty($user)){

                        if($user->role_id == 3){
                            $salutation = str_replace(".", "", $user->company->salutation);
                            $gender = ''; 
                        }else if($user->role_id == 2){
                            $salutation = str_replace(".", "", $user->individual->salutation);
                            $gender = $user->has('individual') ? $user->individual->gender : '';
                        }

                        if($subscription->is_first == 1){
                            $investment_type = "";
                        }else if($subscription->is_reinvestment == 1){
                            $investment_type = "RE INVESTMENT";
                        } else {
                            $investment_type = "TOP UP";
                        }

                        if ($subscription->is_joint_applicant) {
                            $joint_applicant_name = " + " . $subscription->ja_name;
                        } else {
                            $joint_applicant_name = "";
                        }

                        $name = $user->first_name.$user->last_name.$joint_applicant_name;
                        $home_address =  $user->address_line1." ".$user->address_line2." ".$user->city." ".$user->post_code." ".$user->stateAs->name." ".$user->countryAs->name;
                    }
                } else{
                    $salutation = "";
                    $name = "";
                    $gender = '';
                    $home_address = "";
                }

                if(!empty($subscription->commence_date)){
                    $commence_date = date('Y-M-d', strtotime($subscription->commence_date));
                }else{
                    $commence_date = "-";
                }

                if ($subscription->Payments->count() > 0) {
                    $divident_percentage = 0;
                    $divident_amount = 0;
                    $total_divident_amount = 0;

                    foreach ($subscription->Payments as $key => $payment) {
                       $total_divident_amount += $payment['amount'];
                    }

                } else {
                    $divident_percentage = 0;
                    $divident_amount = 0;
                    $total_divident_amount = 0;
                }

                if(!empty($subscription->remittance_bank)){
                    $bank_name = $subscription->remittance_bank;
                } else {
                    $bank_name = "";
                }

                if(!empty($subscription->payee_name)){
                    $account_name = $subscription->payee_name;
                } else {
                    $account_name = "";
                }

                if(!empty($subscription->account_number)){
                    $account_number = $subscription->account_number;
                } else {
                    $account_number = "";
                }

                if(!empty($subscription->swift_code)){
                    $swift_code = $subscription->swift_code;
                } else {
                    $swift_code = "";
                }

                if(!empty($subscription->reinvestment_parant_id)){
                    $reinvestment_parant_id = $subscription->reinvestment_parant_id;

                    $old_subscription = \App\Models\Subscription::findOrFail($reinvestment_parant_id);

                    if(!empty($old_subscription['draft_refrence_id'])){
                        if(($old_subscription['status'] == 3) || ($old_subscription['status'] == 6)){
                            $original_investment_no = $old_subscription['reference_no'].$old_subscription['refreance_id'];
                        }else{
                            $original_investment_no = $old_subscription['draft_refrence_id']."-".$old_subscription['reference_no'].$old_subscription['refreance_id'];
                        }
                    }else{
                        $original_investment_no = $old_subscription['reference_no'].$old_subscription['refreance_id'];
                    }

                } else {
                    $original_investment_no = "";
                }

                if(!empty($subscription['draft_refrence_id'])){
                    if(($subscription['status'] == 3) || ($subscription['status'] == 6)){
                        $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
                    }else{
                        $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
                    }
                }else{
                    $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
                }

                $banking_address = $subscription->address_line_1." ".$subscription->address_line_2." ".$subscription->city." ".$subscription->postcode." ".$subscription->SubscriptionState->name." ".$subscription->SubscriptionCountry->name;
            ?>
        <tr>
            <?php $payment_count = $subscription->Payments->count(); ?>

            <td class="text-muted">{{ $i }}</td>
            <td class="text-muted">{{ $salutation }}</td>
            <td class="text-muted">{{ $name }}</td>
            <td class="text-muted">{{ $subscription['initial_investment'] }}</td>
            <td class="text-muted">{{ $investment_no }}</td>
            <td class="text-muted">{{ $commence_date }}</td>
            <td class="text-muted"></td>
            <td class="text-muted">{{ $home_address }}</td>
            <td class="text-muted">{{ $banking_address }}</td>
            <td class="text-muted">{{ $gender }}</td>
            <td class="text-muted"></td>
           
            <?php $i++; ?>

        </tr>

        @endforeach
    @else
      <tr><td colspan=13 align="center">No Records Available..</td></tr>
    @endif     
    </tbody>
</table>
</div>
<br>
{{-- {!! $subscriptions->links('pagination::bootstrap-4') !!} --}}
{!! $subscriptions->appends($_GET)->links('pagination::bootstrap-4') !!}
