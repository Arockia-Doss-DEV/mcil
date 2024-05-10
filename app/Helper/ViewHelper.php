<?php

use App\Models\McilFund;
use App\Models\Subscription;
use App\Models\Notification;

use App\Mail\NewInvestmentEmail;
use App\Mail\SendRegistrationMail;
use App\Mail\SendNewInvestment;
use App\Mail\SendApprovalMail;
use App\Mail\SendDeActive;
use App\Mail\SendPendingFunding;
use App\Mail\SendReject;
use App\Mail\SendAutoClosedNotice;
use App\Mail\SendActive;
use App\Mail\SendBankSlip;
use App\Mail\SendBankSlipConfirm;
use App\Mail\SendRedemptionNoticeAcceptForInvestor;
use App\Mail\SendRedemptionNoticeRejectForInvestor;
use App\Mail\SendReInvestmentSuccessNotice;
use App\Mail\SendBankDetailsUpdateMail;
use App\Mail\SendBeneficiaryDetailsUpdateMail;
use App\Mail\SendBankAcNoticeForAdmin;
use App\Mail\SendBankAcNoticeForInvestor;
use App\Mail\SendBeneficiaryNoticeForAdmin;
use App\Mail\SendBeneficiaryNoticeForInvestor;
use App\Mail\SendReinvestmentNoticeForAdmin;
use App\Mail\SendReinvestmentNoticeForInvestor;
use App\Mail\SendRedemptionNoticeForAdmin;
use App\Mail\SendRedemptionNoticeForInvestor;
use App\Mail\SendRedemptionNoticeToInvestor;
use App\Mail\SendRedemptionNotice;
use App\Mail\SendMailToUser;
use App\Mail\SendDividendPayoutNotice;
use App\Mail\SendDividendPaymentNotice;
use Carbon\Carbon;
use App\Models\User;
use App\Models\UserActivity;

if (!function_exists('getFunds')) {
	
	function getFunds()
	{
		$fundsGolbal = McilFund::where('active', 1)->get();
		return $fundsGolbal;
        //$fundsSetDefaultGobal = McilFund::where('setdefault', 1)->first();
	}
}

function getDefaultGlobalFund()
{
	$fundsGlobal = McilFund::where('setdefault', 1)->first();
	if (!empty($fundsGlobal)) {
		return $fundsSetDefaultGlobal = $fundsGlobal['id'];
	} else {
		return $fundsSetDefaultGlobal = "All";
	}
}

function subscriptionGlobal()
{
	$user_id = \Auth::user()->id;
	$subscriptionGlobal = Subscription::with('User')
							->where('user_id', $user_id)
							->where('notification_doc', 1)
							->where('status', 1)
							->where('draft', 0)
							->first();
							
	return $subscriptionGlobal;
}

function getInvestmentId($investmentData = null)
{
	// $fullName = "Lim Guan Thye";

	$name = '';
    foreach (explode(' ', $investmentData['username']) as $word)
        $name .= strtoupper($word[0]);

	$arr = explode(' ', trim($investmentData['username']));
	if(count($arr) >= 2) {

    	$word2 = substr($arr[1],0,2);
    	$word2 = strtoupper($word2);

    	$name = substr_replace($name,$word2,1);
	}

	if ($investmentData['fund_type'] == 1) {
		$fund = "ML";
	} else if($investmentData['fund_type'] == 2) {
		$fund = "ML2";
	} else if($investmentData['fund_type'] == 3) {
		$fund = "MS3";
	} else {
		$fund = "";
	}

	if (!empty($investmentData['commence_date'])) {
		
		$date=strtotime($investmentData['commence_date']);
		$month=date("m",$date);
		$year=date("y",$date); 

		$date = $year.$month;
	} else {

		$date = date('ym');
	}

	if ($investmentData['is_joint_applicant']) {
		// code...
		$jaName = $investmentData['subscription']['ja_name'];

		$ja_name = '';
		foreach (explode(' ', $jaName) as $word)
        	$ja_name .= strtoupper($word[0]);
	} else {
		$ja_name = '';
	}

	if ($investmentData['subscription']['is_reinvestment'] == 1) {
		$is_reinvestment = "R";
	} else {
		$is_reinvestment = "";
	}

    return $fund.$is_reinvestment.$name.$ja_name.$date;
}

