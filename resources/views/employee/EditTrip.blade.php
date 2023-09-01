@extends('userheader')
@section('content')

<!-- choices css -->
<link href="{{asset('libs/choices.js/public/assets/styles/choices.min.css')}}" rel="stylesheet" type="text/css" />

<!-- dropzone css -->
<link href="{{asset('libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />

<!-- ============================================================== -->
<!-- Start right Content here -->
<form method="POST" action="/editTrip/{{$tour->id}}" enctype='multipart/form-data'>
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
                                        <h5 class="font-size-16 mb-1">معلومات الرحلة</h5>
                                        <p class="text-muted text-truncate mb-0">املأ جميع المعلومات أدناه</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div id="addproduct-billinginfo-collapse" class="collapse show" data-bs-parent="#addproduct-accordion">
                            <div class="p-4 border-top" dir="rtl">
                                <div class="mb-3">
                                    <label for="title" class="form-label">وجهة الرحلة</label>
                                    <input id="title" type="text" class="form-control" value="{{$tour->title}}" name="title">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-number-input" class="col-md-2 col-form-label">عدد الاشخاص</label>
                                            <input class="form-control" type="number" value="{{$tour->person_count}}" id="person_count" name="person_count">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="example-number-input" class="col-md-2 col-form-label">عدد ايام الرحلة</label>
                                            <input class="form-control" type="number" value="{{$tour->days_count}}" id="days_count" name="days_count">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="price">سعر الرحلة للشخص</label>
                                    <input id="price" value="{{$tour->price}}" name="price" placeholder="" type="text" class="form-control">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">توقيت الانطلاق</label>
                                            <input id="starting_time" value="{{$tour->starting_time}}" name="starting_time" placeholder="" type="time" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">تاريخ الرحلة</label>
                                            <input id="date" value="{{$tour->date}}" name="date" placeholder="" type="date" class="form-control">
                                        </div>
                                    </div>
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
                                        <h5 class="font-size-16 mb-1">صور الرحلة</h5>
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
                                        @foreach ($tour->images as $image)
                                            <img src="{{asset('storage/pic/'.$image->url)}}" class="rounded" width="200" height="200" alt="tag">
                                        @endforeach
                                    </div>
                                    <div class="fallback">
                                        <input id="fileName" name="fileName[]" type="file" value="{{asset('storage/pic/'.$image->url)}}" multiple="multiple">
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
                                    <div class="mb-3">
                                        <label for="projectdesc" class="form-label">برنامج الرحلة</label>
                                        <textarea class="form-control" id="tour_pro" name="tour_pro" rows="5" placeholder="">{{ old('tour_pro', $tour->tour_pro) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="projectdesc" class="form-label"> مسار الرحلة</label>
                                        <textarea class="form-control" id="tour_place" name="tour_place" rows="5" placeholder="">{{ old('tour_place', $tour->tour_place) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="projectdesc" class="form-label">مكان الانطلاق</label>
                                        <input id="starting_place" value="{{$tour->starting_place}}" name="starting_place" placeholder="" type="text" class="form-control">
                                    </div>
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
                <button type="submit" class="btn btn-primary btn-block btn-lg" value="Register" name="publish" style="margin-right:50px;">
                    <span>تعديل</span>
                </button>
            </div>
            <!-- end col -->
        </div>
        <!-- end row-->
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</form>

<!-- choices js -->
<script src="{{asset('libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>

<!-- dropzone plugin -->
<script src="{{asset('libs/dropzone/min/dropzone.min.js')}}"></script>

<!-- init js -->
<script src="{{asset('js/pages/ecommerce-choices.init.js')}}"></script>

<script src="{{asset('js/app.js')}}"></script>
@endsection
