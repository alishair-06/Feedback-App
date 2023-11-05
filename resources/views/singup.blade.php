<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign in</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
   integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

   <link rel="stylesheet" href="{{ asset('mycss.css') }}">
    <style>

    </style>
</head>

<body>
   

        <div class="container py-5">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
                data-scrollax-parent="true">
                <div class="col-md-12  text-center" >
                    <div class="row">


                        <!-- .......... form -->
                        <div class="col-md-6 col-lg-5  ">
                            <div class="card shadow-lg p-3">
                                <div class="card-title pt-3 pl-3">
                                    <h3 style=" color: #f15050; text-transform: none;">
                                        Feedback Tool
                                    </h3>
                                    <div class="form-group Login_button ">
                                        <button class="small btn border-0">Don't have an account ? <span
                                                class="text-danger"> Signup..</span></button>

                                    </div>
                                    <div class="form-group singup-button" style="display: none; visibility: hidden;">
                                        <button class="small  btn border-0">Already have an account ? <span
                                                class="text-danger"> Login..</span></button>
                                    </div>
                                    <div>
                                        <p class="m-0 p-0 " style="font-size: 13px">Admin Email: Admin@1.com</p>
                                                <p class="m-0 p-0 " style="font-size: 13px">Admin Email: 11223344</p>
                                    </div>
                                    @if ($errors->first('email'))
                                    <div class="text-danger">

                                        {{ $errors->first('email') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <div class="singup-form" style="display: none; visibility: hidden;">
                                        <form class="contact-form" id='singup' method="POST"
                                        action="{{ route('register') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-8 my-2">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Your Name"
                                                            name="name" id="name">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 my-2">
                                                    <div class="form-group">
                                                        <input type="Email" class="form-control"
                                                            placeholder="Your Email" name="email" id="email">
                                                    </div>
                                                </div>
                                                <div class="col-md-9 my-2">
                                                    <div class="form-group">
                                                        <input type="password" class="form-control"
                                                            placeholder="Password" name="password" id="password">
                                                    </div>
                                                </div>
                                                <div class="col-md-9 my-2">
                                                    <div class="form-group">
                                                        <input type="password" placeholder="Confirm password"
                                                            class="form-control" name="password_confirmation"
                                                            id="password_confirmation">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group m-2">
                                                <input type="submit" style="color: #fff ; background-color: #f15050" value="Sing up" class="btn  ">
                                            </div>
                                            
                                        </form>
                                    </div>
                                    <div class="loginform my-3">
                                        <form class="contact-form" id='login' method="POST"
                                            action="{{ route('login') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12 my-21">
                                                    <div class="form-group">
                                                        <input type="Email" class="form-control"
                                                            placeholder="Your Email" name="email">
                                                    </div>
                                                </div>
                                                <div class="col-md-9 my-2">
                                                    <div class="form-group">
                                                        <input type="password" class="form-control"
                                                            placeholder="Password" name="password">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" style="color: #fff ; background-color: #f15050" value="Sing up" class="btn  ">
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .......... -->
                    </div>


                </div>
            </div>
        </div>



    <!-- END nav -->



        <script src="https://kit.fontawesome.com/0a4feea61b.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
        {{-- jquery cdn ............... --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>



</body>
<script>
    $(document).ready(function() {


        $(".Login_button").click(function() {
            $(".singup-form").css("display", "block");
            $(".singup-form").css("visibility", "visible");
            $(".loginform").css("display", "none");
            $(".loginform").css("visibility", "hidden");

            $(".singup-button").css("display", "block");
            $(".singup-button").css("visibility", "visible");
            $(".Login_button").css("display", "none");
            $(".Login_button").css("visibility", "hidden");

        });


        $(".singup-button").click(function() {
            $(".loginform").css("display", "block");
            $(".loginform").css("visibility", "visible");
            $(".singup-form").css("display", "none");
            $(".singup-form").css("visibility", "hidden");

            $(".Login_button").css("display", "block");
            $(".Login_button").css("visibility", "visible");
            $(".singup-button").css("display", "none");
            $(".singup-button").css("visibility", "hidden");

        });

    });
</script>

</html>