<div class="fixed-bottom">
    <div class="card footer-card">
        <div class="card-body">
            <div class="d-sm-flex justify-content-center align-items-center">
                <div class="text-center text-sm-left d-block d-sm-inline-block">Copyright © <?= date('Y')?>
                    <a href="#" target="_blank"> MCIL </a>. All rights reserved.
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        setInterval(function () {
            sessionCheckingLogin();
        }, 780000);

        function sessionCheckingLogin(){
            axios.get(SITE_URL+'sessionCheckingLogin').then(function (response) {
                if(response.data.data != "true"){   
                    Swal.fire({
                        html:
                        '<h5>Your session is going to be timeout in next <strong>30</strong> seconds.</h5> <br/>' +
                        '<h5>Please click on Continue button if you would like to stay on session.</h5>',
                        timer: 30000,
                        showConfirmButton: true,
                        confirmButtonText: "Continue",
                        cancelButtonText: 'Logout',
                        showCancelButton: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        imageUrl: base_url+'assets/images/500.png',
                        imageWidth: 400,
                        imageHeight: 200,
                        imageAlt: '404',
                    }). then(function(result){

                        if (result.value) {
                            window.location = SITE_URL+"sessionRelogin";
                        }else{
                            $('#admin-logout-form').submit();
                        }

                    });  
                }
            })
            .catch(function (error) {
                setTimeout(location.reload.bind(location), 1500);
            }); 
        }
    });
</script>