function generateInvestementId($investmentData = null)
{
	$arr = explode(' ', trim($investmentData['username']));

	$username = "";
	foreach (explode(' ', $investmentData['username']) as $word)
        
	if (count($arr) == 2 ) {
		$username .= strtoupper($word[0]);

		$word2 = substr($arr[1],0,2);
    	$word2 = strtoupper($word2);

    	$username = substr_replace($username,$word2,1);
    } elseif (count($arr) == 3) {
    	$username .= strtoupper($word[0]);

    	$word2 = substr($arr[1],0,2);
    	$word2 = strtoupper($word2);

    	$username = substr_replace($username,$word2,1);

	} elseif (count($arr) == 4) {
		$username .= strtoupper($word[0]);
	} else {
		$username .= strtoupper($word[0]);
	}

	if ($investmentData['fund_type'] == 1) {
		$fund = "ML1";
	} else if($investmentData['fund_type'] == 2) {
		$fund = "ML2";
	} else if($investmentData['fund_type'] == 3) {
		$fund = "ML3";
	} else {
		$fund = "MLN";
	}

	if (!empty($investmentData['reinvestment_letter'])) {
		$letter = $investmentData['reinvestment_letter'];
	} else {
		$letter = "";
	}

	if ($investmentData['subscription']['is_reinvestment'] == 1) {
		$is_reinvestment = "R";
	} else {
		$is_reinvestment = "";
	}

	if ($investmentData['is_joint_applicant']) {
		$jaName = $investmentData['subscription']['ja_name'];

		$ja_name = '';
		foreach (explode(' ', $jaName) as $word)
        	$ja_name .= strtoupper($word[0]);
	} else {
		$ja_name = '';
	}

	if (!empty($investmentData['commence_date'])) {
		
		$date=strtotime($investmentData['commence_date']);
		$month=date("m",$date);
		$year=date("y",$date); 

		$date = $year.$month;
	} else {
		$date = date('ym');
	}

	return $fund.$letter.$is_reinvestment.$username.$ja_name.$date;
}

function getNotifications($current_link = null)
{	
	$user = \Auth::user();
	$base = url('/'); 
	$current_url = Request::url();
	$current_link = str_replace($base, '', $current_url);
	
	// $current_link = '/'.$current_link; 

	if ($user['role_id'] == 1) {
		
		$notificationGlobal2 = Notification::where('receiver_user_id', 1)
								->where('link', $current_link)
								->where('mark_as_seen', 0)
								->orderBy('id', 'DESC')
								->first();

		if(!empty($notificationGlobal2)){
	        $notificationGlobal2->mark_as_seen = 1;
	        $notificationGlobal2->save();
	    }

	    $notificationGlobal = Notification::where('receiver_user_id', 1)
								->where('mark_as_seen', 0)
								->orderBy('id', 'DESC')
								->get();

	} elseif($user['role_id'] == 2) {

		$notificationGlobal2 = Notification::where('receiver_user_id', $user->id)
								->where('link', $current_link)
								->where('mark_as_seen', 0)
								->orderBy('id', 'DESC')
								->first();

		if(!empty($notificationGlobal2)){
	        $notificationGlobal2->mark_as_seen = 1;
	        $notificationGlobal2->save();
	    }

	    $notificationGlobal = Notification::where('receiver_user_id', $user->id)
								->where('mark_as_seen', 0)
								->orderBy('id', 'DESC')
								->get();

	} elseif($user['role_id'] == 3) {

		$notificationGlobal2 = Notification::where('receiver_user_id', $user->id)
								->where('link', $current_link)
								->where('mark_as_seen', 0)
								->orderBy('id', 'DESC')
								->first();

		if(!empty($notificationGlobal2)){
	        $notificationGlobal2->mark_as_seen = 1;
	        $notificationGlobal2->save();
	    }

	    $notificationGlobal = Notification::where('receiver_user_id', $user->id)
								->where('mark_as_seen', 0)
								->orderBy('id', 'DESC')
								->get();
	} else {
		$notificationGlobal = [];
	}

	return $notificationGlobal;

}

function sendRegistrationMail($userData = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		$link = URL::to('/login');

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;
		$emailObj->link = $link;

		return \Mail::to($to_email)->send(new SendRegistrationMail($emailObj));
	}
}

function sendNewFundRegistrationMail($userData = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		$link = URL::to('/login');

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;
		$emailObj->link = $link;

		return \Mail::to($to_email)->send(new NewInvestmentEmail($emailObj));
	}
}

