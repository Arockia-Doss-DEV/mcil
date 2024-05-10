<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>    <meta charset="utf-8"/>
    <title>Login</title>
    <meta name="description" content="MCIL CRM Portal">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--begin::Fonts -->
    <link rel="shortcut icon" href="https://mcilintl.ltd/img/favicon.ico" />

<link rel="stylesheet" href="./css/vendor.styles.css"/>
<link rel="stylesheet" href="./css/demo/legacy-template.css"/>
<link rel="stylesheet" href="./css/demo/custom.css"/>

<script type="text/javascript">
    var urlForJs="https://mcilintl.ltd/";
    var SITE_URL = "https://mcilintl.ltd/";
    var csrfToken = false;   

</script>
<link rel="stylesheet" href="./css/demo/signup-wizard.css"/>
<link rel="stylesheet" href="./css/login.css"/>
</head>
<body>

<main>
    <div class="container-fluid">
        <div class="row">
    
            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="https://mcilintl.ltd/img/media/login-bg.jpg" alt="login image" class="login-img" />
            </div>

            <div class="col-sm-6 mb-2 login-section-wrapper">
                <div class="brand-wrapper">
                    <img src="https://mcilintl.ltd/img/site/mcil-logo.png" alt="logo" class="logo" style="width:140px;">
                </div>
                <div class="login-wrapper ">

                    <form method="post" accept-charset="utf-8" id="loginForm" data-parsley-validate="data-parsley-validate" autocomlete="off" action="/">
                        
                        <div id="pills-tab" role="tablist">
                            <div class="tab-content login_box" id="pills-tabContent">

                                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel">
                            
                                    <h1 class="login-title">Secure Login</h1>
                        
                                    <div class="form-group">
                                        <label for="email">Username</label>
                                        <div class="input email required">
                                            <input type="email" name="Users[email]" class="form-control bx_shodow" required="required" id="email" placeholder="Enter Username (输入用户名)" data-parsley-required="data-parsley-required" data-parsley-group="group-1" maxlength="100"/>
                                        </div>
                                    </div>
                        
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-group bx_shodow">
                                            <input type="password" name="Users[password]" class="form-control" placeholder="Enter password (输入密码)" required="required" data-parsley-group="group-1" id="users-password"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text show-password"> <i class="fa fa-eye-slash"></i></span>
                                                <span class="input-group-text hide-password hidden"><i class="fa fa-eye"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-right a_link">
                                        <a href="/forgotPassword" class="">Forgot Password (忘记密码)</a>
                                    </div>

                                    <input id="loginOTPButton" class="btn btn-block login-btn" type="button" value="Login (登录)">
                                </div>

                                <div class="tab-pane fade" id="pills-gotp" href="#pills-gotp" role="tabpanel">
                                    <h1 class="login-title">Verify 2FA OTP</h1>
                                    
                                    <div class="form-group">
                                        <div class="input text required">
                                            <input type="text" name="gotp" class="form-control bx_shodow" placeholder="2FA Authenticator OTP" id="users-gotp" required="required" data-parsley-type="digits" data-parsley-minlength="6" data-parsley-maxlength="6" data-parsley-group="group-3"/>
                                        </div>                                   
                                    </div>

                                    <input type="button" id="gverifyOTP" class="btn btn-block login-btn" value="Verify (确认)">
                                </div>

                                <div class="tab-pane fade" id="pills-otp" href="#pills-otp" role="tabpanel">
                                    <h1 class="login-title">Verify OTP</h1>
                                    
                                    <div class="form-group">
                                        <div class="input text required">
                                            <input type="text" name="otp" class="form-control bx_shodow" placeholder="OTP" id="users-otp" required="required" data-parsley-type="digits" data-parsley-minlength="6" data-parsley-maxlength="6" data-parsley-group="group-2"/>
                                        </div>                                    
                                    </div>

                                    <div class="mb-3 a_link text-right">
                                        <a href="javascript:void(0);" class="mb-3" id="loginOTPLink"> REQUEST OTP（获取验证码）</a>
                                    </div>
                                    
                                    <input type="button" id="verifyOTP" class="btn btn-block login-btn" value="Verify (确认)">
                                </div>
                                                    
                            </div>
                        </div>
                    </form> 
            
                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>
 