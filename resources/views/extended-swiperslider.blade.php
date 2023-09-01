@extends('userheader')
@section('content')
        <!-- swiper Css -->
        <link href="{{asset('libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />

                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-xl-12">
                                @foreach ($beachs as $beach)
                                <div class="card" dir="rtl">
                                    <div class="card-header justify-content-between d-flex align-items-center">

                                        @role('admin')
                                    <a href="/showview/{{$beach->id}}" class="card-link" ><h4 class="card-title"style="color: #123A5D; "> {{ $beach->name }}</h4> </a>
                                    @endrole

                                    @role('employee1')
                                    <a href="/ShowInfoBeachEmp/{{$beach->id}}" class="card-link" ><h4 class="card-title"style="color: #123A5D; "> {{ $beach->name }}</h4> </a>
                                    @endrole

                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="swiper-container responsive-swiper" dir="ltr">
                                            <div class="swiper-wrapper">
                                                @foreach ($beach->images as $image)

                                                <div class="swiper-slide">
                                                    <div>
                                                        <img src="{{asset('storage/pic/'.$image->url)}}" class="img-fluid mx-auto d-block" alt>
                                                    </div>
                                                </div><!-- end swiper-slide -->



                                                @endforeach
                                            </div><!-- end swiper wrapper -->
                                            <div class="swiper-arrow">
                                                  <div class="swiper-button-next"><i class="mdi mdi-arrow-right"></i></div>
                                        <div class="swiper-button-prev"><i class="mdi mdi-arrow-left"></i></div>
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div><!-- end swiper container -->
                                    </div><!-- end card body -->
                                </div><!-- end card -->


@endforeach



                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div> <!-- container-fluid -->


        <!-- swiper js -->
        <script src="{{asset('libs/swiper/swiper-bundle.min.js')}}"></script>

        <!-- notification init -->
        <script src="{{asset('js/pages/swiper-slider.init.js')}}"></script>

        <script src="{{asset('js/app.js')}}"></script>

@endsection
