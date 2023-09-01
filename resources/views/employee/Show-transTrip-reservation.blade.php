
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

                                                        <th class="align-middle"style="color: #123A5D;">تاكيد الدفع</th>
                                                        <th class="align-middle"style="color: #123A5D;">رفض الحجز </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="alldata" >
                                                   
                                                    @foreach ($books as $book)
                                                    <tr id="id{{ $book->id }}">


                                                       <td>{{ $book->name}}</td>
                                                        <td>
                                                            {{ $book->number }}
                                                        </td>
                                                        <td>
                                                            {{ $book->total_price }}
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
                        url:'{{URL::to('search')}}',
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
                                    url: '/reservationdelete/'+id,
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
