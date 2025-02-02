<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Login</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Login</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START LOGIN SECTION -->
    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Login</h3>
                            </div>
                            <form method="post">
                                <div class="form-group mb-3">
                                    <input type="text" required="" class="form-control" name="email" id="email" placeholder="Your Email">
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control" required="" type="password" name="password" id="password" placeholder="Password">
                                </div>
                                <div class="login_footer form-group mb-3">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                            <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                        </div>
                                    </div>
                                    <a href="#">Forgot password?</a>
                                </div>
                                <div class="form-group mb-3">
                                    <button onclick="Login()" type="button" class="btn btn-fill-out btn-block" name="login">Log in</button>
                                </div>
                            </form>
                            {{-- <div class="different_login">
                                <span> or</span>
                            </div> --}}
                            {{-- <ul class="btn-login list_none text-center">
                                <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                                <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                            </ul> --}}
                            <div class="form-note text-center">Don't Have an Account? <a href="{{url('/registration-page')}}">Sign up now</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN SECTION -->
</div> 

<script>
    async function Login(){
        let email = $("#email").val();
        let password = $("#password").val();

        let jsonLogin = {
            email: email,
            password: password
        }

        let res = await axios.post('/Login',jsonLogin);

        if(res.status===200){
            // alert("Res Code: "+res.data['token']);
            if(sessionStorage.getItem("last_location"))
                window.location.href = sessionStorage.getItem("last_location");
            else
                window.location.href = "/";
        }
    }
</script>