//admin mail
function sendNewInvestment($userData = null, $investment_id = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {
		
		$userId = $userData->id;

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$fromConfig = Setting::get('email_from_address');
		$fromNameConfig = Setting::get('email_from_name');

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;
		$emailObj->investment_id = $investment_id;

		return \Mail::to($fromConfig)->send(new SendNewInvestment($emailObj));
	}
}

//Email For Admin
function sendBankSlip($userData = null, $investment_id = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {
		
		$userId = $userData->id;

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$fromConfig = Setting::get('email_from_address');
		$fromNameConfig = Setting::get('email_from_name');

		//Email For Admin
		$emailObj = new \stdClass();
		$emailObj->name = $name;
		$emailObj->investment_id = $investment_id;

		return \Mail::to($fromConfig)->send(new SendBankSlip($emailObj));
	}
}

function sendBankSlipConfirm($userData = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;

		return \Mail::to($to_email)->send(new SendBankSlipConfirm($emailObj));
	}
}

function sendApprovalMail($userData = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {
		
		$userId = $userData->id;
		$link = URL::to('/login');

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		$fromConfig = Setting::get('email_from_address');
		$fromNameConfig = Setting::get('email_from_name');

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;
		$emailObj->link = $link;
		// $emailObj->attach = $attach;

		return \Mail::to($to_email)->send(new SendApprovalMail($emailObj));
	}
}

function sendPendingFunding($userData = null, $attach = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		$fromConfig = Setting::get('email_from_address');
		$fromNameConfig = Setting::get('email_from_name');

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;

		return \Mail::to($to_email)->send(new SendPendingFunding($emailObj, $attach));
	}
}

function sendDeActive($userData = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		$fromConfig = Setting::get('email_from_address');
		$fromNameConfig = Setting::get('email_from_name');

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;

		return \Mail::to($to_email)->send(new SendDeActive($emailObj));
	}
}

function sendReject($userData = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		$fromConfig = Setting::get('email_from_address');
		$fromNameConfig = Setting::get('email_from_name');

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;

		return \Mail::to($to_email)->send(new SendReject($emailObj));
	}
}

function sendAutoClosedNotice($userData = null, $subscription = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		if(!empty($subscription->maturity_date)){
            $maturity_date = date('d-m-Y', strtotime($subscription->maturity_date));
        }else{
            $maturity_date ="-";
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

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;
		$emailObj->investment_no = $investment_no;
		$emailObj->maturity_date = $maturity_date;

		return \Mail::to($to_email)->send(new SendAutoClosedNotice($emailObj));
	}
}

function sendActive($userData = null, $attachment = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;

		return \Mail::to($to_email)->send(new SendActive($emailObj, $attachment));
	}
}

function sendRedemptionNoticeAcceptForInvestor($userData = null, $subscription = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		if(!empty($subscription['draft_refrence_id'])){
			    
		    if(($subscription['status'] == 3) || ($subscription['status'] == 6)){
                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
            }else{
                $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
            }
        }else{
            $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
        }

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;
		$emailObj->investment_no = $investment_no;

		return \Mail::to($to_email)->send(new SendRedemptionNoticeAcceptForInvestor($emailObj));
	}
}

function sendRedemptionNoticeRejectForInvestor($userData = null, $subscription = null, $redemption_msg = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		if(!empty($subscription['draft_refrence_id'])){
			    
		    if(($subscription['status'] == 3) || ($subscription['status'] == 6)){
                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
            }else{
                $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
            }
        }else{
            $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
        }

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;
		$emailObj->investment_no = $investment_no;
		$emailObj->redemption_msg = $redemption_msg;

		return \Mail::to($to_email)->send(new SendRedemptionNoticeRejectForInvestor($emailObj));
	}
}

function sendReInvestmentSuccessNotice($userData = null, $copy = null, $old_investment_no = null, $new_investment_no = null, $maturity_date = null, $attachment= null, $base_path = null, $fileName = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;
		$emailObj->old_investment_no = $old_investment_no;
		$emailObj->new_investment_no = $new_investment_no;
		$emailObj->maturity_date = $maturity_date;

		return \Mail::to($to_email)->send(new SendReInvestmentSuccessNotice($emailObj, $attachment, $base_path, $fileName));
	}
}

function sendBankDetailsUpdateMail($userData = null, $subscription = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		if(!empty($subscription['draft_refrence_id'])){
                
            if(($subscription['status'] == 3) || ($subscription['status'] == 6)){
                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
            }else{
                $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
            }
        }else{
            $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
        }

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;
		$emailObj->investment_no = $investment_no;

		return \Mail::to($to_email)->send(new SendBankDetailsUpdateMail($emailObj));
	}
}

