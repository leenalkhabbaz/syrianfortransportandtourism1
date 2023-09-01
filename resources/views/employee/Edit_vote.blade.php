@extends('userheader')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="container-fluid">
    <div class="card card-h-100" dir="rtl" id="toto">
        <div class="card-header justify-content-between d-flex align-items-center">
            <h4 class="card-title"> تعديل </h4>
        </div><!-- end card header -->
        <div class="card-body">
            <div>
                <form method="POST" action="/UpdateVote/{{$vote->id}}" enctype='multipart/form-data'>
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="name"> عنوان التصويت <span >(عنوان الرحلة)</span> </label>
                        <input id=""  name="name" placeholder="" type="text" value="{{$vote->name}}" class="form-control">
                    </div>
                    <br>

                    <div class="mb-3">
                        <label class="form-label" for="description">الوصف</label>
                        <textarea class="form-control" name="description" type="text" id="metadescription" placeholder="" rows="4">
                            {{ old('description', $vote->description) }}
                        </textarea>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="description">اضافة مسار </label>
                                @foreach ($vote->paths as $index => $path)
                                    <div class="input-group mb-3">
                                        <input id="beachname" name="path[]" placeholder="" type="text" class="form-control" value="{{$path->path}}">
                                        <button type="button" class="btn btn-pink remove-input">حذف</button>
                                    </div>
                                @endforeach
                                <div class="form-group"  dir="rtl" id="input-container"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <button id="add-input" type="button" class="btn btn-soft-primary " style="margin-top:30px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                    {{-- اضافة مسار  --}}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary btn-block btn-lg" value="Register" name="publish">
                            تعديل
                        </button>
                    </div>
                </form>
                <!-- end form -->
            </div>
        </div><!-- end card body -->
    </div><!-- end card -->
</div>

<script src="{{asset('libs/dropzone/min/dropzone.min.js')}}"></script>

<!-- init js -->
<script src="{{asset('js/pages/ecommerce-choices.init.js')}}"></script>

<script src="{{asset('js/app.js')}}"></script>

<script>
    $("#add-input").click(function () {
        var input = '<div class="input-group mb-3">' +
            '<input id="beachname" name="path[]" placeholder="" type="text" class="form-control">' +
            '<button type="button" class="btn btn-pink remove-input">حذف</button>' +
            '</div>';
        $("#input-container").append(input);
    });

    $(document).on("click", ".remove-input", function () {
        $(this).parent().remove();
    });
</script>
<script src="{{asset('libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>
@endsection
