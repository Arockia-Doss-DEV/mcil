<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndividualController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CommonController;  
use App\Http\Controllers\SubscriptionController; 
use App\Http\Controllers\McilfundController; 
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController; 
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FlashmsgController;
use App\Http\Controllers\AuditlogController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RoleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Auth::routes(['verify' => true]);



//mainatanace page
// Route::get('/', function () {
//     return view('maintanance');
// });

// Route::get('/login', function () {
//     return view('maintanance');
// });

// Route::get('/register', function () {
//     return view('maintanance');
// });




Route::get('/', [HomeController::class, 'index']);
Route::post('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login');

// Common Functions
// Route::get('/selectBoxStateList', [CommonController::class, 'state']);
Route::post('/checkLoginCredentials', [CommonController::class, 'checkLoginCredentials']);
Route::post('/resendOtp', [CommonController::class, 'resendOtp']);
Route::post('/otpCheck', [CommonController::class, 'otpCheck']);
Route::post('/gaotpCheck', [CommonController::class, 'gaotpCheck']);

Route::get('/checkAgentEmailExist', [CommonController::class, 'checkAgentEmailExist']); 
Route::get('/checkEmailExist', [CommonController::class, 'checkEmailExist']);
Route::get('/selectBoxStateList', [CommonController::class, 'selectBoxStateList']); 
Route::post('/gaotpCheckSignUp', [CommonController::class, 'gaotpCheckSignUp']);
Route::post('/sendRegisterOtp', [CommonController::class, 'sendRegisterOtp']);

Route::get('/checkAgentEmail', [CommonController::class, 'checkAgentEmail']); 

//its Common with logged user only
Route::group(['middleware' => ['auth', 'verified']], function() {
    
    Route::get('/denied', [CommonController::class, 'denied']); 
    Route::get('/verify', [CommonController::class, 'verify']); 
    Route::get('/landing', [CommonController::class, 'landing']);
    Route::get('/sessionCheckingLogin', [CommonController::class, 'sessionCheckingLogin']); 
    Route::get('/sessionRelogin', [CommonController::class, 'sessionRelogin']); 
    Route::post('/sessionLogout', [CommonController::class, 'sessionLogout']);
    
    //individual
    Route::get('/individual/initialCreate', [IndividualController::class, 'subscriptionInitialCreate']);
    Route::post('/individual/initialSubscriptionSave', [IndividualController::class, 'subscriptionInitialSave'])->name('initialSubscriptionSave');
    Route::post('/individual/initialsubscriptionSaveDraft', [IndividualController::class, 'subscriptionInitialSaveDraft']);

    Route::post('/individual/uploadDocumentRemove', [IndividualController::class, 'uploadDocumentRemove']);
    Route::post('/individual/uploadDocument', [IndividualController::class, 'uploadDocument']);
    Route::get('/individual/getDocument', [IndividualController::class, 'getDocument']);
    Route::get('/individual/reviewImage', [IndividualController::class, 'reviewImage']);
    Route::post('/individual/signedPdfDownload', [IndividualController::class, 'signedPdfDownload']);

    Route::get('/individual/additionalCreate', [IndividualController::class, 'subscriptionAdditionalCreate']);

    //company
    Route::get('/company/initialCreate', [CompanyController::class, 'subscriptionInitialCreate']);
    Route::post('/company/initialSubscriptionSave', [CompanyController::class, 'subscriptionInitialSave'])->name('companyInitialSubscriptionSave');
    Route::post('/company/initialsubscriptionSaveDraft', [CompanyController::class, 'subscriptionInitialSaveDraft']);

    Route::post('/company/uploadDocumentRemove', [CompanyController::class, 'uploadDocumentRemove']);
    Route::post('/company/uploadDocument', [CompanyController::class, 'uploadDocument']);
    Route::get('/company/getDocument', [CompanyController::class, 'getDocument']);
    Route::get('/company/reviewImage', [CompanyController::class, 'reviewImage']);
    Route::post('/company/signedPdfDownload', [CompanyController::class, 'signedPdfDownload']);

    Route::get('/company/additionalCreate', [CompanyController::class, 'subscriptionAdditionalCreate']);

    // McilFunds
    Route::get('/mcilfunds/setDefaultFund', [McilfundController::class, 'setDefaultFund']);

    //notifications
    Route::get('/notifications', [CommonController::class, 'notification']); 

    //Audit Logs
    Route::get('/audit/logs', [AuditlogController::class, 'index']);
    Route::get('/user/audit/logs', [AuditlogController::class, 'userLogs']);

});


