<!DOCTYPE html>
<html lang="en" dir="rtl">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Admitro - Admin Panel HTML template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="admin panel ui, user dashboard template, web application templates, premium admin templates, html css admin templates, premium admin templates, best admin template bootstrap 4, dark admin template, bootstrap 4 template admin, responsive admin template, bootstrap panel template, bootstrap simple dashboard, html web app template, bootstrap report template, modern admin template, nice admin template"/>

		<!-- Title -->
		<title>Clickshare</title>

		<!--Favicon -->
		<link rel="icon" href="{{ asset('assets/images/brand/favicon.ico') }}" type="image/x-icon"/>

		<!--Bootstrap css -->
		<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

		<!-- Style css -->
		<link href="{{ asset('assets/css-rtl/style.css') }}" rel="stylesheet" />
		<link href="{{ asset('assets/css-rtl/dark.css') }}" rel="stylesheet" />
		<link href=".{{ asset('assets/css-rtl/skin-modes.css') }}" rel="stylesheet" />

		<!-- Animate css -->
		<link href="{{ asset('assets/css-rtl/animated.css') }}" rel="stylesheet" />

		<!-- P-scroll bar css-->
		<link href="{{ asset('assets/plugins/p-scrollbar/p-scrollbar.css') }}" rel="stylesheet" />

		<!---Icons css-->
		<link href="{{ asset('assets/css-rtl/icons.css') }}" rel="stylesheet" />

		<!-- INTERNAl Forn-wizard css-->
		<!-- <link href="../../assets/plugins/forn-wizard/css/forn-wizard.css" rel="stylesheet" />
		<link href="../../assets/plugins/formwizard/smart_wizard.css" rel="stylesheet">
		<link href="../../assets/plugins/formwizard/smart_wizard_theme_dots-rtl.css" rel="stylesheet"> -->

	    <!-- Color Skin css -->
		<link id="theme" href="{{ asset('assets/colors-rtl/color1.css') }}" rel="stylesheet" type="text/css"/>

	    <!-- New css -->
		<!-- <link href="./newStyle.css" rel="stylesheet" />
		<link href="./Form_.css" rel="stylesheet" /> -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link href="{{ asset('assets/css-rtl/frontend.css') }}" rel="stylesheet" />
	</head>
	<body class="app" style="background-color: #162e4d; color: #fff;">
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="firefly"></div>
        <div class="container">

            <!--Row -->
            <div class="row align-items-center vh-100 mt-5">
                <div class="col-12">
                    <img src="{{ asset('assets/images/logo-02.png') }}" alt="logo" style="height: 100px; font-weight: 600;">
                </div>
                <div class="col-md-8">
                    <h1>عارفين انك جيت هنا
                        <br>علشان تعرف تفاصيل أكتر!</h1>
                        <br>
                        <h1 style="color: #5084E4;">
                            قدامك اختيار من اتنين
                        </h1>
                        <ul class=" list-group-light m-9 m-5">
                            <li><h2 class="tNum"><span class="num">1</span>ارجع للسوشيال ميديا واعرف مع بقية الناس.</h2></li>
                            <li><h2 class="tNum"><span class="num">2</span>سجل بياناتك واعرف قبلهم وأكيد هيكونلك مميزات عنهم.</h2></li>
                        </ul>
                        {{-- https://docs.google.com/forms/d/e/1FAIpQLSc9pr9t_CRrSDSf0VUAkQjytrPogM07QSh1mFIGNL1E6G8OEA/viewform?usp=sf_link" --}}
                          <a href="{{ route('view.account') }}" target="_blank" class="btn btn-primary btn-lg" role="button" aria-pressed="true">سجل هنا</a>

                </div>
            </div>
    </body>
</html>