function sendBeneficiaryDetailsUpdateMail($userData = null, $subscription = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		if(!empty($subscription['draft_refrence_id'])){
                
            if(($subscription['status'] == 3) || ($subscription['status'] == 6)){
                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
            }else{
                $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
            }
        }else{
            $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
        }

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;
		$emailObj->investment_no = $investment_no;

		return \Mail::to($to_email)->send(new SendBeneficiaryDetailsUpdateMail($emailObj));
	}
}

//for Admin
function sendBankAcNoticeForAdmin($userData = null, $subscription = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$fromConfig = Setting::get('email_from_address');
		$fromNameConfig = Setting::get('email_from_name');

		if(!empty($subscription['draft_refrence_id'])){
                
            if(($subscription['status'] == 3) || ($subscription['status'] == 6)){
                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
            }else{
                $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
            }
        }else{
            $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
        }

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;
		$emailObj->investment_no = $investment_no;

		return \Mail::to($fromConfig)->send(new SendBankAcNoticeForAdmin($emailObj));
	}
}

function sendBankAcNoticeForInvestor($userData = null, $subscription = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		if(!empty($subscription['draft_refrence_id'])){
                
            if(($subscription['status'] == 3) || ($subscription['status'] == 6)){
                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
            }else{
                $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
            }
        }else{
            $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
        }

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;
		$emailObj->investment_no = $investment_no;

		return \Mail::to($to_email)->send(new SendBankAcNoticeForInvestor($emailObj));
	}
}

// For Admin
function sendBeneficiaryNoticeForAdmin($userData = null, $subscription = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$fromConfig = Setting::get('email_from_address');
		$fromNameConfig = Setting::get('email_from_name');

		if(!empty($subscription['draft_refrence_id'])){
                
            if(($subscription['status'] == 3) || ($subscription['status'] == 6)){
                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
            }else{
                $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
            }
        }else{
            $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
        }

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;
		$emailObj->investment_no = $investment_no;

		return \Mail::to($fromConfig)->send(new SendBeneficiaryNoticeForAdmin($emailObj));
	}
}

function sendBeneficiaryNoticeForInvestor($userData = null, $subscription = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		if(!empty($subscription['draft_refrence_id'])){
                
            if(($subscription['status'] == 3) || ($subscription['status'] == 6)){
                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
            }else{
                $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
            }
        }else{
            $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
        }

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;
		$emailObj->investment_no = $investment_no;

		return \Mail::to($to_email)->send(new SendBeneficiaryNoticeForInvestor($emailObj));
	}
}

//For Admin
function sendReinvestmentNoticeForAdmin($userData = null, $subscription = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$fromConfig = Setting::get('email_from_address');
		$fromNameConfig = Setting::get('email_from_name');

		if(!empty($subscription['draft_refrence_id'])){
                
            if(($subscription['status'] == 3) || ($subscription['status'] == 6)){
                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
            }else{
                $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
            }
        }else{
            $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
        }

		//Email For Admin
		$emailObj = new \stdClass();
		$emailObj->name = $name;
		$emailObj->investment_no = $investment_no;

		return \Mail::to($fromConfig)->send(new SendReinvestmentNoticeForAdmin($emailObj));
	}
}

function sendReinvestmentNoticeForInvestor($userData = null, $subscription = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		if(!empty($subscription['draft_refrence_id'])){
                
            if(($subscription['status'] == 3) || ($subscription['status'] == 6)){
                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
            }else{
                $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
            }
        }else{
            $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
        }

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;
		$emailObj->investment_no = $investment_no;

		return \Mail::to($to_email)->send(new SendReinvestmentNoticeForInvestor($emailObj));
	}
}

//Email For Admin
function sendRedemptionNoticeForAdmin($userData = null, $subscription = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$fromConfig = Setting::get('email_from_address');
		$fromNameConfig = Setting::get('email_from_name');

		if(!empty($subscription['draft_refrence_id'])){
                
            if(($subscription['status'] == 3) || ($subscription['status'] == 6)){
                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
            }else{
                $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
            }
        }else{
            $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
        }

		//Email For Admin
		$emailObj = new \stdClass();
		$emailObj->name = $name;
		$emailObj->investment_no = $investment_no;

		return \Mail::to($fromConfig)->send(new SendRedemptionNoticeForAdmin($emailObj));
	}
}

