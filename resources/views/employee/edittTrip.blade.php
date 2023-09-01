@extends('userheader')
@section('content')
  <!-- dropzone css -->
  <link href="{{asset('libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />

  <!-- flatpickr css -->
  <link href="{{asset('libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css">

  <form method="POST" action="/editTrip/{{$tour->id}}" enctype='multipart/form-data'>
    @method('POST')
    @csrf

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <ul class="wizard-nav mb-5">
                            <li class="wizard-list-item">
                                <div class="list-item">
                                    <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Basic Info">
                                        <i class="uil uil-clipboard-notes"></i>
                                    </div>
                                </div>
                            </li>
                            <li class="wizard-list-item">
                                <div class="list-item">
                                    <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Assignee">
                                        <i class="uil uil-users-alt"></i>
                                    </div>
                                </div>
                            </li>

                            <li class="wizard-list-item">
                                <div class="list-item">
                                    <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Attached Files">
                                        <i class="uil uil-paperclip"></i>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- wizard-nav -->

                        <div class="wizard-tab"dir="rtl">
                            <div class="text-center mb-4">
                                <h5> اضافة رحلة</h5>
                                <p class="card-title-desc">املا المعلومات ادناه</p>
                            </div>

                                <div>
                                    <div class="mb-3">
                                        <label for="projectname" class="form-label">وجهة الرحلة</label>
                                        <input id="projectname"value="{{$tour->title}}" type="text" class="form-control"name="title" >
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="example-number-input" class="col-md-2 col-form-label" >عدد الاشخاص</label>

                                        <input class="form-control" type="number" value="{{$tour->person_count}} id="example-number-input"name="person_count">
                                   </div>
                                        </div>
                                        <div class="col-lg-6">
                                   <div class="mb-3">
                                    <label for="example-number-input" class="col-md-2 col-form-label" >عدد ايام الرحلة</label>
                                    <input class="form-control" type="number" value="{{$tour->days_count}}"id="example-number-input"name="days_count">
                               </div>
                            </div>
                            <!-- row -->
                                    </div>
                                    <!-- row -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="price">سعر الرحلة للشخص</label>
                                            <input id="price"value="{{$tour->price}}" name="price" placeholder="" type="text" class="form-control">
                                    </div>
                                        </div>
                                        <!-- col -->
                                        <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> مكان الانطلاق </label>
                                        <input type="text"value="{{$tour->starting_place}}" class="form-control" id=""name="starting_place">
                                    </div>
                                </div>
                                <!-- col
                                 -->
                                    </div>
                                    <!-- row -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">تاريخ الرحلة </label>
                                        <input type="date"value="{{$tour->date}}" class="form-control" id="datepicker-basic"name="date">
                                    </div>
                                        </div>

                                        <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label"> توقيت الانطلاق </label>
                                        <input type="time"value="{{$tour->starting_time}}" class="form-control" id="datepicker-timepicker"name="starting_time">
                                    </div>
                                        </div>
                                    </div>


                                </div>

                        </div>
                        <!-- wizard-tab -->

                        <div class="wizard-tab"dir="rtl">

                                <div>
                                    <div class="mb-3">

                                         <div class="mb-3">
                                        <label for="projectdesc" class="form-label">برنامج الرحلة</label>
                                        <textarea class="form-control"name="tour_pro" id="projectdesc" rows="5" placeholder="">
                                            {{ old('tour_pro', $tour->tour_pro) }}
                                        </textarea>
                                    </div>
                                    </div>

                                    <div class="mb-4">
                                        <!-- <label>Assign to</label> -->
                                        <label for="projectdesc" class="form-label"> مسار الرحلة</label>
                                        <textarea class="form-control"name="tour_place" id="projectdesc" rows="5" placeholder="">
                                            {{ old('tour_place', $tour->tour_place) }}
                                        </textarea>

                                        </div>

                                    </div>
                                </div>

                        </div>
                        <!-- wizard-tab -->

                        <div class="wizard-tab">
                            <div class="text-center mb-4">
                                <h5>اضافة صور</h5>
                                <p class="card-title-desc">حمل الصور المرفقة</p>
                            </div>
                            <div class="dropzone">
                                <div class="fallback">
                                    @foreach ($tour->images as $image)
                                    <img src="{{asset('storage/pic/'.$image->url)}}" class="rounded"  width="200" height="200"alt="tag">
                                    @endforeach
                                    </div>
                                    <div class="fallback">
                                        <input id="fileName"name="fileName[]" type="file"value="{{asset('storage/pic/'.$image->url)}}" multiple="multiple">
                                    </div>

                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-light uil uil-upload-alt"></i>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!-- wizard-tab -->

                        <div class="d-flex align-items-start gap-3 mt-4">
                            <button type="button" class="btn btn-primary w-sm" id="prevBtn" onclick="nextPrev(-1)">السابق</button>

                            <button type="button" class="btn btn-primary w-sm ms-auto" id="nextBtn" onclick="nextPrev(1)">التالي</button>
                            <button type="submit" class="btn btn-primary btn-block btn-lg" value="Register" name="publish">
                                <span>اضافة</span></button>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
</div> <!-- container-fluid -->
  </form>
   <!-- flatpickr js -->
   <script src="{{asset('libs/flatpickr/flatpickr.min.js')}}"></script>

   <!-- dropzone plugin -->
   <script src="{{asset('libs/dropzone/min/dropzone.min.js')}}"></script>

   <!-- init js -->
   <script src="{{asset('js/pages/project-create.init.js')}}"></script>

   <script src="{{asset('js/app.js')}}"></script>
@endsection
