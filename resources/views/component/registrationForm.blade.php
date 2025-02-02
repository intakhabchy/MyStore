<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Register</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Register</li>
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
                                <h3>Create an Account</h3>
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" required="" class="form-control" name="name" id="name" placeholder="Enter Your Name">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" required="" class="form-control" name="email" id="email" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" required="" type="password" name="password" id="password" placeholder="Password">
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" required="" type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password">
                            </div>
                            <div class="form-group mb-3">                                    
                                <select class="form-control" name="gender" id="gender">
                                    <option value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <textarea class="form-control" name="customer_address" id="customer_address" placeholder="Customer Address"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" required="" type="text" name="customer_phone" id="customer_phone" placeholder="Customer Phone">
                            </div>
                            <div class="form-group mb-3">
                                <textarea class="form-control" name="shipping_address" id="shipping_address" placeholder="Shipping Address"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" required="" type="text" name="shipping_phone" id="shipping_phone" placeholder="Shipping Phone">
                            </div>
                            <div class="form-group mb-3">
                                <label for="date_of_birth">Date of Birth</label>
                                <input class="form-control" required="" type="date" name="date_of_birth" id="date_of_birth" placeholder="Date of Birth">
                            </div>
                            <div class="login_footer form-group mb-3">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                                        <label class="form-check-label" for="exampleCheckbox2"><span>I agree to terms &amp; Policy.</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-fill-out btn-block" name="register" onclick="Registration()">Register</button>
                            </div>
                            
                            <div class="form-note text-center">Already have an account? <a href="{{url('/login-page')}}">Log in</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN SECTION -->

</div>

<script>
    async function Registration(){
        let name = $("#name").val();
        let email = $("#email").val();
        let password = $("#password").val();
        let gender = $("#gender").val();
        let customer_address = $("#customer_address").val();
        let customer_phone = $("#customer_phone").val();
        let shipping_address = $("#shipping_address").val();
        let shipping_phone = $("#shipping_phone").val();
        let date_of_birth = $("#date_of_birth").val();

        let jsonRegInfo = {
            name: name,
            email: email,
            password: password,
            gender: gender,
            customer_address: customer_address,
            customer_phone: customer_phone,
            shipping_address: shipping_address,
            shipping_phone: shipping_phone,
            date_of_birth: date_of_birth,
        }

        let res = await axios.post("/Registration", jsonRegInfo);

        if(res.status === 201){
            alert("Registration Successful");

            let jsonLogin = {
                email: email,
                password: password
            }

            let res = await axios.post('/Login',jsonLogin);

            if(res.status===200){
                window.location.href = "/";
            }
        }
        else{
            alert("Registration Failed");
        }
    }
</script>