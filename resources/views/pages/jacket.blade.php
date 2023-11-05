<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="MobileOptimized" content="320">
                            
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Start Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icofont.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/swiper.min.css') }}">
	<link rel="stylesheet" id="theme-change" type="text/css" href="#">
    <!--Page Specific -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nice-select.css') }}">
    <!--Custom Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" id="theme-change" type="text/css" href="#">
    <!-- Favicon Link -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <style>
        .select2-dropdown.select2-dropdown--below{
    width: 400px !important;
    }

.select2-container--default .select2-selection--single{
    margin-top : 7px;
    padding:3px;
    height: 37px;
    width: 400px; 
    font-size: 0.9em;  
    position: relative;
    opacity: 0.8;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
  opacity: 0.8;
    
    width: 40px;
    color: #fff;
    font-size: 0.9em;
    padding: 4px 12px;
    height: 27px;
    position: absolute;
    top: 5px;
    right: 0px;
    width: 20px;
}
    </style>
</head>

<body>
	<div class="loader">
	  <div class="spinner">
		<img src="{{ asset('assets/images/loader.gif') }}" alt=""/>
	  </div> 
	</div>
    <!-- Main Body -->
    <div class="page-wrapper">
        <!-- Header Start -->
        <header class="header-wrapper main-header">
            <div class="header-inner-wrapper">
                <div class="header-right">
                    <div class="serch-wrapper">
                        <form>
                            <input type="text" placeholder="Search Here...">
                        </form>
                        <a class="search-close" href="javascript:void(0);"><span class="icofont-close-line"></span></a>
                    </div>
                    <div class="header-left">
                        <div class="header-links">
                            <a href="javascript:void(0);" class="toggle-btn">
                                <span></span>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </header>
        <!-- Sidebar Start -->
        <aside class="sidebar-wrapper">
			<div class="logo-wrapper">
				<a href="/admin36" class="admin-logo" style="color: #fff ; font-size: 30px">
					{{-- <img src="assets/images/logo.png" alt="" class="sp_logo">
					<img src="assets/images/mini_logo.png" alt="" class="sp_mini_logo"> --}}
                    Feedback App
				</a>
			</div>
            <div class="side-menu-wrap">
                <ul class="main-menu">
                   
                    
                    <li>
                        <a href="/cat">
                            <span class="icon-dash">
                            </span>
                            <span class="menu-text">
                                Catigories
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="/item">
                            <span class="icon-dash">
                            </span>
                            <span class="menu-text">
                                Items
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="/user">
                            <span class="icon-dash">
                            </span>
                            <span class="menu-text">
                                Users
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- Container Start -->
        <div class="page-wrapper">
         <div class="main-content">
        @yield('content')
            <div class="ad-footer-btm">
                <p>Feedback App Developed by Ali Shair</p>
            </div>
         </div>
        </div>
    </div>


    <!-- Preview Setting Box -->
	<div class="slide-setting-box">
        <div class="slide-setting-holder">
            <div class="setting-box-head">
                <h4>Dashboard Demo</h4>
                <a href="javascript:void(0);" class="close-btn">Close</a>
            </div>
            <div class="setting-box-body">
				<div class="sd-light-vs"> 
					<a href="index-2.html">
						Light Version
						<img src="{{ asset('assets/images/light.png') }}" alt=""/>
					</a>
				</div>
				<div class="sd-light-vs"> 
					<a href="../splashdash-admin-template-dark/index.html">
						dark Version
						<img src="{{ asset('assets/images/dark.png') }}" alt=""/>
					</a>
				</div>
            </div>
			<div class="sd-color-op">
				<h5>color option</h5> 
				<div id="style-switcher">
					<div>
						<ul class="colors">
							<li>
								<p class='colorchange' id='color'>
								</p>
							</li>
							<li>
								<p class='colorchange' id='color2'>
								</p>
							</li>
							<li>
								<p class='colorchange' id='color3'>
								</p>
							</li>
							<li>
								<p class='colorchange' id='color4'>
								</p>
							</li>
							<li>
								<p class='colorchange' id='color5'>
								</p>
							</li>
							<li>
								<p class='colorchange' id='style'>
								</p>
							</li>
						</ul>
					</div>
				</div>
			</div>
        </div>
    </div>
    <!-- Preview Setting -->
	
	
    <!-- Script Start -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables.min.js') }}"></script>
	<script src="{{ asset('assets/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
	<!-- Page Specific -->
    <script src="{{ asset('assets/js/nice-select.min.js') }}"></script>
    <!-- Custom Script -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    @stack('script')
	<!-- </script> -->
    </body>
    </html>