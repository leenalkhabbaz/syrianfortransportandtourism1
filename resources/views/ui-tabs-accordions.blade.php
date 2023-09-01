@extends('userheader')
@section('content')
<div class="container-fluid">

    <div class="row">


        <!-- <div class="col-xxl-6 col-xl-6"> -->
        <div class="card" dir="rtl">
            <div class="card-header justify-content-between d-flex align-items-center">
                <!-- <div class="row"> -->
                <div class="col-sm-8">
                    <h4 class="card-title"style="color:#123A5D; ">{{$beachs->name}}</h4>
                </div>
                <div class=".col-6 .col-md-4">
                 <a href="/showaddroom/{{$beachs->id}}">  <button type="button"  class="btn btn-soft-purple">اضافة غرفة</button></a>
                 <a href="/showeditroom/{{$beachs->id}}">  <button type="button"  class="btn btn-soft-purple">تعديل شاطئ</button></a>

                </div>
                <!-- <div class="col-sm-4"> -->


                <!-- </div> -->
                <!-- </div> -->
                <!-- end row -->


            </div><!-- end card header -->
            <div class="card-body">
                <!-- Nav tabs -->
                <ul class="nav nav-pills nav-justified bg-light" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#navpills2-home"
                            role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">الغرف</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#navpills2-profile" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">الوصف</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#navpills2-location" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">الموقع</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#navpills2-settings" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">الصور</span>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane active" id="navpills2-home" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-12">
                                @foreach ($beachs->rooms as $room)
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <div class="product-detail">

                                                    <div class="swiper product-thumbnail-slider rounded border overflow-hidden position-relative">
                                                        <div class="swiper-wrapper " >
                                                            @foreach ($room->images as $image1)
                                                            <div class="swiper-slide" >
                                                                <img src="{{ asset('storage/pic/'.$image1->url) }}" alt class="img-fluid mx-auto d-block">
                                                            </div>

                                                            @endforeach
                                                        </div>

                                                    </div>

                                                    <div class="mt-4">
                                                        <div class="swiper product-nav-slider mt-2 overflow-hidden">
                                                            <div class="swiper-wrapper">
                                                                @foreach ($room->images as $image1)
                                                                <div class="swiper-slide rounded">
                                                                    <div class="nav-slide-item"data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModalScrollable{{$image1->id}}">
                                                                        <img src="{{ asset('storage/pic/'.$image1->url) }}" alt="" class="img-fluid d-block">
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="exampleModalScrollable{{$image1->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-md modal-dialog-scrollable">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">صور الغرفة</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        @foreach ($room->images as $image1)
                                                                        <div class="col-xl-6">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-12">
                                                                                            <div>


                                                                                                <a href="{{ asset('storage/pic/'.$image1->url) }}" class="thumb preview-thumb image-popup-desc">

                                                                                                    <img src="{{ asset('storage/pic/'.$image1->url) }}" class="img-fluid" alt="work-thumbnail">
                                                                                                </a>
                                                                                            </div>
                                                                                        </div><!-- end col -->
                                                                                    </div><!-- end row -->
                                                                                </div><!-- end card body -->
                                                                            </div><!-- end card -->
                                                                        </div><!-- end col -->
                                                                        @endforeach
                                                                    </div><!-- end row -->
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->


                                                    <div class="row text-center mt-3">
                                                        <div class="col-sm-6">
                                                            <div class="d-grid">
                                                               <!-- Button trigger modal -->
                                                               @if($room->find($room->id)->is_available)
                                                               <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                               data-bs-target="#staticBackdrop"style="margin-top:10px ;">
                                                               available
                                                           </button>
                                                               @else
                                                               <button type="button" class="btn btn-pink" data-bs-toggle="modal"
                                                               data-bs-target="#staticBackdrop"style="margin-top:10px ;">
                                                              not available
                                                           </button>
                                                           @endif
                                                           <!-- staticBackdrop Modal -->
                                                           <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                                               data-bs-keyboard="false" tabindex="-1" role="dialog"
                                                               aria-labelledby="staticBackdropLabel" aria-hidden="true"dir="rtl">
                                                               <div class="modal-dialog modal-dialog-centered" role="document"dir="rtl">
                                                                   <div class="modal-content">
                                                                       <div class="modal-header">
                                                                           <!-- <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5> -->
                                                                           <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                               aria-label="Close">
                                                                           </button>
                                                                       </div>
                                                                       <!-- end modalheader -->
                                                                       <div class="modal-body">
                                                                           <p>هل تريد ازالة الغرفة من الخدمة وعدم امكانية حجزها من قبل المستخدم</p>
                                                                       </div>
                                                                       <!-- end modalbody -->
                                                                       <div class="modal-footer">
                                                                        <a href="/notavailable/{{$room->id}}">  <button type="button"  class="btn btn-soft-purple"> NO</button></a>
                                                                               <a href="/available/{{$room->id}}">  <button type="button"  class="btn btn-soft-pink">yes </button></a>
                                                                       </div>
                                                                       <!-- end modalfooter -->
                                                                   </div>
                                                               </div>
                                                           </div><!-- end modal -->
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="d-grid">
                                                                <a href="/calander/{{$room->id}}">    <button type="button"
                                                                    class="btn btn-light waves-effect  mt-2 waves-light">
                                                                    <i class="fas fa-calendar-alt
                                                                  me-2"></i>ايام الحجوزات
                                                                </button></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-8">
                                                <div class="mt-4 mt-xl-3 ps-xl-4">


                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <h5 class="font-size-14"> {{$room->category}}</h5>

                                                    <br>
                                                    <h5 class="mt-1">
                                                        رقم الغرفة :{{$room->name}}
                                                    </h5>


                                                    <h5 class="font-size-20 mt-4 pt-2">  السعر  :{{$room->one_day_price}}</h5>

                                                    <p class="mt-4 text-muted"> الوصف :{{$room->description}} </p>

                                                    <div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mt-3">

                                                                    <h5 class="font-size-14">محتويات
                                                                        الغرفة</h5>
                                                                    <ul
                                                                        class="list-unstyled product-desc-list text-muted">
                                                                        <li><i
                                                                                class="mdi mdi-circle-medium me-1 align-middle"></i>
                                                                                {{$room->content}}</li>

                                                                    </ul>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="mt-3">
                                                                    <h5 class="font-size-14">الخدمات
                                                                    </h5>
                                                                    <ul

                                                                        class="list-unstyled product-desc-list text-muted">
                                                                        <li><i
                                                                                class="bx bx-log-in-circle text-primary me-1"></i>
                                                                                {{$room->services}} </li>
                                                                        {{-- <li><i
                                                                                class="bx bx-dollar-circle text-primary me-1"></i>
                                                                            صيانة</li> --}}
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>




                                                    </div>



                                                </div>
                                                <div class="col-sm">
                                                    <a href="/deleteroom/{{$room->id}}" class="text-muted px-5" type="submit">
                                                        <i class="mdi mdi-trash-can-outline fa-2x"></i>
                                                    </a>

                                                    <br>
                                                    <br>
                                                    <a href="/showeditroomm/{{$room->id}}" class="text-muted px-5">
                                                        <i class="bx bx-pencil fa-2x"></i>
                                                    </a>
                                                </div>
                                            </div><!-- end row -->


                                                </div>
                                            </div>


                                        </div>
                                        <!-- end row -->

                                    </div>


                                </div>
                             @endforeach

                            </div>
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end tab pane -->
                    <div class="tab-pane" id="navpills2-profile" role="tabpanel">
                        <h6 class="mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone-call"><path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                            رقم الهاتف : {{ $beachs->phone_number }}
                        </h6>
                        <br>
                        <h6 class="mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>

                             الموقع : {{ $beachs->address}}
                        </h6>
                        <br>
                        <p class="mb-0">
                            {{ $beachs->description}}
                        </p>
                    </div> <!-- end tab pane -->

                    <div class="tab-pane" id="navpills2-location" role="tabpanel">

                        <div class="mapform">
                            @foreach ($beachs->locations as $location)
                                {{-- <div class="row">
                                    <div class="col-5">
                                        <input type="text" class="form-control" placeholder="lat" name="lat"
                                            id="lat"value="{{ $location->latitude }}" readonly>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control" placeholder="lng" name="lng"
                                            id="lng"value="{{ $location->longitude }}" readonly>
                                    </div>
                                </div> --}}
                                {{-- <br> --}}
                                <div class="card card4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center align-items-center"
                                            style="height: 400px;">
                                            <div id="map-{{ $location->id }}" style="height: 100%; width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <script>
                                function initMap() {
                                    @foreach ($beachs->locations as $location)
                                        const latitude{{ $location->id }} = parseFloat("{{ $location->latitude }}");
                                        const longitude{{ $location->id }} = parseFloat("{{ $location->longitude }}");

                                        const map{{ $location->id }} = new google.maps.Map(document.getElementById("map-{{ $location->id }}"), {
                                            center: {
                                                lat: latitude{{ $location->id }},
                                                lng: longitude{{ $location->id }}
                                            },
                                            zoom: 8,
                                            scrollwheel: true,
                                        });

                                        const marker{{ $location->id }} = new google.maps.Marker({
                                            position: {
                                                lat: latitude{{ $location->id }},
                                                lng: longitude{{ $location->id }}
                                            },
                                            map: map{{ $location->id }},
                                            draggable: true,
                                        });

                                        google.maps.event.addListener(marker{{ $location->id }}, 'position_changed', function() {
                                            const lat = marker{{ $location->id }}.position.lat();
                                            const lng = marker{{ $location->id }}.position.lng();
                                            $('#lat').val(lat);
                                            $('#lng').val(lng);
                                        });

                                        google.maps.event.addListener(map{{ $location->id }}, 'click', function(event) {
                                            pos = event.latLng;
                                            marker{{ $location->id }}.setPosition(pos);
                                        });
                                    @endforeach
                                }

                                initMap();
                            </script>
                        </div>

                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script>



               </div>


                    <div class="tab-pane" id="navpills2-settings" role="tabpanel">
                        {{-- <div class="row"> --}}
                            {{-- <div class="col-lg-12"> --}}
                                <div class="card">

                                    <div class="card-body">
                                        {{-- <div class="row"> --}}
                                            {{-- <div class="col-lg-12"> --}}


                                                <div class="row gallery-wrapper">
                                                    @foreach ($beachs->images as $image)
                                                    <div class="element-item col-xl-4 col-sm-6 project designing development"
                                                        data-category="designing development">
                                                        <div class="gallery-box card">
                                                            <div class="gallery-container">
                                                                <a class="image-popup"
                                                                    href="{{asset('storage/pic/'.$image->url)}}"
                                                                    title="">
                                                                    <img class="gallery-img img-fluid mx-auto"
                                                                        src="{{asset('storage/pic/'.$image->url)}}"
                                                                        alt="" />
                                                                    <div class="gallery-overlay"></div>
                                                                </a>
                                                            </div>


                                                        </div>
                                                    </div>

                                                    @endforeach
                                                </div>
                                                <!-- end row -->

                                            {{-- </div> --}}
                                        {{-- </div> --}}
                                        <!-- end row -->
                                    </div>
                                    <!-- ene card body -->
                                </div>
                                <!-- end card -->
                            {{-- </div> --}}
                            <!-- end col -->
                        {{-- </div> --}}
                        <!-- end row -->
                    </div><!-- end tab pane -->
                </div>
            </div>
        </div><!-- end card -->
        <!-- </div>end col -->


    </div>
    <!-- end row -->


</div> <!-- container-fluid -->


@endsection