Route::middleware(['auth', 'verified', 'admin_check'])->group(function () {
    // admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    //subscriptions
    Route::get('/subscription/pending', [SubscriptionController::class, 'pending']); 
    Route::get('/subscription/view/{id}', [SubscriptionController::class, 'subscriptionView'])->name('adminSubscriptionView'); 
    Route::get('/subscription/funding', [SubscriptionController::class, 'pendingFunding']);
    Route::get('/subscription/active', [SubscriptionController::class, 'active']);
    Route::get('/subscription/deActive', [SubscriptionController::class, 'deActive']);
    Route::get('/subscription/rejected', [SubscriptionController::class, 'rejected']);
    Route::get('/subscription/matured', [SubscriptionController::class, 'matured']);
    Route::get('/subscription/draft', [SubscriptionController::class, 'draft']);
    Route::get('/subscription/redemption', [SubscriptionController::class, 'redemption']);
    Route::get('/subscription/reInvestment', [SubscriptionController::class, 'reInvestment']);
    Route::post('/subscription/changeStatus', [SubscriptionController::class, 'changeStatus'])->name('changeStatus');
    Route::get('/subscription/jointAccounts', [SubscriptionController::class, 'jointAccount']);
    Route::get('/subscription/maturing', [SubscriptionController::class, 'maturing']);
    Route::get('/subscription/preMaturedRedemption', [SubscriptionController::class, 'preMaturedRedemption']);
    
    Route::get('/subscription/initialInvestments', [SubscriptionController::class, 'initialInvestment']);
    Route::get('/subscription/additionalInvestments', [SubscriptionController::class, 'additionalInvestment']);

    Route::get('/confirm/bankSlip', [SubscriptionController::class, 'sendBankSlipConfirm'])->name('sendBankSlipConfirm');


    //Individual Subscription Create
    Route::get('/subscription/individualInitialCreate', [SubscriptionController::class, 'individualInitialCreate'])->name('individualInitialCreate');
    Route::post('/subscription/individualInitialDraft', [SubscriptionController::class, 'individualInitialDraft']);
    Route::post('/subscription/individualInitialSave', [SubscriptionController::class, 'individualInitialSave'])->name('individualInitialSave');

    //Individual Subscription Edit
    Route::get('/subscription/individualSubscriptionEdit', [SubscriptionController::class, 'individualSubscriptionEdit'])->name('individualSubscriptionEdit');
    Route::post('/subscription/initialSubscriptionEditDraft', [SubscriptionController::class, 'initialSubscriptionEditDraft']);
    Route::post('/subscription/individualSubscriptionUpdate', [SubscriptionController::class, 'individualSubscriptionUpdate'])->name('individualSubscriptionUpdate');

    //Individual Additional Create
    Route::get('/subscription/individualAdditionalCreate', [SubscriptionController::class, 'individualAdditionalCreate'])->name('individualAdditionalCreate');
    Route::post('/subscription/individualAdditionalDraft', [SubscriptionController::class, 'individualAdditionalDraft']);
    Route::post('/subscription/individualAdditionalSave', [SubscriptionController::class, 'individualAdditionalSave'])->name('individualAdditionalSave');

    
    Route::post('/subscription/uploadDocumentRemove', [SubscriptionController::class, 'uploadDocumentRemove']);
    Route::post('/subscription/uploadDocument', [SubscriptionController::class, 'uploadDocument']);
    Route::get('/subscription/getDocument', [SubscriptionController::class, 'getDocument']);
    Route::get('/subscription/reviewImage', [SubscriptionController::class, 'reviewImage']);
    Route::post('/subscription/signedPdfDownload', [SubscriptionController::class, 'signedPdfDownload']);


    //Company Subscription Create
    Route::get('/subscription/companyInitialCreate', [SubscriptionController::class, 'companyInitialCreate'])->name('companyInitialCreate');
    Route::post('/subscription/companyInitialDraft', [SubscriptionController::class, 'companyInitialDraft']);
    Route::post('/subscription/companyInitialSave', [SubscriptionController::class, 'companyInitialSave'])->name('companyInitialSave');

    //Company Subscription Edit
    Route::get('/subscription/companySubscriptionEdit', [SubscriptionController::class, 'companySubscriptionEdit'])->name('companySubscriptionEdit');
    Route::post('/subscription/companySubscriptionEditDraft', [SubscriptionController::class, 'companySubscriptionEditDraft']);
    Route::post('/subscription/companySubscriptionUpdate', [SubscriptionController::class, 'companySubscriptionUpdate'])->name('companySubscriptionUpdate');

    //Company Additional Create
    Route::get('/subscription/companyAdditionalCreate', [SubscriptionController::class, 'companyAdditionalCreate'])->name('companyAdditionalCreate');
    Route::post('/subscription/companyAdditionalDraft', [SubscriptionController::class, 'companyAdditionalDraft']);
    Route::post('/subscription/companyAdditionalSave', [SubscriptionController::class, 'companyAdditionalSave'])->name('companyAdditionalSave');


    Route::get('/subscription/ajaxCiGet', [SubscriptionController::class, 'ajaxCiGet']);
    Route::post('/subscription/ajaxCiEditSave', [SubscriptionController::class, 'ajaxCiEditSave']);
    Route::get('/subscription/reGenerateSignedPdf/{id}', [SubscriptionController::class, 'reGenerateSignedPdf']);

    Route::get('/subscription/signedApplication/{id}', [SubscriptionController::class, 'signedApplication']);
    Route::get('/subscription/bankInstruction/{id}', [SubscriptionController::class, 'bankInstruction']);
    Route::get('/subscription/pfia/{id}', [SubscriptionController::class, 'pfia']);

    Route::post('/subscription/redemptionUpdate', [SubscriptionController::class, 'redemptionUpdate']);
    Route::get('/subscription/autoGenerateInvestment', [SubscriptionController::class, 'autoGenerateInvestment']);
    Route::post('/subscription/ajaxPaymentSave', [SubscriptionController::class, 'ajaxPaymentSave']);
    Route::get('/subscription/ajaxPaymentGet', [SubscriptionController::class, 'ajaxPaymentGet']);
    Route::post('/subscription/ajaxPaymentEditSave', [SubscriptionController::class, 'ajaxPaymentEditSave']);
    Route::get('/subscription/ajaxInvestmentGet', [SubscriptionController::class, 'ajaxInvestmentGet']);
    Route::post('/subscription/ajaxInvestmentEditSave', [SubscriptionController::class, 'ajaxInvestmentEditSave']);
    Route::post('/subscription/uploadSignedapp', [SubscriptionController::class, 'uploadSignedapp']);
    Route::post('/subscription/formuploadShareCertification', [SubscriptionController::class, 'formuploadShareCertification']);
    Route::post('/subscription/formuploadBankSlip', [SubscriptionController::class, 'formuploadBankSlip']);
    Route::post('/subscription/documentUpload', [SubscriptionController::class, 'documentUpload']);
    Route::post('/subscription/ajaxIBankEditSave', [SubscriptionController::class, 'ajaxIBankEditSave']);
    Route::post('/subscription/ajaxBeneficiaryEditSave', [SubscriptionController::class, 'ajaxBeneficiaryEditSave']);
    
    //investors
    Route::get('/investor/create', [UserController::class, 'createInvestor']);
    Route::post('/investor/create', [UserController::class, 'createInvestor']);
    Route::get('/investor/active', [UserController::class, 'active']);
    Route::get('/investor/inActive', [UserController::class, 'inActive']);

    Route::get('/investor/view/{id}', [UserController::class, 'viewInvestor'])->name('viewInvestor');
    Route::get('/investor/edit/{id}', [UserController::class, 'editInvestor']);
    Route::post('/investor/edit/{id}', [UserController::class, 'editInvestor']);

    //agents
    Route::get('/agents/active', [UserController::class, 'agentActive']);
    Route::get('/agents/inActive', [UserController::class, 'agentInactive']);
    Route::get('/active/agent', [UserController::class, 'activeAgent'])->name('activeAgent');
    Route::get('/deactive/agent', [UserController::class, 'deactiveAgent'])->name('deactiveAgent');


    //reports
    Route::get('/contract/reports', [ReportController::class, 'index']);
    Route::post('/reports/contractSummeryExcel', [ReportController::class, 'contractSummeryExcel']);
    // Route::post('/contract/reports', [ReportController::class, 'index']);

    Route::get('/reinvestment/reports', [ReportController::class, 'reinvestmentReport']);
    Route::post('/reports/reinvestmentExcel', [ReportController::class, 'reinvestmentExcel']);
    // Route::post('/reinvestment/reports', [ReportController::class, 'reinvestmentReport']);

    //user emails
    Route::get('/newsletters', [NewsletterController::class, 'index']);
    Route::get('/newsletter/create', [NewsletterController::class, 'createNewsletter']);
    Route::post('/newsletter/create', [NewsletterController::class, 'createNewsletter']);
    Route::get('/newsletter/view/{id}', [NewsletterController::class, 'viewNewsletter']);
    Route::get('/newsletter/searchEmails', [NewsletterController::class, 'searchEmails']);

    Route::get('/subscribe', [NewsletterController::class, 'subscribeIndex']);
    Route::post('/subscribe', [NewsletterController::class, 'subscribe']);

    //posts
    Route::get('/posts', [PostController::class, 'index']);

    //payouts
    Route::get('/payouts', [SubscriptionController::class, 'SubscriptionPayoutIndex']);
    Route::get('/payout/view/{id}', [SubscriptionController::class, 'payoutIndex']);

    //Divident payouts
    Route::get('/divident/payouts', [SubscriptionController::class, 'dividentPayoutIndex']);
    Route::get('/divident/payout/view/{id}', [SubscriptionController::class, 'dividentPayoutView']);

    // Route::post('/check/divident', [SubscriptionController::class, 'checkDivident']);
    
    Route::post('/review/divident/payout', [SubscriptionController::class, 'reviewDividentPayout']);
    Route::post('/check/divident/contracts', [SubscriptionController::class, 'selectDividentContract']);
    Route::post('/subscription/ajaxDividentSave', [SubscriptionController::class, 'ajaxDividentSave']);

    //Flash msgs
    Route::get('/flash/messages', [FlashmsgController::class, 'index']);
    Route::get('/flash/message/create', [FlashmsgController::class, 'createMessage']);
    Route::post('/flash/message/save', [FlashmsgController::class, 'saveMessage']);
    Route::get('/flashmsgView/{id}', [FlashmsgController::class, 'flashmsgView']);
    Route::get('/flashmsgEdit/{id}', [FlashmsgController::class, 'flashmsgEdit']);
    Route::post('/flash/message/update', [FlashmsgController::class, 'flashmsgUpdate']);
    Route::get('/flashmsgDelete/{id}', [FlashmsgController::class, 'flashmsgDelete']);

    Route::get('/notification', [AdminController::class, 'notification']);

    //Mcil Funds
    Route::get('/mcilfunds', [McilfundController::class, 'index']);
    Route::post('/mcilfund/save', [McilfundController::class, 'saveFund']);
    Route::get('/get/fund', [McilfundController::class, 'getFund']);
    Route::post('/mcilfund/update', [McilfundController::class, 'updateFund']);
    
    //App Settings
    Route::get('/app/settings', [SettingController::class, 'index']);
    Route::post('/update/settings', [SettingController::class, 'updateSettings']);
    
    Route::get('/clear-cache', [SettingController::class, 'clearCache']);
    Route::get('/clear-otp', [SettingController::class, 'clearOtp']);
    Route::get('/clear-notifications', [SettingController::class, 'clearNotifications']);

    //User Activity
    Route::get('/userActivity', [UserController::class, 'userActivity']);

    Route::get('/settings', [AdminController::class, 'settings']);
    Route::post('/changePassword', [AdminController::class, 'changePassword']);
    Route::post('/gauthEnable', [AdminController::class, 'gauthEnable']);
    Route::post('/gauthDisable', [AdminController::class, 'gauthDisable']);

    //roles
    Route::resource('roles', RoleController::class);
});

