<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Verification Email</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
       <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">

       <!-- Bootstrap Css -->
       <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
       <!-- Icons Css -->
       <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
       <!-- App Css-->
       <link href="{{asset('backend/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">
    
                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="index.html" class="auth-logo">
                                    <img src="{{asset('backend/assets/images/logo-dark.png')}}" height="30" class="logo-dark mx-auto" alt="">
                                    <img src="{{asset('backend/assets/images/logo-light.png')}}" height="30" class="logo-light mx-auto" alt="">
                                </a>
                            </div>
                        </div>
    
                        <h4 class="text-muted text-center font-size-18"><b>Verification Email</b></h4>
                        @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif
                        <div class="p-3">  

                                        <form class="form-horizontal mt-3" method="POST" action="{{ route('verification.send') }}">
                                            @csrf
                                    
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    'Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.'
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
    
                                <div class="form-group pb-2 text-center row mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Resend Verification Email</button>
                                    </div>
                                </div>
                            </form>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                    
                                <div class="form-group pb-2 text-center row mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Logout</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->
        

        <!-- JAVASCRIPT -->
        <script src="{{asset('backend/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('backend/assets/libs/node-waves/waves.min.js')}}"></script>

        <script src="{{asset('backend/assets/js/app.js')}}"></script>

    </body>
</html>

