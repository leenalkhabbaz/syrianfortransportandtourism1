@extends('userheader')
@section('content')

<!-- Plugins css -->
<link href="{{asset('libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />


<div class="container-fluid">

    <div class="card card-h-100"dir="rtl">
        <div class="card-header justify-content-between d-flex align-items-center">
            <h4 class="card-title"> اضافة رحلة </h4>
        </div><!-- end card header -->
        <div class="card-body">
            <div>
                <form method="POST" action="/create_transtrip/{{$line->id}}" enctype='multipart/form-data'>
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="number_chairs"> عدد المقاعد </label>
                        <input type="number" class="form-control" id="number_chairs" name="number_chairs"class="@error('number_chairs') is-invalid @enderror">
                        @error('number_chairs')
                        <div class="alert alert-danger alert-top-border alert-dismissible fade show">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                                    @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="date">تاريخ الرحلة</label>
                                <input id="date" name="date" placeholder="" type="date"  class="form-control"class="@error('date') is-invalid @enderror">
                                @error('date')
                                <div class="alert alert-danger alert-top-border alert-dismissible fade show">{{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                            @enderror
                            </div>
                        </div><!-- end col -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="time"> توقيت الرحلة </label>
                                <input type="time" class="form-control" id="time"name="time"class="@error('time') is-invalid @enderror">
                                @error('time')
                                <div class="alert alert-danger alert-top-border alert-dismissible fade show">{{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                            @enderror
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                    <div class="mb-3">
                        <label class="form-label" for="ticket_price">  سعر التذكرة </label>
                        <input type="number" class="form-control" id="ticket_price" name="ticket_price"class="@error('ticket_price') is-invalid @enderror">
                        @error('ticket_price')
                        <div class="alert alert-danger alert-top-border alert-dismissible fade show">{{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                                    @enderror
                    </div>

                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary btn-block btn-lg" value="Register" name="publish">
                            اضافة</button>
                    </div>
                </form><!-- end form -->
            </div>
        </div><!-- end card body -->
    </div><!-- end card -->

      <!-- Plugins js -->
      <script src="{{asset('libs/dropzone/min/dropzone.min.js')}}"></script>

      <script src="{{asset('js/app.js')}}"></script>
@endsection
