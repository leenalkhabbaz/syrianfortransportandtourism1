@extends('userheader')
@section('content')

<div class="container-fluid">

    <div class="row"dir="rtl">


        <div class="col-lx-6">
            <div class="card">
                <div class="row no-gutters align-items-center">
                    <div class="col-md-4">
                        <img class="card-img img-fluid" src="{{asset('storage/pic/'.$ads->images->first()->url)}}" alt="Card image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h6 class="card-title mb-1"> {{$ads->title}} </h6>
                            <p class="card-text">
                              {{$ads->description}}
                            </p>
                            <p class="card-text"><small class="text-muted"> للتواصل على الرقم :{{$ads->phone_number}} </small></p>
                        </div>
                    </div>
                </div>
            </div><!-- end card -->
        </div><!-- end col -->




    </div><!-- end row -->



</div> <!-- container-fluid -->

@endsection
