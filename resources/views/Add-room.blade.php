@extends('userheader')
@section('content')

      <!-- choices css -->
        <link href="{{asset('libs/choices.js/public/assets/styles/choices.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- dropzone css -->
        <link href="{{asset('libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <form method="POST" action="/createRoom/{{$beachs->id}}" enctype='multipart/form-data'>
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
                                                        <h5 class="font-size-16 mb-1">معلومات الغرفة</h5>
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
                                                        <label class="form-label" for="category">نوع الغرفة</label>
                                                        <input id="category"  name="category" placeholder="" type="text" class="form-control"class="@error('category') is-invalid @enderror">
                                                        @error('category')
                                                        <div class="alert alert-danger alert-top-border alert-dismissible fade show">
                                                            {{ $message }}
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                                    @enderror

                                                    </div>
                                                    <div class="row">

                                                            <div class="mb-3">
                                                                <label class="form-label" for="number">رقم الغرفة</label>
                                                                <input id="number" name="number" placeholder="" type="text" class="form-control"class="@error('number') is-invalid @enderror">
                                                                @error('number')
                                                                <div class="alert alert-danger alert-top-border alert-dismissible fade show">
                                                                    {{ $message }}
                                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                </div>
                                                                            @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label" for="capacity">سعة الغرفة</label>
                                                                <input id="capacity" name="capacity" placeholder="" type="text" class="form-control"class="@error('capacity') is-invalid @enderror">
                                                                @error('capacity')
                                                                <div class="alert alert-danger alert-top-border alert-dismissible fade show">
                                                                    {{ $message }}
                                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                </div>
                                                                            @enderror
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label" for="one_day_price">السعر</label>
                                                                <input id="one_day_price" name="one_day_price" placeholder="" type="text" class="form-control"class="@error('one_day_price') is-invalid @enderror">
                                                                @error('one_day_price')
                                                                <div class="alert alert-danger alert-top-border alert-dismissible fade show">
                                                                    {{ $message }}
                                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                </div>
                                                                            @enderror
                                                            </div>
                                                        <!-- </div> -->
                                                    </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="card" dir="rtl">
                                        <a href="#addproduct-img-collapse" class="text-dark collapsed" data-bs-toggle="collapse" aria-expanded="false" aria-haspopup="true" aria-controls="addproduct-img-collapse">
                                            <div class="p-4">

                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                02
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="font-size-16 mb-1">صور الغرفة</h5>
                                                        <p class="text-muted text-truncate mb-0">املأ جميع المعلومات أدناه</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                    </div>

                                                </div>

                                            </div>
                                        </a>

                                        <div id="addproduct-img-collapse" class="collapse" data-bs-parent="#addproduct-accordion">
                                            <div class="p-4 border-top">
                                                <div class="dropzone">
                                                    <div class="fallback">
                                                        <input name="fileName[]" type="file" multiple="multiple">
                                                    </div>
                                                    <div class="dz-message needsclick">
                                                        <div class="mb-3">
                                                            <i class="display-4 text-muted mdi mdi-cloud-upload"></i>
                                                        </div>

                                                        <h4>قم بإسقاط الملفات هنا أو انقر للتحميل</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card" dir="rtl">
                                        <a href="#addproduct-metadata-collapse" class="text-dark collapsed" data-bs-toggle="collapse" aria-expanded="false" aria-haspopup="true" aria-controls="addproduct-metadata-collapse">
                                            <div class="p-4">

                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                03
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="font-size-16 mb-1">البيانات الوصفية</h5>
                                                        <p class="text-muted text-truncate mb-0">املأ جميع المعلومات أدناه</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                    </div>

                                                </div>

                                            </div>
                                        </a>

                                        <div id="addproduct-metadata-collapse" class="collapse" data-bs-parent="#addproduct-accordion">
                                            <div class="p-4 border-top">



                                                    <div class="mb-0">
                                                        <label class="form-label" for="content">محتويات الغرفة</label>
                                                        <textarea class="form-control"name="content" id="content" placeholder="Enter Description" rows="4"></textarea>

                                                    </div>

                                                    <div class="mb-0">
                                                        <label class="form-label" for="services">الخدمات</label>
                                                        <textarea class="form-control" name="services"id="services" placeholder="" rows="4"class="@error('services') is-invalid @enderror"></textarea>
                                                        @error('services')
                                                        <div class="alert alert-danger alert-top-border alert-dismissible fade show">
                                                            {{ $message }}
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                                    @enderror
                                                    </div>

                                                    <div class="mb-0">
                                                        <label class="form-label" for="description">الوصف</label>
                                                        <textarea class="form-control" name="description"id="description" placeholder="" rows="4"class="@error('description') is-invalid @enderror"></textarea>
                                                        @error('description')
                                                        <div class="alert alert-danger alert-top-border alert-dismissible fade show">
                                                            {{ $message }}
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                                    @enderror
                                                    </div>

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
                                <a href="#" class="btn btn-success"> <i class=" bx bx-file me-1"></i> اضافة </a> --}}
                                <button type="submit" class="btn btn-primary btn-block btn-lg" value="Register" name="publish">
                            <span>اضافة</span></button>
                            </div> <!-- end col -->
                        </div> <!-- end row-->
                        <!-- end row -->

                    </div> <!-- container-fluid -->

                </form>



        <!-- choices js -->
        <script src="{{asset('libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>

        <!-- dropzone plugin -->
        <script src="{{asset('libs/dropzone/min/dropzone.min.js')}}"></script>

        <!-- init js -->
        <script src="{{asset('js/pages/ecommerce-choices.init.js')}}"></script>

        <script src="{{asset('js/app.js')}}"></script>
@endsection
