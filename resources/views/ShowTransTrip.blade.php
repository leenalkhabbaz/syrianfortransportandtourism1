@extends('userheader')
@section('content')

<div class="container-fluid"dir="rtl">

    <div class="row">
        <div class="col-lg-12"dir="rtl">
            <div class="card">

                <div class="card-header align-items-center">
                    <div class="row">
                    <div class="col-xl-8">
                    <h4 class="card-title">
                        {{$lines->start}}

                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>

                        {{$lines->end}}
                    </h4>
                        </div><!---endcol1--->
                        <div class="col-md-4">
                            @role('employee1')
                            <a href="/show_form_trans_trip/{{$lines->id}}"style="margin-right:90px;">  <button type="button"  class="btn btn btn-primary"> اضافة رحلة </button></a>
@endrole
                        </div>
                </div><!-----end row----->
                </div><!-- end card header -->


{{-- ---------------------------------------------- --}}
<div class="card-body">
    <div class="row">

        @php
        $counter = 1; // تعيين قيمة العداد الأولية

    @endphp

    @foreach ($tour_streets as $tour_street)
    <div class="col-lg-4" id="id{{$tour_street->id}}" dir="rtl">
    <div class="card">

        <h6 class="card-header text-purple"> رقم الرحلة : {{$counter}}  </h6>
        @php
         $counter++;

              @endphp

     <div class="row">

                       <div class="col-md-8">

                            <div class="card-body">

                                <p class="card-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"style="color:#123A5D;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                                                      التاريخ: {{$tour_street->date}}

                                </p>

                                <p class="card-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"style="color:#123A5D;"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    الساعة: {{$tour_street->time}}

                                </p>

                                <p class="card-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"style="color:#123A5D;"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                                                    عدد المقاعد : {{$tour_street->number_chairs}}

                                </p>

            <p class="card-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"style="color:#123A5D;"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                    السعر: {{$tour_street->ticket_price}}

                                </p>

                                  <hr>
                                  @role('employee1')
                                <a href="/show_reservation_tour/{{$tour_street->id}}" class="btn btn-pink"> عرض الحجوزات </a>
                                <a href="/showaddbookline/{{$tour_street->id}}" class="btn btn-pink"> حجز  </a>
@endrole
                            </div>


                        </div>
                        <!-- col -->

                        <div class="col-md-4"style="margin-top:30px;">
                            @role('employee1')
                            <a href="javascript:void(0)" onclick="deleteS({{$tour_street->id}})"class="text-muted px-5">
                            <i class="mdi mdi-trash-can-outline fa-2x"></i>

                            </a>
                            <br>

                            <br>
                            <a href="/show_form_edit_trans_trip/{{$tour_street->id}}" class="text-muted px-5">
                                <i class="bx bx-pencil fa-2x"></i>
                            </a>
                            @endrole
                        </div>



                        </div>
                        <!-- row -->



    </div>
</div><!-- end col -->
@endforeach
<div class="d-flex">
                {{ $tour_streets->links() }}
            </div>
</div>
{{-- -------------------------------------- --}}
</div>
<!-- ene card body -->
</div>
<!-- end card -->
</div>
<!-- end col -->
</div>
<!-- end row -->

</div>


<script>

function deleteS(id){



        $.ajax(
        {
            url: '/delete_trans_trip/'+id,
            type: 'get',

            data: {


                "_token": $("input[name_token]").val()
            },
            success: function (response)
            {
               $("#id"+id).remove();
            }
        });


    };

</script>




@endsection
