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
                            $('#company-form').submit();
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


@if (Request::path() == 'company/dashboard' or Request::path() == 'company/documentBankIndex' or request()->is('company/view/subscription/*'))

@else

    @auth

    <script type="text/javascript">
        var validNavigation = false;
        function endSession() { 
            console.log("bye");
        }

        function wireUpEvents() {
            window.addEventListener("beforeunload", function (e) {
                e.preventDefault();
                if (!validNavigation) {

                    var ref="load";
                    $.ajax({
                        type: "POST",
                        url: SITE_URL+"sessionLogout",
                        data: { ref: ref },
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        success: function (response) {
                            console.log(response);
                            if (response.status === 1) {
                                setTimeout(location.reload.bind(location), 100);
                            } else {
                                setTimeout(location.reload.bind(location), 100);
                            }
                        }
                    });

                    endSession();
                }
            })
            // Attach the event keypress to exclude the F5 refresh
            $(document).bind('keypress', function(e) {
                if (e.keyCode == 116){
                    validNavigation = true;
                }
            });
            // Attach the event click for all links in the page
            $("a").bind("click", function() {
                validNavigation = true;
            });
            // Attach the event submit for all forms in the page
            $("form").bind("submit", function() {
                validNavigation = true;
            });
            // Attach the event click for all inputs in the page
            $("input[type=submit]").bind("click", function() {
                validNavigation = true;
            });
        }
        // Wire up the events as soon as the DOM tree is ready
        $(document).ready(function() {
            wireUpEvents();  
        }); 
    </script>

    @endauth

@endif