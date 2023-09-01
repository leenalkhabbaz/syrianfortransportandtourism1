@extends('userheader')
@section('content')

<link href="{{asset('libs/choices.js/public/assets/styles/choices.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />

<form method="POST" action="createAccount" enctype='multipart/form-data'>
    @method('POST')
    @csrf

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div id="addproduct-accordion" class="custom-accordion">
                    <div class="card" dir="rtl">
                        <a href="#addproduct-billinginfo-collapse" class="text-dark" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="addproduct-billinginfo-collapse">
                            <!-- ... باقي المحتوى هنا ... -->
                        </a>

                        <div id="addproduct-billinginfo-collapse" class="collapse show" data-bs-parent="#addproduct-accordion">
                            <div class="p-4 border-top" dir="rtl">
                                <!-- ... باقي المحتوى هنا ... -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label text-end">الاسم</label>
                                    <input id="title" type="text" class="form-control" name="name">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label text-end">الايميل</label>
                                    <input id="title" type="text" class="form-control" name="email">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label text-end">كلمة المرور</label>
                                    <input id="title" type="text" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="adminType" class="form-label text-end">نوع المستخدم</label>
                                    <select class="form-control" id="adminType" name="adminType">
                                        <option value=""></option>
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div id="adminFields" class="row" style="display: none;">
                            <div class="col-lg-12">
                                <!-- ... باقي المحتوى هنا ... -->
                                <div class="mb-3">
                                    <label class="form-label text-end">نوع الإداري</label>
                                    <div class="form-check text-end">
                                        <label class="form-check-label" for="role1Radio">موظف ثانوي تابع لشاطئ</label>
                                        <input class="form-check-input" type="radio" name="adminRole" value="role1" id="role1Radio">
                                    </div>
                                    <div class="form-check text-end">
                                        <label class="form-check-label" for="role2Radio">موظف ثانوي تابع لفندق</label>
                                        <input class="form-check-input" type="radio" name="adminRole" value="role2" id="role2Radio">
                                    </div>
                                    <!-- يمكنك إضافة المزيد من أزرار الاختيار هنا -->
                                </div>
                                <!-- ... باقي المحتوى هنا ... -->
                            </div>
                        </div>

                        <div id="role1Fields" class="row" style="display: none;">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label text-end">الشواطئ</label>
                                    <select class="form-control" name="beach">
                                        <option value=""></option>
                                        @foreach ($beachs as $beach)
                                        <option value="{{ $beach->id }}" selected id="otherbeach">{{ $beach->name }}</option>
                                        @endforeach
                                        <!-- يمكنك إضافة المزيد من القيم هنا -->
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div id="role2Fields" class="row" style="display: none;">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label text-end">الفنادق</label>
                                    <select class="form-control" name="hotel">
                                        <option value=""></option>
                                        @foreach ($hotels as $hotel)
                                        <option value="{{ $hotel->id }}" selected id="otherva">{{ $hotel->name }}</option>
                                        @endforeach
                                        <!-- يمكنك إضافة المزيد من القيم هنا -->
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col text-end">
                <button type="submit" class="btn btn-primary btn-block btn-lg" value="Register" name="publish">
                    <span>اضافة</span>
                </button>
            </div>
        </div>
    </div>
</form>

<script src="{{asset('libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>
<script src="{{asset('libs/dropzone/min/dropzone.min.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const adminTypeSelect = document.getElementById('adminType');
        const role1Fields = document.getElementById('role1Fields');
        const role2Fields = document.getElementById('role2Fields');
        const adminFields = document.getElementById('adminFields');

        adminTypeSelect.addEventListener('change', function () {
            if (adminTypeSelect.value === 'employee2') {
                adminFields.style.display = 'block';
                role1Fields.style.display = 'none';
                role2Fields.style.display = 'none';
            } else {
                adminFields.style.display = 'none';
                role1Fields.style.display = 'none';
                role2Fields.style.display = 'none';
            }
        });

        const adminRoleRadios = document.querySelectorAll('input[name="adminRole"]');
        adminRoleRadios.forEach(function (radio) {
            radio.addEventListener('change', function () {
                if (radio.value === 'role1') {
                    role1Fields.style.display = 'block';
                    role2Fields.style.display = 'none';
                } else if (radio.value === 'role2') {
                    role1Fields.style.display = 'none';
                    role2Fields.style.display = 'block';
                } else {
                    role1Fields.style.display = 'none';
                    role2Fields.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection
