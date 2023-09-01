@extends('userheader')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="container-fluid"dir="rtl">

    <div class="row">
        <div class="col-xl-3">
            <div class="card" dir="rtl">
                <div class="card-body p-0">

                    <div class="p-3 mt-3">
                        <div class="row text-center">
                            <div class="mt-4 ">

                                <h5 class="mb-1 border-bottom py-3" style="color:#123A5D">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>

                                    {{$tours->title}}</h5>
                                <br>
                                <br>
                            </div>

                            <div class="col-6 border-end border-bottom py-3">
                                <div class="p-1">
                                    <h6 class="mb-1" style="color:#123A5D"> {{$tours->price}}</h6>
                                    <p class="text-muted mb-0">السعر</p>
                                </div>
                            </div>
                            <div class="col-6 border-bottom py-3">
                                <div class="p-1">
                                    <h6 class="mb-1" style="color:#123A5D"> {{$tours->person_count}}</h6>
                                    <p class="text-muted mb-0">عدد الاشخاص</p>
                                </div>
                            </div>

                            <div class="col-6 border-end border-bottom py-3">
                                <div class="p-1">
                                    <h6 class="mb-1" style="color:#123A5D"> {{$tours->starting_place}}</h6>
                                    <p class="text-muted mb-0">مكان الانطلاق</p>
                                </div>
                            </div>
                            <div class="col-6 border-bottom py-3">
                                <div class="p-1">
                                    <h6 class="mb-1" style="color:#123A5D"> {{$tours->date}}</h6>
                                    <p class="text-muted mb-0"> تاريخ الرحلة </p>
                                </div>
                            </div>



                            <div class="col-6 border-end border-bottom py-3">
                                <div class="p-1">
                                    <h6 class="mb-1" style="color:#123A5D"> {{$tours->starting_time}}</h6>
                                    <p class="text-muted mb-0">وقت الانطلاق</p>
                                </div>
                            </div>
                            <div class="col-6 border-bottom py-3">
                                <div class="p-1">
                                    <h6 class="mb-1" style="color:#123A5D"> {{$tours->days_count}}</h6>
                                    <p class="text-muted mb-0"> عدد الايام </p>
                                </div>
                            </div>

                            @role('employee1')
                            <div class="col-6 border-end border-bottom py-3">
                                <div class="p-1">

                                    <a href="/delete_trip/{{$tours->id}}" class="text-muted px-5">
                                        <i class="mdi mdi-trash-can-outline fa-2x"style="color:#D46416;margin-left:10px;"></i>
                                    </a>
                                    <p class="text-muted mb-0"> حذف </p>
                                </div>
                            </div>
                            @endrole
                            @role('employee1')
                            <div class="col-6 border-bottom py-3">
                                <div class="p-1"style="margin-top:10px;">

                                    <a href="/show_EditTrip/{{$tours->id}}" class="text-muted px-5">
                                        <i class="bx bx-pencil fa-2x"style="color:#123A5D;margin-left:10px;"></i>
                                    </a>
                                    <p class="text-muted mb-0">  تعديل </p>
                                </div>
                            </div>
                           @endrole

                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>


        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">

                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button fw-medium" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                    aria-expanded="true" aria-controls="flush-collapseOne"style="color:#123A5D">
                                    مسار الرحلة
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="flush-headingOne"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">  {{$tours->tour_place}}</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button fw-medium collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                    aria-expanded="false" aria-controls="flush-collapseTwo"style="color:#123A5D">
                                    برنامج الرحلة
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    {{$tours->tour_pro}}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button fw-medium collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                    aria-expanded="false" aria-controls="flush-collapseThree"style="color:#123A5D">
                                    اضافة حجز
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body" dir="rtl">
                                    <form method="POST" action="/create_BookTrip/{{$tours->id}}" enctype='multipart/form-data'>
                                        @method('POST')
                                        @csrf
                                    <div class="modal-dialog modal-lg modal-dialog-centered">

                                        <div class="modal-content">

                                            <div class="modal-body p-4">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="addcontact-name-input"
                                                            class="form-label">اسم الزبون</label>
                                                        <input type="text" class="form-control"
                                                            id="addcontact-name-input"name="name"
                                                           >
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="addcontact-designation-input"
                                                            class="form-label">رقم الزبون</label>
                                                        <input type="number" class="form-control"
                                                            id="addcontact-designation-input"name="phone_number"
                                                           >
                                                    </div>


                                                    <div class="mb-3">
                                                        <label for="addcontact-email-input"
                                                            class="form-label">عدد الاشخاص</label>
                                                        <input type="number" class="form-control"
                                                            id="addcontact-email-input"name="person_number"
                                                           >
                                                    </div>
                                                </div>
                                            </div><!-- end modalbody -->
                                            <div class="modal-footer">

                                                <button type="submit" value="Register" name="publish"
                                                    class="btn btn-primary w-sm">اضافة</button>
                                            </div>
                                            <!-- end modalfooter -->
                                        </div>
                                        <!-- end modal content -->

                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
            <div class="col-l-8">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header align-items-center">
                                <h6 class="card-title"style="color:#123A5D;font-size:15px"> صور الرحلة </h6>
                            </div><!-- end card header -->
                            <div class="card-body">
                                {{-- <div class="row"> --}}
                                        <div class="row gallery-wrapper">
                                            @foreach ($tours->images as $image)
                                            <div class="element-item col-xl-4 col-sm-6 project designing development"  data-category="designing development">
                                                <div class="gallery-box card">
                                                    <div class="gallery-container">
                                                        <a class="image-popup" href="{{asset('storage/pic/'.$image->url)}}" title="">
                                                            <img class="gallery-img img-fluid mx-auto" src="{{asset('storage/pic/'.$image->url)}}" alt="" />
                                                            <div class="gallery-overlay"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                        <!-- end row -->

                                    </div>

                                {{-- </div> --}}
                                <!-- end row -->
                            </div>
                            <!-- ene card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>
            @role('employee1')
            <div class="col-lx-8">
                <div class="card">
                    <div class="card-body">

                 <div class="mt-1 pt-1">

                    <div class="card-header align-items-center">

                        <div class="row">
                        <div class="col-sm-4">
                    <h6 class="card-title"style="color:#123A5D;font-size:15px"> الحجوزات الواردة </h6>
                </div>
                <div class="col-md-4">
                    <div class="search-box me-2 mb-2 d-inline-block"class="search">
                        <div class="position-relative">
                            <input type="search"name="search"id="search" class="form-control" placeholder="Search...">
                            <i class="bx bx-search search-icon"></i>
                        </div>
                    </div>

                </div>
                       </div>
                    </div>

                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-check">
                                    <thead class="table-light">
                                        <tr>

                                            <th class="align-middle"style="color: #123A5D;">اسم الزبون</th>
                                            <th class="align-middle"style="color: #123A5D;">رقم الزبون</th>
                                            {{-- <th class="align-middle"style="color: #123A5D;"> عنوان الرحلة </th> --}}
                                            <th class="align-middle"style="color: #123A5D;">عدد الاشخاص </th>
                                            <th class="align-middle"style="color: #123A5D;"> المبلغ </th>
                                            <!-- <th class="align-middle"style="color: #123A5D;"> </th> -->
                                            <th class="align-middle"style="color: #123A5D;">تاكيد الدفع</th>
                                            <th class="align-middle"style="color: #123A5D;">رفض الحجز </th>
                                        </tr>
                                    </thead>
                                    <tbody class="alldata">
                                        @foreach ($tours->reservations as $book)
                                        <tr>

                                            <td>{{$book->name}} </td>
                                            <td>
                                                {{$book->number}}
                                            </td>
                                            {{-- <td>
                                                {{$tours->title}}
                                            </td> --}}
                                            <td>
                                                {{$book->number_person}}
                                            </td>
                                            <td>
                                                {{$book->total_price}}
                                            </td>


                                            <td>
                                                <!-- Button trigger modal -->
                                                @if($book->find($book->id)->confirmed)

                                                <button type="submit" class="btn btn-success"disabled>تم الدفع </button>
                                                @else

                                                <a href="/reservationaccepted/{{$book->id}}" class="btn btn-soft-dark" type="submit">
                                                     دفع
                                                </a>

                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex gap-3">
                                                    <a href="/reservationdelete/{{$book->id}}" class="btn btn-soft-danger" type="submit">
                                                        حذف
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                      @endforeach

                                    </tbody>
                                    <tbody id="Content"class="searchdata">

                                    </tbody>
                                </table>

                            </div>


                            <ul class="pagination pagination-rounded justify-content-end mb-2">
                                <li class="page-item disabled">
                                    <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                        <i class="mdi mdi-chevron-left"></i>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                                <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                        <i class="mdi mdi-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>

                        </div>

            </div>
                </div>
            </div>
           @endrole



        </div><!-- end row -->


    </div>

    <script type="text/javascript">

        $('#search').on('keyup',function()
        {
            $value=$(this).val();
            if($value){
                $('.alldata').hide();
                $('.searchdata').show();
            }
            else{
                $('.alldata').show();
                $('.searchdata').hide();
            }
            $.ajax({

        type:'get',
        url:'{{URL::to('search')}}',
        data:{'search':$value},

        success:function(data){
        console.log(data);
        $('#Content').html(data);

        }
            });

        })

        </script>


  <!-- apexcharts -->
  <script src="{{asset('libs/apexcharts/apexcharts.min.js')}}"></script>
  <!-- profile init -->
  <script src="{{asset('js/pages/profile.init.js')}}"></script>
  <script src="{{asset('libs/nouisliderribute/nouislider.min.js')}}"></script>
  <script src="{{asset('libs/wnumb/wNumb.min.js')}}"></script>
  <script src="{{asset('js/pages/range-sliders.init.js')}}"></script>
  <!-- app js -->
  <script src="{{asset('js/app.js')}}"></script>


@endsection
