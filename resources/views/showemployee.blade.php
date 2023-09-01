@extends('userheader')
@section('content')

<div class="container-fluid" dir="rtl">

    <div class="row">
        <div class="col-lg-12" dir="rtl">
            <div class="card">

                <div class="card-header align-items-center">
                    <h4 class="card-title">قائمة الموظفين</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="row">

                        @foreach ($employees as $employee)
                        <div class="col-lg-4" id="id{{$employee->id}}" dir="rtl">
                            <div class="card">

                                <h6 class="card-header text-purple"> اسم الموظف: {{$employee->name}} </h6>

                                <div class="card-body">
                                    <p class="card-text">
                                        <i class="fas fa-envelope"></i>
                                        البريد الإلكتروني: {{$employee->email}}
                                    </p>

                                    <p class="card-text">
                                        <i class="fas fa-user-tag"></i>
                                        الدور: {{$employee->roles->pluck('name')->implode(', ')}}
                                    </p>

                                    <hr>

                                    <a href="/edit_employee/{{$employee->id}}" class="btn btn-primary">تعديل</a>
                                    <a href="javascript:void(0)" onclick="deleteEmployee({{$employee->id}})" class="btn btn-primary">حذف</a>
                                </div>

                            </div>
                        </div><!-- end col -->
                        @endforeach

                    </div>
                </div><!-- end card body -->

            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->

</div>

<script>
    function deleteEmployee(id) {
        $.ajax({
            url: '/delete_employee/' + id,
            type: 'get',
            data: {
                "_token": $("input[name_token]").val()
            },
            success: function (response) {
                $("#id" + id).remove();
            }
        });
    }
</script>

@endsection
