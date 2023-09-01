@extends('userheader')
@section('content')

<!-- Plugins css -->
<link href="{{asset('libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />


<div class="container-fluid">

    <div class="card card-h-100"dir="rtl">
        <div class="card-header justify-content-between d-flex align-items-center">
            <h4 class="card-title"> تعديل رحلة </h4>
        </div><!-- end card header -->
        <div class="card-body">
            <div>
                <form method="POST" action="/editTransTrip/{{$tour->id}}" enctype='multipart/form-data'>
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input"> عدد المقاعد </label>
                        <input type="number" class="form-control" id="formrow-firstname-input" value="{{$tour->number_chairs}}" name="number_chairs">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-email-input">تاريخ الرحلة</label>
                                <input id="adress" name="date" placeholder="" value="{{$tour->date}}" type="date"  class="form-control">
                            </div>
                        </div><!-- end col -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-password-input"> توقيت الرحلة </label>
                                <input type="time" class="form-control" value="{{$tour->time}}" id="datepicker-timepicker"name="time">

                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">  سعر التذكرة </label>
                        <input type="number" class="form-control" id="formrow-firstname-input"  value="{{$tour->ticket_price}}"name="ticket_price">
                    </div>

                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary btn-block btn-lg" value="Register" name="publish">
                            تعديل</button>
                    </div>
                </form><!-- end form -->
            </div>
        </div><!-- end card body -->
    </div><!-- end card -->

      <!-- Plugins js -->
      <script src="{{asset('libs/dropzone/min/dropzone.min.js')}}"></script>

      <script src="{{asset('js/app.js')}}"></script>
@endsection
