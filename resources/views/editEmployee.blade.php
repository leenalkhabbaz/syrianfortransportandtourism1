@extends('userheader')

@section('content')

      <!-- choices css -->
        <link href="{{asset('libs/choices.js/public/assets/styles/choices.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- dropzone css -->
        <link href="{{asset('libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <form method="POST" action="/editEmployee/{{$employee->id}}" enctype='multipart/form-data'>
            @method('POST')
            @csrf
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
                                                    <label for="name" class="form-label">اسم الشخص</label>
                                                    <input id="name" type="text" class="form-control" name="name" value="{{$employee->name}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">البريد الإلكتروني</label>
                                                    <input id="email" type="email" class="form-control" name="email" value="{{$employee->email}}">
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
                                <button type="submit" class="btn btn-primary btn-block btn-lg" value="Register" name="publish">
                                    <span>تحديث</span>
                                </button>
                            </div> <!-- end col -->
                        </div> <!-- end row-->
                    </div> <!-- container-fluid -->
                </form>

        <!-- choices js -->
        <script src="{{asset('libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>

        <!-- dropzone plugin -->
        <script src="{{asset('libs/dropzone/min/dropzone.min.js')}}"></script>

        <!-- init js -->
        <script src="{{asset('js/pages/ecommerce-choices.init.js')}}"></script>

        <script src="{{asset('js/app.js')}}"></script>
@endsection
