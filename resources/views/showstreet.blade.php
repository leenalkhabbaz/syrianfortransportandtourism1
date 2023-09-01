@extends('userheader')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header align-items-center" dir="rtl">
                            <div class="row">
                                <div class="col-xl-8">
                                    <h4 class="card-title"style="color:#123A5D;"> خطوط النقل </h4>
                                </div>
                                {{-- end col1 --}}
                                @role('admin')
                                <div class="col-md-4">

                                        <button class="btn btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#selectmembermodal"id="add">
                                            اضافة خط نقل
                                        </button>

                                    <div class="modal fade" id="selectmembermodal" tabindex="-1" aria-labelledby="selectmembermodalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content " dir="rtl">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="selectmembermodalLabel"> اضافة خط نقل</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">


                                                    <div class="p-3">

                                                        <form method="POST" action="/createline" enctype='multipart/form-data'>
                                                            @method('POST')
                                                            @csrf


                                                            <div class="mb-3" dir="rtl">
                                                                <label class="form-label" for="start">مكان الانطلاق  </label>
                                                                <input id="beachname" name="start" placeholder="" type="text"
                                                                    class="form-control">
                                                                    <br>

                                                                    <div class="fallback">
                                                                        <label class="form-label" for="start"> اختر صورة لمكان الانطلاق  </label>
                                                                        <input id="fileName"name="fileName[]" type="file" multiple="multiple">
                                                                    </div>

                                                            </div>
                                                            <div class="mb-3"dir=rtl>
                                                                <label class="form-label" for="end">مكان الوجهة  </label>
                                                                <input id="beachname" name="end" placeholder="" type="text"
                                                                    class="form-control">
                                                                    <br>
                                                                    <div class="fallback">
                                                                        <label class="form-label" for="start"> اختر صورة لمكان الوجهة  </label>
                                                                        <input id="fileName"name="fileName[]" type="file" multiple="multiple">
                                                                    </div>

                                                            </div>

                                                    </div>


                                                    <!-- end simplebar -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">رجوع </button>
                                                    <button type="submit" class="btn btn-primary w-sm">اضافة</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endrole
                                {{-- endcol2 --}}

                            </div>
                            {{-- end row --}}
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12"dir="rtl">
                                    <div class="row gallery-wrapper">

                                        @foreach ($lines as $line)
                                            <div class="element-item col-xl-4 col-sm-6 photography"
                                                data-category="photography">
                                                <div class="gallery-box card">
                                                    <div class="gallery-container">
                                                        <a class="image-popup" href="{{ asset('images/small/11.jpg') }}"
                                                            title="">
                                                            <img class="gallery-img img-fluid mx-auto"
                                                                src="{{ asset('images/small/11.jpg') }}"
                                                                alt="" />
                                                            <div class="gallery-overlay"></div>
                                                        </a>

                                                    </div>

                                                    <div class="box-content p-3">
                                                        <h5 class="title">{{ $line->start }}

                                                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-arrow-right">
                                                                <line x1="5" y1="12" x2="19"
                                                                    y2="12"></line>
                                                                <polyline points="12 5 19 12 12 19"></polyline>
                                                            </svg> --}}
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-arrow-left">
                                                                <line x1="19" y1="12" x2="5"
                                                                    y2="12"></line>
                                                                <polyline points="12 19 5 12 12 5"></polyline>
                                                            </svg>

                                                            {{ $line->end }}
                                                        </h5>
                                                        <hr>
                                                        <p class="post"><a href="show_info_Transtrip/{{ $line->id }}"
                                                                class="text-body"> عرض الرحلات </a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- ene card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>


    @endsection
