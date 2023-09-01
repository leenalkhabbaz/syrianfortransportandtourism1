
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- App favicon -->
  <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
  <!-- swiper css -->
  <link rel="stylesheet" href="{{asset('libs/swiper/swiper-bundle.min.css')}}">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

  <!-- Bootstrap Css -->
  <link href="{{asset('css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />

  <!-- Icons Css -->
  <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="{{asset('css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


</head>
<body>
    <body data-layout="horizontal" data-topbar="dark"id="app">

        <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">


                    <div class="d-flex">


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
                                                <p class="mb-1 font-size-13">Your task changed an issue from "In
                                                    Progress" to <span class="badge badge-soft-success">Review</span>
                                                </p>
                                                <p class="mb-0 font-size-10 text-uppercase fw-bold"><i
                                                        class="mdi mdi-clock-outline"></i> 1 hours ago</p>
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
                                                <p class="mb-1 font-size-13">Open the order confirmation or shipment
                                                    confirmation.</p>
                                                <p class="mb-0 font-size-10 text-uppercase fw-bold"><i
                                                        class="mdi mdi-clock-outline"></i> 5 hours ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <h6 class="dropdown-header bg-light">Earlier</h6>
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex border-bottom align-items-start">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-sm me-3">
                                                <span
                                                    class="avatar-title bg-soft-success text-success rounded-circle font-size-16">
                                                    <i class="uil-truck"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Your item is shipped</h6>
                                            <div class="text-muted">
                                                <p class="mb-1 font-size-13">Here is somthing that you might light like
                                                    to know.</p>
                                                <p class="mb-0 font-size-10 text-uppercase fw-bold"><i
                                                        class="mdi mdi-clock-outline"></i> 1 day ago</p>
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
                                                <p class="mb-0 font-size-10 text-uppercase fw-bold"><i
                                                        class="mdi mdi-clock-outline"></i> 3 days ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2 border-top d-grid">
                                <a class="btn btn-sm btn-link font-size-14 btn-block text-center"
                                    href="javascript:void(0)">
                                    <i class="uil-arrow-circle-right me-1"></i> <span>View More..</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                       <a href="/logout" >
                         <button type="button" class="btn header-item noti-icon right-bar-toggle" id="right-bar-toggle "data-bs-toggle="tooltip" data-bs-placement="bottom" title="تسجيل خروج">
                            <i class="bx bx-user-x fa-4x icon-sm"></i>
                        </button>
                       </a>
                    </div>

                    <div class="dropdown d-inline-block">
                        <a href="/chart-js" >
                        <button type="button" class="btn header-item noti-icon right-bar-toggle" id="right-bar-toggle "data-bs-toggle="tooltip" data-bs-placement="bottom" title=" تقارير الشواطئ ">
                            <i class="bx bx-home-circle icon-sm"></i>
                        </button>
                        </a>
                    </div>
                    <div class="dropdown d-inline-block">
                        <a href="/hotelcount" >
                        <button type="button" class="btn header-item noti-icon right-bar-toggle" id="right-bar-toggle "data-bs-toggle="tooltip" data-bs-placement="bottom" title=" تقارير الفنادق ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        </button>
                        </a>
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
@role('admin')


            <div class="collapse show dash-content" id="dashtoggle">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <div class="d-flex">

                            <div class="topnav">
                                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                                        <ul class="navbar-nav">

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle arrow-none" href="#"
                                                    id="topnav-components" role="button">
                                                    <i class="bx bx-bus icon"></i>
                                                    <span data-key="t-components">النقل</span>
                                                    <!-- <div class="arrow-down"></div> -->
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-components">
                                                    <a href="/street" class="dropdown-item"
                                                        data-key="t-vertical"> عرض خطوط النقل</a>
                                                    <a href="/street" class="dropdown-item"
                                                        data-key="t-vertical"> اضافة خط نقل </a>



                                                </div>
                                            </li>

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle arrow-none" href="#"
                                                    id="topnav-pages" role="button">
                                                    <i class="bx bx-customize icon"></i>
                                                    <span data-key="t-apps">الشواطئ</span>
                                                    <!-- <div class="arrow-down"></div> -->
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-pages">

                                                    <a href="/ShowAllBeach" class="dropdown-item"
                                                        data-key="t-calendar">عرض الشواطئ</a>
                                                    <a href="/home" class="dropdown-item"
                                                        data-key="t-chat"> اضافة شاطئ</a>

                                                </div>
                                            </li>

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle arrow-none" href="#"
                                                    id="topnav-components" role="button">
                                                    <i class="bx bx-layer icon"></i>
                                                    <span data-key="t-components">الفنادق</span>
                                                    <!-- <div class="arrow-down"></div> -->
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-components">
                                                    <a href="/ShowAllHotel" class="dropdown-item"
                                                        data-key="t-vertical"> عرض الفنادق</a>
                                                    <a href="/show_form_hotel" class="dropdown-item"
                                                        data-key="t-vertical"> اضافة فندق</a>

                                                </div>
                                            </li>

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more"
                                                    role="button">
                                                    <i class="bx bx-globe icon"></i>
                                                    <span data-key="t-pages">الرحلات</span>
                                                    <!-- <div class="arrow-down"></div> -->
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-more">


                                                    <a href="/show_trip" class="dropdown-item"
                                                        data-key="t-vertical">عرض الرحلات</a>


                                                </div>
                                            </li>

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more"
                                                    role="button">
                                                    <i class="bx bx-user icon"></i>
                                                    <span data-key="t-pages">الموظفين</span>
                                                    <!-- <div class="arrow-down"></div> -->
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="topnav-more">


                                                    <a href="/to" class="dropdown-item"
                                                        data-key="t-vertical">اضافة موظف</a>
                                                        <a href="/showaddrole" class="dropdown-item"
                                                        data-key="t-vertical">اضافة دور للموظف</a>

                                                </div>
                                            </li>



                                        </ul>
                                    </div>
                                </nav>
                            </div>

                        </div>

                    </div>
                    <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item"
                        data-bs-toggle="collapse" id="horimenu-btn" data-bs-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                </div>
            </div>
            @endrole


            {{-- employeeeeee --}}
