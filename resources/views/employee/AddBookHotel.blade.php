@extends('userheader')
@section('content')
        <!-- choices css -->
        <link href="{{asset('libs/choices.js/public/assets/styles/choices.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- dropzone css -->
        <link href="{{asset('libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <form method="POST" action="/create_book_hotel/{{$room->id}}" enctype='multipart/form-data'>
            @method('POST')
            @csrf
            <!-- ============================================================== -->
            {{-- <div class="main-content">

                <div class="page-content"> --}}
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-lg-12">
                                <div id="addproduct-accordion" class="custom-accordion">
                                    <div class="card" dir="rtl">
                                        <a href="#addproduct-billinginfo-collapse" class="text-dark" data-bs-toggle="collapse" aria-expanded="true" aria-controls="addproduct-billinginfo-collapse">
                                            <div class="p-4">

                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                01
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="font-size-16 mb-1">معلومات </h5>
                                                        <p class="text-muted text-truncate mb-0">املأ جميع المعلومات أدناه</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                    </div>

                                                </div>

                                            </div>
                                        </a>

                                        <div id="addproduct-billinginfo-collapse" class="collapse show" data-bs-parent="#addproduct-accordion">
                                            <div class="p-4 border-top"dir="rtl">

                                                <div class="mb-3" >
                                                    <label class="form-label" for="user_name">اسم الشخص</label>
                                                    <input id="user_name"  name="user_name" placeholder="" type="text" class="form-control"class="@error('user_name') is-invalid @enderror">
                                                    @error('user_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror

                                                </div>
                                                <div class="row">

                                                        <div class="mb-3" dir="rtl">
                                                            <label class="form-label" for="adress">تاريخ بداية الحجز</label>
                                                            <input id="adress" name="start_date" placeholder="" type="date"  class="form-control">
                                                        </div>
                                                        <div class="mb-3" dir="rtl">
                                                        <label for="example-number-input" class="col-md-2 col-form-label" >تاريخ نهاية الحجز </label>

                                                            <input class="form-control" type="date" value="" id="example-number-input"name="end_date">
                                                        </div>
                                                        <div class="mb-3">
                                                        <label for="example-tel-input" class="col-md-2 col-form-label">رقم الهاتف</label>
                                                    <input class="form-control" type="tel" value="" id="example-tel-input"name="user_phone">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="persons_count" class="col-md-2 col-form-label">عدد الاشخاص  </label>
                                                        <input class="form-control" type="number" value="" id="persons_count"name="persons_count">
                                                            </div>
                                                        {{-- <div class="mb-3">
                                                        <label for="example-tel-input" class="col-md-2 col-form-label">السعر النهائي </label>
                                                    <input class="form-control" type="number" value="" id="example-tel-input"name="total_price">
                                                        </div> --}}


                                            </div>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-4">
                            <div class="col text-end">
                                {{-- <a href="#" class="btn btn-danger"> <i class="bx bx-x me-1"></i> إلغاء </a>
                                <a href="" class="btn btn-success"> <i class=" bx bx-file me-1"></i> اضافة </a> --}}
                                <button type="submit" class="btn btn-primary btn-block btn-lg" value="Register" name="publish">
                            <span>اضافة</span></button>
                            </div> <!-- end col -->
                        </div> <!-- end row-->
                        <!-- end row -->

                    </div> <!-- container-fluid -->

                <!-- End Page-content -->
                </form>


        <!-- choices js -->
        <script src="{{asset('libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>

        <!-- dropzone plugin -->
        <script src="{{asset('libs/dropzone/min/dropzone.min.js')}}"></script>

        <!-- init js -->
        <script src="{{asset('js/pages/ecommerce-choices.init.js')}}"></script>

        <script src="{{asset('js/app.js')}}"></script>
@endsection
