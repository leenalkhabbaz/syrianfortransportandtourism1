@extends('userheader')
@section('content')
    <div class="container-fluid"dir="rtl">

        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h5 class="card-title"> الاعلانات المضافة </h5>
                        </div>
                    </div><!-- end col -->
                    <div class="col-md-6"></div><!-- end col -->
                </div><!-- end row -->
<hr>
        <div class="row"dir="rtl">

            @foreach ($ads as $ad)
            <div class="col-lg-4">
                <div class="container2">

                    <div class="card">
                        <img class="card-img img-fluid" src="{{asset('storage/pic/'.$ad->images->first()->url)}}" >
                        <div class="card-img-overlay">
                            <h5 class="card-title text-white mb-1"> {{$ad->title}} </h5>
                            <!-- <p class="card-text text-purple" style="font-size: 16px;color:#D46416;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"style="color:#D46416;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>

                            13/9/2023
                          </p> -->

                        </div>
                        <div class="overlay">
                            <div class="text1"style="margin-top:20px;"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-map-pin">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                {{$ad->title}}

                                     @if ($ad->type=="internal")
                                     <p style="color:#D46416;padding-right:20px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                        اعلان للشركة
                                    </p>

                                           @else
                                           <p style="color:#D46416;padding-right:15px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>

                                              اعلان خارجي
                                          </p>
                                                 @endif



                            </div>
                            <div class="text2 d-flex flex-column">
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                  <a href="/delete_Ad/{{$ad->id}}">
                             <p style="font-size: 16px;color:#676977;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"style="color:#2095AE;"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                 حذف</p>
                                  </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="/show_EditAd/{{$ad->id}}">
                            <p style="font-size: 16px;color:#676977;padding-right: 50px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pen-tool"style="color:#2095AE;"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.586 7.586"></path><circle cx="11" cy="11" r="2"></circle></svg>
                                 تعديل</p>
                                        </a>
                                </div>
                                </div>
                                @if ($ad->type=="internal")
                                <a href="/show_info_trip/{{$ad->tour_id}}">
                                    <p style="font-size: 16px;color:#676977;padding-top: 20px;"> عرض التفاصيل</p>
                                    <div class="line-3">
                                    </div>
                                </a>
                                @else
                                <a href="/show_info_Ad/{{$ad->id}}">
                                    <p style="font-size: 16px;color:#676977;padding-top: 20px;"> عرض التفاصيل</p>
                                    <div class="line-3">
                                    </div>
                                </a>
                                @endif

                            </div>

                        </div>

                    </div>
                </div><!-- end col -->
            </div>

@endforeach
        </div>


    </div>
</div>


    </div> <!-- container-fluid -->
@endsection
