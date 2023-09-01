@extends('userheader')
@section('content')

<link href="{{asset('libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />


<div class="container-fluid"dir="rtl">

    <div class="row">
        @foreach ($tours as $tour)
        <div class="col-lg-4">
            <div class="container2">
            <div class="card"dir="rtl">
                {{-- @foreach ($tour->images as $image) --}}
                {{-- <img class="card-img img-fluid" src="{{asset('images/3.jpg')}}" alt="Card image"style="height:380px;"> --}}
                <img class="card-img img-fluid" src="{{asset('storage/pic/'.$tour->images->first()->url)}}" alt="Card image"style="height:380px;">

                {{-- @endforeach --}}
                <div class="card-img-overlay">
                    <h1 class="card-title text-white mb-3"style="font-weight: 600;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        {{$tour->title}}</h1>
                    <p class="card-text text-light"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        {{$tour->person_count}}</p>
                    <p class="card-text">
                        <small class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            {{$tour->price}} </small>
                    </p>
                </div>
                <div class="overlay">
                    <div class="text1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        {{$tour->title}}

                        <p style="font-size: 16px;color:#2095AE;padding-right: 20px;"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"style="color:#2095AE;"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            {{$tour->person_count}}</p>
                         </div>
                         <div class="text2 d-flex flex-column">
                            <div class="row">
                                <div class="col-6">
                         <p style="font-size: 16px;color:#676977;"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"style="color:#2095AE;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            {{$tour->date}}</p>
                                </div>
                                <div class="col-6">
                        <p style="font-size: 16px;color:#676977;padding-right: 50px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"style="color:#2095AE;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            {{$tour->starting_place}}</p>
                            </div>
                            </div>
                          <div class="row"style="padding-top: 20px;">
                                <div class="col-6">
                         <p style="font-size: 16px;color:#676977;"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"style="color:#2095AE;"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            {{$tour->price}}</p>
                                </div>
                                <div class="col-6">
                        <p style="font-size: 16px;color:#676977;padding-right: 50px;">  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"style="color:#2095AE;"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                            {{$tour->days_count}} ايام</p>
                            </div>
                            </div>
                            <p style="font-size: 16px;color:#676977;padding-right: 55px;padding-top: 20px;"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"style="color:#2095AE;"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                {{$tour->starting_time}}</p>
                             <a href="/show_info_trip/{{$tour->id}}">
                             <p style="font-size: 16px;color:#676977;padding-top: 20px;"> عرض التفاصيل</p>
                             <div class="line-3">
                                <!-- <hr> -->
                              </div>
                            </a>

                    </div>

                  </div>
            </div>

            </div>
        </div><!-- end col -->



@endforeach
    </div><!-- end row -->

</div> <!-- container-fluid -->



 <!-- swiper js -->
 <script src="{{asset('libs/swiper/swiper-bundle.min.js')}}"></script>

 <!-- notification init -->
 <script src="{{asset('js/pages/swiper-slider.init.js')}}"></script>

 <script src="{{asset('js/app.js')}}"></script>


@endsection
