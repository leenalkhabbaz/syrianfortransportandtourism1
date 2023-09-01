@extends('userheader')

@section('content')

<!-- plugin css -->

<style>
    .text-end-right {
        text-align: right;
        direction: rtl;
    }
</style>

<div class="container">
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
    <form method="POST" action="approveitem">
        @csrf
        @foreach ($items as $item)
            <div class="mb-3 text-end">
                <label for="purpose_{{ $item->id }}" class="form-label">{{ $item->name }}</label>
                 <select name="purpose_{{ $item->id }}[]" id="purpose_{{ $item->id }}" class="form-select text-end-right" multiple required>
                    <option value="beach">غرض تابع للشاطئ</option>
                    <option value="hotel">غرض تابع للفندق</option>
                    <option value="tourism">غرض تابع للرحلة</option>
                    <option value="transport">غرض تابع لرحلة النقل</option>
                    <!-- يمكنك إضافة خيارات أخرى هنا -->
                </select>
            </div>

            @unless ($loop->last)
                <hr>
            @endunless
        @endforeach
        <button type="submit" class="btn btn-primary">اضافة</button>
    </form>
</div>

<script src="multiselect-dropdown.js" ></script>
@endsection
