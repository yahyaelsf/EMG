<!DOCTYPE html>
<html lang="en" dir="rtl" direction="rtl" style="direction: rtl">


<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">


    <link href="{{ asset('dashboard-assets/css/pages/login/login-3.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard-assets/plugins/global/plugins.rtl.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('dashboard-assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('dashboard-assets/css/skins/header/base/light.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard-assets/css/skins/header/menu/light.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard-assets/css/skins/brand/dark.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard-assets/css/skins/aside/dark.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}" />
</head>


<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">


    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-color:#000">
                <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                    <div class="kt-login__container">
                        <div class="kt-login__logo">
                            <a href="#">
                                <svg width="173" height="162" viewBox="0 0 173 162" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.7184 23.6053V27.1325H46.5466V36.0862H0.0144043V2.1706H46.5466V11.1243H17.7184V14.6515H46.5466V23.6053H17.7184ZM83.0093 29.3031L69.0361 20.519L67.0351 36.0862H49.3311L53.7062 2.1706H71.4102L83.0093 11.5991L94.6085 2.1706H112.313L116.688 36.0862H98.9837L96.9486 20.519L83.0093 29.3031ZM154.584 22.7235V21.9773H146.24V19.1623L173 19.1284C173 29.6762 161.028 38.2568 146.24 38.2568C131.453 38.2568 119.481 29.6762 119.481 19.1284C119.481 8.58065 131.453 0 146.24 0C159.298 0 170.151 6.71529 172.525 15.5334H154.584C152.888 13.3967 149.802 11.9722 146.24 11.9722C140.882 11.9722 136.575 15.1942 136.575 19.1284C136.575 23.0965 140.882 26.3185 146.24 26.3185C149.802 26.3185 152.888 24.8941 154.584 22.7235Z"
                                        fill="white"></path>
                                    <path
                                        d="M88.7602 161.574C117.169 161.574 140.199 138.544 140.199 110.135C140.199 81.7267 117.169 58.6968 88.7602 58.6968C60.3514 58.6968 37.3215 81.7267 37.3215 110.135C37.3215 138.544 60.3514 161.574 88.7602 161.574Z"
                                        fill="#CA0000"></path>
                                    <path
                                        d="M88.7605 150.715C111.172 150.715 129.34 132.547 129.34 110.136C129.34 87.7242 111.172 69.5562 88.7605 69.5562C66.3492 69.5562 48.1812 87.7242 48.1812 110.136C48.1812 132.547 66.3492 150.715 88.7605 150.715Z"
                                        fill="#DE4040"></path>
                                    <path
                                        d="M88.7602 142.142C106.437 142.142 120.766 127.812 120.766 110.136C120.766 92.4591 106.437 78.1294 88.7602 78.1294C71.0836 78.1294 56.7539 92.4591 56.7539 110.136C56.7539 127.812 71.0836 142.142 88.7602 142.142Z"
                                        fill="#EC8B8B"></path>
                                    <path
                                        d="M88.7602 136.426C103.28 136.426 115.051 124.655 115.051 110.135C115.051 95.6151 103.28 83.8442 88.7602 83.8442C74.2401 83.8442 62.4692 95.6151 62.4692 110.135C62.4692 124.655 74.2401 136.426 88.7602 136.426Z"
                                        fill="#F5C4C4"></path>
                                    <path
                                        d="M88.76 130.71C100.124 130.71 109.336 121.498 109.336 110.135C109.336 98.771 100.124 89.5591 88.76 89.5591C77.3965 89.5591 68.1846 98.771 68.1846 110.135C68.1846 121.498 77.3965 130.71 88.76 130.71Z"
                                        fill="#FFECEC"></path>
                                    <path
                                        d="M88.7604 120.423C94.4422 120.423 99.0481 115.817 99.0481 110.135C99.0481 104.453 94.4422 99.8472 88.7604 99.8472C83.0786 99.8472 78.4727 104.453 78.4727 110.135C78.4727 115.817 83.0786 120.423 88.7604 120.423Z"
                                        fill="white"></path>
                                    <path
                                        d="M88.7605 161.574C117.169 161.574 140.199 138.544 140.199 110.135C140.199 81.7266 117.169 58.6968 88.7605 58.6968V161.574Z"
                                        fill="white" fill-opacity="0.3"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="kt-login__signin">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title" style="color: #fff">لوحة التحكم | تسجيل الدخول</h3>
                            </div>

                            <form class="kt-form" method="post" action="{{ route('admin.post_login') }}">

                                @if ($errors->all())
                                    <div class="alert alert-danger d-block">

                                        <div>
                                            <h5>{{ __('alerts.validation_errors', ['count' => count($errors)]) }}</h5>
                                        </div>

                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if (isset($loginError))
                                    <div class="alert alert-danger">
                                        {{ $loginError }}
                                    </div>
                                @endif


                                @csrf
                                <input type="hidden" name="s_timezone" id="user-timezone">

                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="@lang('general.email')"
                                        name="s_email" autocomplete="off">
                                </div>
                                <div class="input-group">
                                    <input class="form-control" type="password" placeholder="@lang('general.password')"
                                        name="s_password">
                                </div>
                                <div class="kt-login__actions" style="border: unset">
                                    <button id="kt_login_signin_submit" class="btn btn-block btn-success" style="color: #fff ; background-color: #f90000 ;border: unset">تسجيل الدخول
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#5d78ff",
                    "dark": "#282a3c",
                    "light": "#ffffff",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": [
                        "#c5cbe3",
                        "#a1a8c3",
                        "#3d4465",
                        "#3e4466"
                    ],
                    "shape": [
                        "#f0f3ff",
                        "#d9dffa",
                        "#afb4d4",
                        "#646c9a"
                    ]
                }
            }
        };
    </script>


    <script src="{{ asset('dashboard-assets/plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dashboard-assets/js/scripts.bundle.js') }}" type="text/javascript"></script>

</body>

</html>
