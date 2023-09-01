@extends('userheader')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="container-fluid" dir="rtl">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h5 class="card-title"> التصويتات المضافة </h5>
                            </div>
                        </div><!-- end col -->
                        <div class="col-md-6"></div><!-- end col -->
                    </div><!-- end row -->

                    <div class="row">
                        @foreach ($votes as $vote)
                            <div class="col-xl-4 col-sm-6" id="id{{$vote->id}}">
                                <div class="card pricing-box">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-shrink-0 avatar rounded-circle me-3">
                                                <img src="assets/images/users/avatar-1.jpg" alt=""
                                                    class="img-fluid rounded-circle">
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-15 mb-1 text-truncate text-dark">
                                                    {{ $vote->name }}
                                                </h5>
                                            </div>

                                            <div class="flex-shrink-0 dropdown">
                                                <a class="text-body dropdown-toggle font-size-16" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                    <i class="icon-xs" data-feather="more-horizontal"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item text-center" href="/show_form_Updatevote/{{$vote->id}}">تعديل</a>
                                                    <a class="dropdown-item text-center" href="javascript:void(0)"
                                                        onclick="deleteS({{$vote->id}})">حذف</a>
                                                        <a type="button" class="dropdown-item text-center"data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalScrollable{{$vote->id}}"href=""> التفاصيل</a>
                                                </div>
                                            </div><!-- end dropdown -->
                                        </div>
                                        <div class="pt-4">
                                            <button type="button"
                                                class="btn btn-soft-primary btn-sm w-md text-truncate"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModalScrollable2{{$vote->id}}">
                                                <i class="bx bx-message-square-dots me-1 align-middle"></i>
                                                عرض المسارات
                                            </button>
                                            <a href="/chart-js/{{$vote->id}}">
                                                <button type="button"
                                                    class="btn btn-primary btn-sm w-md text-truncate ms-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-eye">
                                                        <path
                                                            d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                        </path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                    عرض نتائج التصويت
                                                </button>
                                            </a>
                                        </div>

                                        <div class="modal fade" id="exampleModalScrollable{{$vote->id}}"
                                            tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="exampleModalScrollableTitle">{{$vote->name}}</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{$vote->description}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        {{--                   --}}


                                        <div class="modal fade" id="exampleModalScrollable2{{$vote->id}}"
                                            tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="exampleModalScrollableTitle">{{$vote->name}}</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            {{-- <div class="col-lg-12"> --}}
                                                                @php
                                                                    $counter = 1; // تعيين قيمة العداد الأولية
                                                                    $colors = ['success', 'pink', 'warning', 'primary', 'danger']; // مصفوفة تحتوي على الألوان المتاحة
                                                                    $colorIndex = 0; // متغير لتتبع الفهرس الحالي في مصفوفة الألوان
                                                                @endphp
                                                                @foreach ($vote->paths as $path)
                                                                    <span class="badge badge-soft-{{$colors[$colorIndex]}} mb-0">المسار
                                                                        {{$counter}} : </span>
                                                                    <p class="text-center">{{$path->path}}</p>
                                                                    @php
                                                                        $counter++;
                                                                        $colorIndex = ($colorIndex + 1) % count($colors);
                                                                    @endphp

                                                                @endforeach
                                                            {{-- </div> --}}
                                                        </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        {{--  --}}
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        @endforeach
                    </div><!-- end row -->
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
</div><!-- container-fluid -->

<script>
    function deleteS(id) {
        $.ajax({
            url: '/delete_vote/' + id,
            type: 'get',
            data: {
                "_token": $("input[name_token]").val()
            },
            success: function (response) {
                $("#id" + id).remove();
            }
        });
    };

</script>
@endsection