Route::middleware(['auth', 'verified', 'subcription_check'])->group(function () {
    // Investor  
    Route::get('/individual/dashboard', [IndividualController::class, 'index'])->name('individual.dashboard');
    Route::get('/individual/subscriptions', [IndividualController::class, 'subscriptionIndex']);
    Route::get('/individual/view/subscription/{id}', [IndividualController::class, 'subscriptionView']); 
    Route::get('/individual/subscriptionEdit/{id}', [IndividualController::class, 'subscriptionEdit']); 
    Route::delete('/individual/subscriptionDelete/{id}', [IndividualController::class, 'subscriptionDelete'])->name('individualSubscriptionDelete'); 

    //additional subscription
    Route::get('/individual/additionalCreate', [IndividualController::class, 'subscriptionAdditionalCreate']);
    Route::post('/individual/additionalDraft', [IndividualController::class, 'subscriptionAdditionalDraft']);
    Route::post('/individual/additionalSave', [IndividualController::class, 'subscriptionAdditionalSave'])->name('subscriptionAdditionalSave');

    Route::get('/individual/documentBankIndex', [IndividualController::class, 'documentBankIndex']);
    Route::post('/individual/documentBankUpload', [IndividualController::class, 'documentBankUpload']);
    Route::get('/individual/bankDocReview', [IndividualController::class, 'bankDocReview']);

    Route::get('/individual/signedApplication/{id}', [IndividualController::class, 'signedApplication']);
    Route::get('/individual/bankInstruction/{id}', [IndividualController::class, 'bankInstruction']);
    Route::get('/individual/pfia/{id}', [IndividualController::class, 'pfia']);
    
    Route::post('/individual/changeBankDetailsUpload', [IndividualController::class, 'changeBankDetailsUpload']);
    Route::post('/individual/changeBeneficiaryDetailsUpload', [IndividualController::class, 'changeBeneficiaryDetailsUpload']);
    Route::get('/individual/uploadAttachImageRemove', [IndividualController::class, 'uploadAttachImageRemove']);
    Route::get('/individual/reinvestRequest', [IndividualController::class, 'reinvestRequest']);
    Route::post('/individual/redemptionUpload', [IndividualController::class, 'redemptionUpload']);
    
    //individual emails
    Route::get('/individual/newsletters', [IndividualController::class, 'notificationIndex']);
    Route::get('/individual/newsletter/view/{id}', [IndividualController::class, 'notificationView']);

    //individual flashmsgs
    Route::get('/individual/fmsgIndex', [IndividualController::class, 'fmsgIndex']);
    Route::get('/individual/fmsgView/{id}', [IndividualController::class, 'fmsgView']);

    Route::get('/individual/myprofile', [IndividualController::class, 'myProfile']);
    Route::get('/individual/notifications', [IndividualController::class, 'notification']);

    Route::get('/individual/settings', [IndividualController::class, 'settings']);
    Route::post('/individual/changePassword', [IndividualController::class, 'changePassword']);
    Route::post('/individual/gauthEnable', [IndividualController::class, 'gauthEnable']);
    Route::post('/individual/gauthDisable', [IndividualController::class, 'gauthDisable']);

});