@role('employee1')
<div class="collapse show dash-content" id="dashtoggle">
    <div class="container-fluid">
<div class="navbar-header">
    <div class="d-flex">

        <div class="topnav ">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button"
                            >
                                <i class="bx bx-bus icon"></i>
                                <span data-key="t-components">النقل</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-components">
                                <a href="/street" class="dropdown-item" data-key="t-vertical"> عرض خطوط النقل</a>
                                {{-- <a href="layout-vertical.html" class="dropdown-item" data-key="t-vertical"> عرض الحجوزات</a> --}}

                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
                                <i class="bx bx-customize icon"></i>
                                <span data-key="t-apps">الشواطئ</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-pages">

                                <a href="/ShowAllBeach" class="dropdown-item" data-key="t-calendar">عرض الشواطئ</a>
                                <a href="/showallbook" class="dropdown-item" data-key="t-chat">عرض الحجوزات</a>

                            </div>
                        </li>


                                <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button"
                            >
                                <i class="bx bx-layer icon"></i>
                                <span data-key="t-components">الفنادق</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-components">
                                <a href="/ShowAllHotel" class="dropdown-item" data-key="t-vertical"> عرض الفنادق</a>
                                <a href="/showallbookHotel" class="dropdown-item" data-key="t-vertical"> عرض الحجوزات</a>

                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button"
                            >
                                <i class="bx bx-globe icon"></i>
                                <span data-key="t-pages">الرحلات</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-more">


                                <a href="/show_trip" class="dropdown-item" data-key="t-vertical">عرض الرحلات</a>
                                <a href="/showtrip" class="dropdown-item" data-key="t-vertical"> اضافة رحلة</a>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-pricing"
                                        role="button">
                                        <span data-key="t-pricing">التصويت</span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-pricing">
                                        <a href="/show_form_vote" class="dropdown-item" data-key="t-basic">اضافة تصويت</a>
                                        <a href="/ShowVotes" class="dropdown-item" data-key="t-table">عرض التصويتات</a>
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


                                <a href="/show_form_Ads" class="dropdown-item" data-key="t-vertical">اضافة اعلان</a>
                                <a href="/ShowAllADS" class="dropdown-item" data-key="t-vertical"> عرض الاعلانات</a>

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

@endrole
            {{-- end employee --}}
            <!-- ----------End nav22222222222------------------------------------- -->



            <!-- start dash troggle-icon -->
            <div>
                <a class="dash-troggle-icon" id="dash-troggle-icon" data-bs-toggle="collapse" href="#dashtoggle"
                    aria-expanded="true" aria-controls="dashtoggle">
                    <i class="bx bx-up-arrow-alt"></i>
                </a>
            </div>
            <!-- end dash troggle-icon -->

        </header>

        <div class="hori-overlay"></div>

        <main class="py-4">
            @yield('content1')
        </main>
    </div>
</div>

    <script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('libs/metismenujs/metismenujs.min.js')}}"></script>
    <script src="{{asset('libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('libs/feather-icons/feather.min.js')}}"></script>



</body>
</html>
