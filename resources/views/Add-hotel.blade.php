@extends('userheader')
@section('content')

      <!-- choices css -->
        <link href="{{asset('libs/choices.js/public/assets/styles/choices.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- dropzone css -->
        <link href="{{asset('libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <form method="POST" action="/createHotel" enctype='multipart/form-data'>
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
                                                        <h5 class="font-size-16 mb-1">معلومات الفندق</h5>
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
                                                    <label class="form-label" for="name">اسم الفندق</label>
                                                    <input id="beachname"  name="name" placeholder="" type="text" class="form-control"class="@error('name') is-invalid @enderror">
                                                    @error('name')
                                                    <div class="alert alert-danger alert-top-border alert-dismissible fade show">
                                                        {{ $message }}
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                                @enderror
                                                </div>
                                                <div class="row">

                                                        {{-- <div class="mb-3">
                                                            <a type="button"data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalScrollable">اختر الموقع من الخريطة </a>
                                                            <label class="form-label" for="address">الموقع</label>
                                                            <input id="address" name="address" placeholder="" type="text" class="form-control"class="@error('address') is-invalid @enderror">
                                                            @error('address')
                                                            <div class="alert alert-danger alert-top-border alert-dismissible fade show">
                                                                {{ $message }}
                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                                        @enderror
                                                        </div> --}}



                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <label class="form-label" for="address">الموقع</label>
                                                                <input id="address" name="address" placeholder="" type="text" class="form-control"class="@error('address') is-invalid @enderror">
                                                                @error('address')
                                                                <div class="alert alert-danger alert-top-border alert-dismissible fade show">
                                                                    {{ $message }}
                                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                </div>
                                                                            @enderror
                                                            </div>
                                                            <div class="col-lg-6">
                                                       <div class="mb-3">
                                                        <label class="form-label" for="address">اختر الموقع من الخريطة </label>
                                                        <br>
                                                            <button type="button"data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalScrollable"class="btn btn-soft-primary btn-block">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                                            انقر للعرض </button>

                                                   </div>
                                                </div>
                                                <!-- row -->
                                                        </div>

                                                        <div class="modal fade" id="exampleModalScrollable"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalScrollableTitle"></h5>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                            <div class="mapform">
                                                                                <div class="row">
                                                                                    <div class="col-5">
                                                                                        <input type="text" class="form-control" placeholder="lat" name="lat" id="lat" step="any">

                                                                                    </div>
                                                                                    <div class="col-5">
                                                                                        <input type="text" class="form-control" placeholder="lng" name="lng" id="lng" step="any">
                                                                                    </div>
                                                                                </div>

                                                                                <div id="map" style="height:400px; width: 800px;" class="my-3"></div>

                                                                                <script>
                                                                                    let map;

                                                                                    function initMap() {
                                                                                        map = new google.maps.Map(document.getElementById("map"), {
                                                                                            center: {
                                                                                                lat: 34.897293, lng:35.882514
                                                                                            }, // تعديل المركز الجغرافي لسوريا
                                                                                            zoom: 8,
                                                                                            scrollwheel: true,
                                                                                        });

                                                                                        const syriaBounds = new google.maps.LatLngBounds(
                                                                                            new google.maps.LatLng(32.0105, 35.5752), // أقصى الحد الجنوبي والغربي
                                                                                            new google.maps.LatLng(37.3193, 42.3752) // أقصى الحد الشمالي والشرقي
                                                                                        );

                                                                                        let marker = new google.maps.Marker({
                                                                                            position: syriaBounds.getCenter(),
                                                                                            map: map,
                                                                                            draggable: true,
                                                                                        });

                                                                                        map.fitBounds(syriaBounds);

                                                                                        google.maps.event.addListener(marker, 'position_changed', function() {
                                                                                            let lat = marker.position.lat();
                                                                                            let lng = marker.position.lng();
                                                                                            $('#lat').val(lat);
                                                                                            $('#lng').val(lng);
                                                                                        });

                                                                                        google.maps.event.addListener(map, 'click', function(event) {
                                                                                            pos = event.latLng;
                                                                                            marker.setPosition(pos);
                                                                                        });
                                                                                    }
                                                                                </script>
                                                                                <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script>
                                                                            </div>


                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->
                                                        {{-- <div class="mb-3">
                                                        <label for="example-number-input" class="col-md-2 col-form-label" >عدد الغرف</label>

                                                            <input class="form-control" type="number" value="" id="example-number-input"name="number_of_room"class="@error('number_of_room') is-invalid @enderror">
                                                            @error('number_of_room')
                                                            <div class="alert alert-danger alert-top-border alert-dismissible fade show">
                                                                {{ $message }}
                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                                        @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                        <label for="example-tel-input" class="col-md-2 col-form-label">رقم الهاتف</label>
                                                    <input class="form-control" type="tel" value="" id="example-tel-input"name="phone_number"class="@error('phone_number') is-invalid @enderror">
                                                    @error('phone_number')
                                                    <div class="alert alert-danger alert-top-border alert-dismissible fade show">
                                                        {{ $message }}
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                                @enderror
                                                        </div> --}}

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="example-number-input" class="col-md-2 col-form-label" >عدد الغرف</label>

                                                            <input class="form-control" type="number" value="" id="example-number-input"name="number_of_room"class="@error('number_of_room') is-invalid @enderror">
                                                            @error('number_of_room')
                                                            <div class="alert alert-danger alert-top-border alert-dismissible fade show">
                                                                {{ $message }}
                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                                        @enderror
                                                       </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                       <div class="mb-3">
                                                        <label for="example-tel-input" class="col-md-2 col-form-label">رقم الهاتف</label>
                                                        <input class="form-control" type="tel" value="" id="example-tel-input"name="phone_number"class="@error('phone_number') is-invalid @enderror">
                                                        @error('phone_number')
                                                        <div class="alert alert-danger alert-top-border alert-dismissible fade show">
                                                            {{ $message }}
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                                    @enderror  </div>
                                                </div>
                                                <!-- row -->
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
                                                        <h5 class="font-size-16 mb-1">صور الفندق</h5>
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
                                                    <label class="form-label" for="description">الوصف</label>
                                                    <textarea class="form-control" name="description" type="text"id="metadescription" placeholder="" rows="4"class="@error('description') is-invalid @enderror"></textarea>
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


       <script src="{{asset('js/pages/form-validation.init.js')}}"></script>

       <script src="{{asset('js/app.js')}}"></script>

@endsection
