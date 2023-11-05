<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('mycss.css') }}">

    <title>@yield("title")</title>
    <style>
        .pagination li.active span {
            background-color: #f15050 !important;
            color: #fff;
            border: 1px solid #ced4da;
        }

        .pagination li a {
            color: #000000 !important;
            border: 1px solid #ced4da;
        }
    </style>

<body>
    <!-- navbar ---------->
    <nav class="navbar navbar-expand-lg bg-light shadow">
        <div class="container-fluid ">
            <!-- {/* <a class="navbar-brand" href="#">Navbar</a> */} -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link px-lg-4  active" aria-current="page" href="/">Home</a>
                    <a class="nav-link px-lg-4 " href="/admin36">Admin Login</a>
                    @if (Auth::user())
                    <a class="nav-link px-lg-4 " href="/logout">Logout</a>
                    @else
                    <a class="nav-link px-lg-4 " href="/login">Login</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- banner ------------------>
    <div class="heroSection">
        <div class="container text-dark ss">
            <div class="row">
                <div class="col-md-8 ">
                    <h1>My Feedback Tool</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro, saepe?</p>
                </div>
                <div class="col-md-4 ">

                </div>
            </div>
        </div>
    </div>

    <!-- main div -------------------- -->

    @yield("content")



    <!-- footer ------------------->
    <footer class="text-center text-dark shadow">
        <div class="container">
            <section class="mt-5">
                <div class="row text-center d-flex justify-content-center pt-5">
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <Link href="#!" style='color: #f15050 ; text-decoration: none' class="">About us</Link>
                        </h6>
                    </div>
                </div>
            </section>

            <hr class="my-5" />

            <section class="mb-5 text-dark">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt
                            distinctio earum repellat quaerat voluptatibus placeat nam,
                            commodi optio pariatur est quia magnam eum harum corrupti
                            dicta, aliquam sequi voluptate quas.
                        </p>
                    </div>
                </div>
            </section>
            <section class="text-center mb-5">
                <a href="" class="text-dark me-4" style='color: #f15050; text-decoration: none; font-size: 25px '>
                    <i class="fa-brands fa-facebook"
                        style='color: #f15050; text-decoration: none; font-size: 25px '></i>
                </a>
                <a href="" class="text-dark me-4" style='color: #f15050; text-decoration: none; font-size: 25px '>
                    <i class="fa-brands fa-twitter" style='color: #f15050; text-decoration: none; font-size: 25px '></i>
                </a>
                <a href="" class="text-dark me-4" style='color: #f15050; text-decoration: none; font-size: 25px '>
                    <i class="fa-brands fa-google" style='color: #f15050; text-decoration: none; font-size: 25px '></i>
                </a>
                <a href="" class="text-dark me-4" style='color: #f15050; text-decoration: none; font-size: 25px '>
                    <i class="fa-brands fa-linkedin"
                        style='color: #f15050; text-decoration: none; font-size: 25px '></i>
                </a>
            </section>
        </div>



        <div class="text-center text-white p-3" style='background-color: #f15050'>
            © 2023 Copyright:&nbsp;
            <a class="text-white" href="#">Muhammad Ali shair</a>
        </div>
    </footer>

    

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
@stack('script')


</html>