Route::group(['middleware' => ['auth', 'verified', 'subcription_check']], function() {
    // Company  
    Route::get('/company/dashboard', [CompanyController::class, 'index'])->name('company.dashboard');
    Route::get('/company/subscriptions', [CompanyController::class, 'subscriptionIndex']);
    Route::get('/company/view/subscription/{id}', [CompanyController::class, 'subscriptionView']); 
    Route::get('/company/subscriptionEdit/{id}', [CompanyController::class, 'subscriptionEdit']); 
    Route::delete('/company/subscriptionDelete/{id}', [CompanyController::class, 'subscriptionDelete'])->name('companySubscriptionDelete');

    //additional subscription
    Route::get('/company/additionalCreate', [CompanyController::class, 'subscriptionAdditionalCreate']);
    Route::post('/company/additionalDraft', [CompanyController::class, 'subscriptionAdditionalDraft']);
    Route::post('/company/additionalSave', [CompanyController::class, 'subscriptionAdditionalSave'])->name('subscriptionCompanyAdditionalSave');

    Route::get('/company/documentBankIndex', [CompanyController::class, 'documentBankIndex']);
    Route::post('/company/documentBankUpload', [CompanyController::class, 'documentBankUpload']);
    Route::get('/company/bankDocReview', [CompanyController::class, 'bankDocReview']);

    Route::get('/company/signedApplication/{id}', [CompanyController::class, 'signedApplication']);
    Route::get('/company/bankInstruction/{id}', [CompanyController::class, 'bankInstruction']);
    Route::get('/company/pfia/{id}', [CompanyController::class, 'pfia']);

    Route::post('/company/changeBankDetailsUpload', [CompanyController::class, 'changeBankDetailsUpload']);
    Route::get('/company/uploadAttachImageRemove', [CompanyController::class, 'uploadAttachImageRemove']);
    Route::get('/company/reinvestRequest', [CompanyController::class, 'reinvestRequest']);
    Route::post('/company/redemptionUpload', [CompanyController::class, 'redemptionUpload']);
    
    //company emails
    Route::get('/company/newsletters', [CompanyController::class, 'notificationIndex']);
    Route::get('/company/newsletter/view/{id}', [CompanyController::class, 'notificationView']);
    
    //company flashmsgs
    Route::get('/company/fmsgIndex', [CompanyController::class, 'fmsgIndex']);
    Route::get('/company/fmsgView/{id}', [CompanyController::class, 'fmsgView']);

    Route::get('/company/myprofile', [CompanyController::class, 'myProfile']);
    Route::get('/company/notifications', [CompanyController::class, 'notification']);

    Route::get('/company/settings', [CompanyController::class, 'settings']);
    Route::post('/company/changePassword', [CompanyController::class, 'changePassword']);
    Route::post('/company/gauthEnable', [CompanyController::class, 'gauthEnable']);
    Route::post('/company/gauthDisable', [CompanyController::class, 'gauthDisable']);
});

//Uploads
Route::get('/subscription/investments', [MessageController::class, 'subsInvestments']);
Route::get('/active/investment', [MessageController::class, 'activeInvestment']);
Route::get('/deActive/investment', [MessageController::class, 'deActiveInvestment']);
Route::get('/update/model/type', [MessageController::class, 'updateModelType']);
Route::get('/update/sourceWealth', [MessageController::class, 'updateSourceWealth']);
Route::get('/update/file/name', [MessageController::class, 'updateFileName']);
Route::get('/divident/mail', [MessageController::class, 'dividentMail']);