function sendRedemptionNoticeForInvestor($userData = null, $subscription = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		if(!empty($subscription['draft_refrence_id'])){
                
            if(($subscription['status'] == 3) || ($subscription['status'] == 6)){
                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
            }else{
                $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
            }
        }else{
            $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
        }

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;
		$emailObj->investment_no = $investment_no;

		return \Mail::to($to_email)->send(new SendRedemptionNoticeForInvestor($emailObj));
	}
}

function sendRedemptionNoticeToInvestor($userData = null, $subscription = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		if(!empty($subscription->maturity_date)){
            $maturity_date = date('d-m-Y', strtotime($subscription->maturity_date));
        }else{
            $maturity_date ="-";
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

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;
		$emailObj->investment_no = $investment_no;
		$emailObj->maturity_date = $maturity_date;

		return \Mail::to($to_email)->send(new SendRedemptionNoticeToInvestor($emailObj));
	}
}

function sendRedemptionNotice($userData = null, $subscription = null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		if(!empty($subscription->maturity_date)){
            $maturity_date = date('d-m-Y', strtotime($subscription->maturity_date));
        }else{
            $maturity_date ="-";
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

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;
		$emailObj->investment_no = $investment_no;
		$emailObj->maturity_date = $maturity_date;

		return \Mail::to($to_email)->send(new SendRedemptionNotice($emailObj));
	}
}

function sendMailToUser($userData) 
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		$from = $userData->fromConfig;
		$fromName = $userData->fromNameConfig;
		$msg = $userData->msg;
		$subject = $userData->subject;

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->msg = $msg;
		$emailObj->subject = $subject;
		$emailObj->from = $from;
		$emailObj->fromName = $fromName;

		return \Mail::to($from)->send(new SendMailToUser($emailObj));
	}
}

function sendDividentPayoutMail($userData = null, $attachment= null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;

		return \Mail::to($to_email)->send(new SendDividendPayoutNotice($emailObj, $attachment));
	}
}

function sendDividentPaymentMail($userData = null, $attachment= null, $subscriptionData =null)
{
	$mail_conf = Setting::get('send_mail_conf');
	if ($mail_conf == 1) {

		if ($userData->role_id == 2) {
			$name = $userData->first_name;
		} else {
			$name = $userData->last_name;
		}

		$to_email = $userData->email;

		//Email For User
		$emailObj = new \stdClass();
		$emailObj->name = $name;

		return \Mail::to($to_email)->send(new SendDividendPaymentNotice($emailObj, $attachment, $subscriptionData));
	}
}

function getImage($name = null)
{
    // return response()->file(base_path() . '/resources/img/' . $name . '.png');
	return public_path(). '/assets/images/mcil-logo.png';
}

function getUserActivity() 
{
    $users = User::with('userActivity')->get();
    foreach ($users as $user) {
        if (\Cache::has('user-is-online-' . $user->id)) {
            $userActivityStatus = $user->first_name .''.$user->last_name .  " is online. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
        }
    }

    return $userActivityStatus;
}

function autoParagraph($text)
{
    if (trim($text) !== '') {
        $text = preg_replace('|<br[^>]*>\s*<br[^>]*>|i', "\n\n", $text . "\n");
        $text = preg_replace("/\n\n+/", "\n\n", str_replace(["\r\n", "\r"], "\n", $text));
        $texts = preg_split('/\n\s*\n/', $text, -1, PREG_SPLIT_NO_EMPTY);
        $text = '';
        foreach ($texts as $txt) {
            $text .= '<p>' . nl2br(trim($txt, "\n")) . "</p>\n";
        }
        $text = preg_replace('|<p>\s*</p>|', '', $text);
    }

    return $text;
}

function getBrowser($user_agent)
{
    $t = strtolower($user_agent);
    $t = " " . $t;
    if(strpos($t, 'opera') || strpos($t, 'opr/')) 
        return 'Opera';   
    elseif (strpos($t, 'edg')) 
        return 'Edge';   
    elseif (strpos($t, 'chrome'))
        return 'Chrome';   
    elseif (strpos($t, 'safari'))
        return 'Safari';   
    elseif (strpos($t, 'firefox'))
        return 'Firefox';
    elseif (strpos($t, 'safari'))
        return 'Safari';    
    elseif (strpos($t, 'msie') || strpos($t, 'trident/7'))
        return 'Internet Explorer';
    return 'Unkown';
}





