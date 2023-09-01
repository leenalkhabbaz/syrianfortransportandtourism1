@extends('userheader')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card"dir="rtl">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-4">
                                                <div class="search-box me-2 mb-2 d-inline-block"class="search">
                                                    <div class="position-relative">
                                                        <input type="search"name="search"id="search" class="form-control" placeholder="Search...">
                                                        <i class="bx bx-search search-icon"></i>
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
                                                        <th class="align-middle"style="color: #123A5D;"> المبلغ</th>
                                                        <th class="align-middle"style="color: #123A5D;">اسم الشاطئ</th>
                                                        <th class="align-middle"style="color: #123A5D;">رقم الغرفة</th>
                                                        <th class="align-middle"style="color: #123A5D;">تاريخ الدخول</th>
                                                        <th class="align-middle"style="color: #123A5D;">تاريخ الخروج</th>
                                                        <th class="align-middle"style="color: #123A5D;">تاكيد الدفع</th>
                                                        <th class="align-middle"style="color: #123A5D;">رفض الحجز </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="alldata">
                                                    @foreach ($books as $book)
                                                    <tr id="id{{ $book->id }}">

                                                        <td>{{ $book->user_name}}</td>
                                                        <td>
                                                            {{ $book->user_phone }}
                                                        </td>
                                                        <td>
                                                            {{ $book->total_price }}
                                                        </td>
                                                        <td>
                                                            {{-- {{$book->beach}} --}}
                                                            {{$book->beach->name}}
                                                            {{-- dd($book->beach->name); --}}
                                                        </td>
                                                        <td>
                                                            {{$book->room_name}}
                                                        </td>
                                                        <td>
                                                            {{ $book->start_date }}
                                                        </td>
                                                        <td>
                                                            {{ $book->end_date }}
                                                        </td>


                                                        <td>
                                                            <!-- Button trigger modal -->
                                                            @if($book->find($book->id)->confirmed)

                                                            <button type="submit" class="btn btn-success"disabled>تم الدفع </button>
                                                            @else

                                                            <a href="/reservationacceptedRoom/{{$book->id}}" class="btn btn-soft-dark" type="submit">
                                                                 دفع
                                                            </a>

                                                            @endif

                                                        </td>
                                                        <td>
                                                            <div class="d-flex gap-3">

                                                                {{-- <a href="/reservationRoomdelete/{{$book->id}}" class="btn btn-soft-danger" type="submit">
                                                                    حذف
                                                                </a> --}}
                                                                <a href="javascript:void(0)" onclick="deleteS({{$book->id}})"class="btn btn-soft-danger" type="submit">
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
                        <!-- end row -->

                    </div> <!-- container-fluid -->


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
url:'{{URL::to('searchBeach')}}',
data:{'search':$value},

success:function(data){
console.log(data);
$('#Content').html(data);

}
    });

})

</script>
<script>

    function deleteS(id){
    
    
    
            $.ajax(
            {
                url: '/reservationRoomdelete/'+id,
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


 <!-- nouisliderribute js -->
 <script src="{{asset('libs/nouisliderribute/nouislider.min.js')}}"></script>
 <script src="{{asset('libs/wnumb/wNumb.min.js')}}"></script>
 <script src="{{asset('js/pages/range-sliders.init.js')}}"></script>
        <script src="{{asset('js/app.js')}}"></script>
@endsection
