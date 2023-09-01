<!doctype html>
<html lang="ar">

    <head>

        <meta charset="utf-8" />
        <title>Starter Page | Vuesy - Admin & Dashboard Template</title>
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
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    </head>


    <body data-layout="horizontal" data-topbar="dark">

    <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">


                    <div class="d-flex">
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-search icon-sm"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
                                <form class="p-2">
                                    <div class="search-box">
                                        <div class="position-relative">
                                            <input type="text" class="form-control rounded bg-light border-0" placeholder="Search...">
                                            <i class="bx bx-search search-icon"></i>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>



                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon" id="page-header-notifications-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-bell icon-sm"></i>
                                <span class="noti-dot bg-danger rounded-pill">3</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="m-0 font-size-15"> Notifications </h5>
                                        </div>
                                        <div class="col-auto">
                                            <a href="javascript:void(0);" class="small"> Mark all as read</a>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 250px;">
                                    <h6 class="dropdown-header bg-light">New</h6>
                                    <a href="" class="text-reset notification-item">
                                        <div class="d-flex border-bottom align-items-start">
                                            <div class="flex-shrink-0">
                                                <img src="assets/images/users/avatar-3.jpg"
                                                class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Justin Verduzco</h6>
                                                <div class="text-muted">
                                                    <p class="mb-1 font-size-13">Your task changed an issue from "In Progress" to <span class="badge badge-soft-success">Review</span></p>
                                                    <p class="mb-0 font-size-10 text-uppercase fw-bold"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="" class="text-reset notification-item">
                                        <div class="d-flex border-bottom align-items-start">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-sm me-3">
                                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                        <i class="uil-shopping-basket"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">New order has been placed</h6>
                                                <div class="text-muted">
                                                    <p class="mb-1 font-size-13">Open the order confirmation or shipment confirmation.</p>
                                                    <p class="mb-0 font-size-10 text-uppercase fw-bold"><i class="mdi mdi-clock-outline"></i> 5 hours ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <h6 class="dropdown-header bg-light">Earlier</h6>
                                    <a href="" class="text-reset notification-item">
                                        <div class="d-flex border-bottom align-items-start">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-sm me-3">
                                                    <span class="avatar-title bg-soft-success text-success rounded-circle font-size-16">
                                                        <i class="uil-truck"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Your item is shipped</h6>
                                                <div class="text-muted">
                                                    <p class="mb-1 font-size-13">Here is somthing that you might light like to know.</p>
                                                    <p class="mb-0 font-size-10 text-uppercase fw-bold"><i class="mdi mdi-clock-outline"></i> 1 day ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="" class="text-reset notification-item">
                                        <div class="d-flex border-bottom align-items-start">
                                            <div class="flex-shrink-0">
                                                <img src="assets/images/users/avatar-4.jpg"
                                                    class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Salena Layfield</h6>
                                                <div class="text-muted">
                                                    <p class="mb-1 font-size-13">Yay ! Everything worked!</p>
                                                    <p class="mb-0 font-size-10 text-uppercase fw-bold"><i class="mdi mdi-clock-outline"></i> 3 days ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2 border-top d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                                        <i class="uil-arrow-circle-right me-1"></i> <span>View More..</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle" id="right-bar-toggle">
                                <i class="bx bx-cog icon-sm"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle" id="right-bar-toggle">                            <i class="bx bx-home-circle icon-sm"></i>
                        </button>
                    </div>


                    </div>
                    <div class="d-flex">

                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('images/logo.png')}}" alt="" height="90">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('images/logo.png')}}" alt="" height="90"> <span class="logo-txt">STTF</span>
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('images/logo.png')}}" alt="" height="90">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('images/logo.png')}}" alt="" height="90"> <span class="logo-txt">STTF</span>
                                </span>
                            </a>
                        </div>
                     <!-----------------------------end logo--------------------------------------------- -->

                    </div>
                    <!-- //////// -->
                </div>
                <!-- --------------------------------------------------- -->

                <div class="collapse show dash-content" id="dashtoggle">
                    <div class="container-fluid">
                <div class="navbar-header">
                    <div class="d-flex">

                        <div class="topnav">
                            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                                <div class="collapse navbar-collapse" id="topnav-menu-content">
                                    <ul class="navbar-nav">

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button"
                                            >
                                                <i class="bx bx-layer icon"></i>
                                                <span data-key="t-components">النقل</span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-components">
                                                <a href="layout-vertical.html" class="dropdown-item" data-key="t-vertical"> عرض خطوط النقل</a>
                                                <a href="layout-vertical.html" class="dropdown-item" data-key="t-vertical"> عرض الحجوزات</a>

                                            </div>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
                                                <i class="bx bx-customize icon"></i>
                                                <span data-key="t-apps">الشواطئ</span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-pages">

                                                <a href="Show-beachs-employee.html" class="dropdown-item" data-key="t-calendar">عرض الشواطئ</a>
                                                <a href="Show-beach-resevration.html" class="dropdown-item" data-key="t-chat">عرض الحجوزات</a>

                                            </div>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button"
                                            >
                                                <i class="bx bx-layer icon"></i>
                                                <span data-key="t-components">الفنادق</span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-components">
                                                <a href="layout-vertical.html" class="dropdown-item" data-key="t-vertical"> عرض الفنادق</a>
                                                <a href="layout-vertical.html" class="dropdown-item" data-key="t-vertical"> عرض الحجوزات</a>

                                            </div>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button"
                                            >
                                                <i class="bx bx-file icon"></i>
                                                <span data-key="t-pages">الرحلات</span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-more">


                                                <a href="layout-vertical.html" class="dropdown-item" data-key="t-vertical">عرض الرحلات</a>
                                                <a href="layout-vertical.html" class="dropdown-item" data-key="t-vertical"> اضافة رحلة</a>
                                                <a href="layout-vertical.html" class="dropdown-item" data-key="t-vertical"> عرض الحجوزات</a>
                                                <div class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-pricing"
                                                        role="button">
                                                        <span data-key="t-pricing">التصويت</span>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="topnav-pricing">
                                                        <a href="pricing-basic.html" class="dropdown-item" data-key="t-basic">اضافة تصويت</a>
                                                        <a href="pricing-table.html" class="dropdown-item" data-key="t-table">عرض التصويتات</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button"
                                            >
                                                <i class="bx bx-file icon"></i>
                                                <span data-key="t-pages">الاعلانات</span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-more">


                                                <a href="layout-vertical.html" class="dropdown-item" data-key="t-vertical">اضافة اعلان</a>
                                                <a href="layout-vertical.html" class="dropdown-item" data-key="t-vertical"> عرض الاعلانات</a>

                                            </div>
                                        </li>



                                    </ul>
                                </div>
                            </nav>
                        </div>

                    </div>

                </div>
  <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item" data-bs-toggle="collapse" id="horimenu-btn" data-bs-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

            </div>
                </div>

                 <!-- ----------End nav22222222222------------------------------------- -->



                  <!-- start dash troggle-icon -->
                  <div>
                    <a class="dash-troggle-icon" id="dash-troggle-icon" data-bs-toggle="collapse" href="#dashtoggle" aria-expanded="true" aria-controls="dashtoggle">
                        <i class="bx bx-up-arrow-alt"></i>
                    </a>
                </div>
              <!-- end dash troggle-icon -->

            </header>

            <div class="hori-overlay"></div>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row justify-content-center my-auto">
                            <div class="col-md-8 col-lg-6 col-xl-7">
                                <div class="card bg-transparent shadow-none border-0">
                                    <div class="card-body">
                                        <div class="px-3 py-3 text-center">
                                            <h6 class="error-title"style="color:#D46416"><span class="blink-infinite">لا يمكنك تسجيل الدخول   </span></h6>
                                               <p class="font-size-15 mx-auto text-muted w-75 mt-4">يرجى التأكد من صحة البريد الالكتروني مرة اخرى</p>
                                            <!-- <h4 class="text-uppercase">Internal Server Error</h4> -->

                                            <!-- <div class="mt-5 text-center">
                                                <a class="btn btn-primary waves-effect waves-light" href="index.html">Back to Dashboard</a>
                                            </div> -->
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div><!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> &copy; Vuesy.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://1.envato.market/themesdesign" target="_blank">Themesdesign</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->



        <!-- JAVASCRIPT -->
        <script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('libs/metismenujs/metismenujs.min.js')}}"></script>
        <script src="{{asset('libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('libs/feather-icons/feather.min.js')}}"></script>

        <script src="{{asset('js/app.js')}}"></script>

    </body>
</html>
