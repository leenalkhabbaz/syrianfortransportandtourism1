@extends('userheader')
@section('content')

<!-- Plugins css -->
<link href="{{asset('libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
 <!-- One of the following themes -->
 <link rel="stylesheet" href="{{asset('libs/%40simonwep/pickr/themes/classic.min.css')}}"> <!-- 'classic' theme -->
 <link rel="stylesheet" href="{{asset('libs/%40simonwep/pickr/themes/monolith.min.css')}}"> <!-- 'monolith' theme -->
 <link rel="stylesheet" href="{{asset('libs/%40simonwep/pickr/themes/nano.min.css')}}"> <!-- 'nano' theme -->


<div class="container-fluid">

    <div class="card card-h-100"dir="rtl">
        <div class="card-header justify-content-between d-flex align-items-center">
            <h4 class="card-title"> اضافةاعلان </h4>
        </div><!-- end card header -->
        <div class="card-body">
            <div>
                <form method="POST" action="/EditAds/{{$ads->id}}" enctype='multipart/form-data'>
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="date"> عنوان الاعلان </label>
                        <input id="" name="title"value="{{$ads->title}}" placeholder="" type="text"  class="form-control">

                    </div>
                    <br>

                    <div class="mb-3">
                        <div class ="position">
                            <input type="checkbox" id="othervalue" name="internal" value="internal" class="form-check-input">
                            <label for="othervalue" > اعلان للشركة </label>
                            <br>
                        <label for="choices-single-default" class="form-label "id="otherva"> اختر الرحلة لاضافة الاعلان لها </label>
                        <select class="form-control" data-trigger="" name="tour_id"id="othervaa">
                            @foreach($tours as $tour)
                            <option value="{{$tour->id}}" selected id="otherva"> {{$tour->title}} </option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="mb-3">
                        <div class ="position">
                        <input class="form-check-input" type="checkbox" id="other"name="external" value="external">
                        <label for="other" > اعلان خارجي </label>
                        <br>
                        <br>
                        <label class="form-label" for=""id="Valuee"> رقم للتواصل </label>
                        <input type="number" id="Value" name="phone_number"value="{{$ads->phone_number}}" placeholder="">

                        </div>
                </div>


                    <div class="mb-3">
                        <label class="form-label" for="ticket_price"> وصف الاعلان </label>
                        <textarea class="form-control" id=""name="description" rows="5" placeholder="">

                            {{ old('description', $ads->description) }}
                        </textarea>

                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="ticket_price">  مدة ظهور الاعلان </label>
                        <input class="form-control" type="datetime-local" value="{{$ads->duration}}" id="example-datetime-local-input"name="duration">
                    </div>
                    <div class="mb-3">

                        <label class="form-label" for="ticket_price">  اضافة صورة   </label>
                        <div class="p-4 border-top">
                            <div class="dropzone">
                                <div class="fallback">
                                    @foreach ($ads->images as $image)
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


                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary btn-block btn-lg" value="Register" name="publish">
                            تعديل</button>
                    </div>
                </form>
                <!-- end form -->
            </div>
        </div><!-- end card body -->
    </div><!-- end card -->


    <script>
        const otherCheckbox = document.querySelector('#othervalue');
        const otherText = document.querySelector('#otherva');
        const otherTextt = document.querySelector('#othervaa');

        otherText.style.visibility = 'hidden';
        otherTextt.style.visibility = 'hidden';
        otherCheckbox.addEventListener('change', () => {
          if(otherCheckbox.checked) {
            otherText.style.visibility = 'visible';
            otherText.value = '';
            otherTextt.style.visibility = 'visible';
            otherTextt.valuee = '';
          } else {
            otherText.style.visibility = 'hidden';
            otherTextt.style.visibility = 'hidden';
          }
        });

            </script>


    <script>
        const Checkbox = document.querySelector('#other');
        const Text = document.querySelector('#Value');
        const Textt = document.querySelector('#Valuee');
        Text.style.visibility = 'hidden';
        Textt.style.visibility = 'hidden';
        Checkbox.addEventListener('change', () => {
          if(Checkbox.checked) {
            Text.style.visibility = 'visible';
            Text.value = '';
            Textt.style.visibility = 'visible';
            Textt.valuee = '';
          } else {
            Text.style.visibility = 'hidden';
            Textt.style.visibility = 'hidden';
          }
        });
            </script>

      <!-- Plugins js -->
      {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> --}}

      <script src="{{asset('libs/dropzone/min/dropzone.min.js')}}"></script>

      <script src="{{asset('js/app.js')}}"></script>
@endsection
