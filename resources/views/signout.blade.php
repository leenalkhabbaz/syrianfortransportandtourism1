<!doctype html>
<html lang="ar">

    <head>

        <meta charset="utf-8" />
        <title>Signout | Vuesy - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
 integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

        <!-- Bootstrap Css -->
        <link href="{{asset('css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <div class="auth-bg-basic d-flex align-items-center min-vh-100">
            <div class="bg-overlay bg-light"></div>
            <div class="container">
                <div class="d-flex flex-column min-vh-100 py-5 px-3">
                    <!-- <div class="row justify-content-center">
                        <div class="col-xl-5">
                            <div class="text-center text-muted mb-2">
                                <div class="pb-3">
                                    <a href="index.html">
                                        <span class="logo-lg">
                                            <img src="assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">Vuesy</span>
                                        </span>
                                    </a>
                                    <p class="text-muted font-size-15 w-75 mx-auto mt-3 mb-0">User Experience &amp; Interface Design Strategy Saas Solution</p>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="row justify-content-center my-auto">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card bg-transparent shadow-none border-0">
                                <div class="card-body">
                                    <div class="py-3 text-center">
                                        <!-- <div class="avatar-lg mx-auto">
                                            <div class="avatar-title bg-soft-primary text-primary display-5 rounded-circle">

                                            </div>
                                        </div> -->
                                        <img src="{{asset('images/logo.png')}}" alt="" height="100">

                                        <div class="text-center mt-4 py-2">
                                            <h4>لقد قمت بتسجيل الخروج</h4>
                                            <br>
                                            <p>الشركة السورية للنقل والسياحة</p>
                                            <div class="mt-4">
                                                <a href="/login" class="btn btn-primary w-100">تسجيل الدخول </a>
                                            </div>
                                        </div>

                                        <!-- <div class="mt-4 text-center">
                                            <p class="text-muted mb-0">Don't have an account ? <a href="auth-signup-basic.html" class="fw-semibold text-decoration-underline"> Signup Now </a> </p>
                                        </div> -->
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div><!-- end row -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mt-4 mt-md-5 text-center">
                                <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> SSFT. Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://1.envato.market/themesdesign" target="_blank">Themesdesign</a></p>
                            </div>
                        </div>
                    </div> <!-- end row -->
                </div>
            </div>
            <!-- end container fluid -->
        </div>
        <!-- end authentication section -->

        <!-- JAVASCRIPT -->
        <script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('libs/metismenujs/metismenujs.min.js')}}"></script>
        <script src="{{asset('libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('libs/feather-icons/feather.min.js')}}"></script>

    </body>
</html>
