@extends('userheader')
@section('content')
        <!-- choices css -->
        <link href="{{asset('libs/choices.js/public/assets/styles/choices.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- dropzone css -->
        <link href="{{asset('libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <form method="POST" action="/editBeach/{{$beach->id}}" enctype='multipart/form-data'>
            @method('POST')
            @csrf
            <!-- ============================================================== -->

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
                                                        <h5 class="font-size-16 mb-1">معلومات الشاطئ</h5>
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
                                                    <label class="form-label" for="name">اسم الشاطئ</label>
                                                    <input id="beachname"  name="name"  value ="{{$beach_name}}"placeholder="" type="text" class="form-control">

                                                </div>
                                                <div class="row">

                                                        <div class="mb-3">
                                                            <label class="form-label" for="adress">الموقع</label>
                                                            <input id="adress" name="address" value="{{$beach_address}}" placeholder="" type="text" class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                        <label for="example-number-input" class="col-md-2 col-form-label" >عدد الغرف</label>

                                                            <input class="form-control" type="number" value="{{$beach_number_of_room}}" id="example-number-input"name="number_of_room">
                                                        </div>
                                                        <div class="mb-3">
                                                        <label for="example-tel-input" class="col-md-2 col-form-label">رقم الهاتف</label>
                                                    <input class="form-control" type="tel" value="{{$beach_phone_number}}" id="example-tel-input"name="phone_number">
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
                                                        <h5 class="font-size-16 mb-1">صور الشاطئ</h5>
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
                                                    @foreach ($beach->images as $image)
                                                    <img src="{{asset('storage/pic/'.$image->url)}}" class="rounded"  width="200" height="200"alt="tag">
                                                    @endforeach
                                                    </div>
                                                    <div class="fallback">
                                                        <input id="fileName"name="fileName[]" type="file"value="{{asset('storage/pic/'.$image->url)}}" multiple="multiple">
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
                                                    <label class="form-label" for="description">الوصف</label>
                                                    <textarea class="form-control" name="description" type="text"id="metadescription" placeholder="" rows="4"> {{ old('description', $beach_description) }}</textarea>
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
                                <a href="#" class="btn btn-success"> <i class=" bx bx-file me-1"></i> تعديل </a> --}}
                                <button type="submit" class="btn btn-primary btn-block btn-lg" value="Register" name="publish">
                            <span>تعديل</span></button>
                            </div> <!-- end col -->
                        </div> <!-- end row-->
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
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
