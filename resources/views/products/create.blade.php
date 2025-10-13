



@extends('layout.master')
@section('title', 'ایجاد محصول')

@section('link')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.css">


@endsection

@section('script')
    <!-- JS Jalali Datepicker -->
    <script src="https://cdn.jsdelivr.net/npm/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // --- پیش‌نمایش عکس ---
            const input = document.getElementById("primary_image");
            const preview = document.getElementById("previewImage");

            input.addEventListener("change", function (event) {
                const file = event.target.files[0];
                if (!file) {
                    preview.src = "";
                    preview.style.display = "none";
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = "block"; // نمایش عکس
                };
                reader.readAsDataURL(file);
            });
        });

        jalaliDatepicker.startWatch({time:true});
    </script>
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="fw-bold">ایجاد محصول</h4>
</div>

<form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST" class="row gy-4">
    @csrf

    <!-- تصویر اصلی -->
    <div class="col-md-12 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <label class="form-label">تصویر اصلی</label>
                <img id="previewImage" src="" alt="preview" class="rounded mt-2 border shadow-sm"
                     width="350" height="320" style="display:none;">
                <input name="primary_image" id="primary_image" type="file" accept="image/*" class="form-control mt-3">
                <div class="form-text text-danger">
                    @error('primary_image') {{ $message }} @enderror
                </div>
            </div>
        </div>
    </div>


    
        <div class="col-md-3">
            <label class="form-label">تصاویر محصول</label>
            <input name="images[]" multiple type="file" class="form-control" />
        </div>


    <!-- نام محصول -->
    <div class="col-md-3">
        <label class="form-label">نام</label>
        <input name="name" value="{{ old('name') }}" type="text" class="form-control" />
        <div class="form-text text-danger">
            @error('name') {{ $message }} @enderror
        </div>
    </div>

    <!-- دسته بندی -->
    <div class="col-md-3">
        <label class="form-label">دسته بندی</label>
        <select name="category_id" class="form-select">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <div class="form-text text-danger">
            @error('category_id') {{ $message }} @enderror
        </div>
    </div>

    <!-- وضعیت -->
    <div class="col-md-3">
        <label class="form-label">وضعیت</label>
        <select name="status" class="form-select">
            <option value="1">فعال</option>
            <option value="0">غیر فعال</option>
        </select>
        <div class="form-text text-danger">
            @error('status') {{ $message }} @enderror
        </div>
    </div>

    <!-- قیمت -->
    <div class="col-md-3">
        <label class="form-label">قیمت</label>
        <input name="price" type="text" value="{{ old('price') }}" class="form-control" />
        <div class="form-text text-danger">
            @error('price') {{ $message }} @enderror
        </div>
    </div>

    <!-- تعداد -->
    <div class="col-md-3">
        <label class="form-label">تعداد</label>
        <input name="quantity" type="text" value="{{ old('quantity') }}" class="form-control" />
        <div class="form-text text-danger">
            @error('quantity') {{ $message }} @enderror
        </div>
    </div>

    <!-- قیمت حراجی -->
    <div class="col-md-3">
        <label class="form-label">قیمت حراجی</label>
        <input name="sale_price" type="text" value="{{ old('sale_price') }}" class="form-control" />
        <div class="form-text text-danger">
            @error('sale_price') {{ $message }} @enderror
        </div>
    </div>

    <!-- تاریخ شروع حراجی -->
    <div class="col-md-3">
        <label class="form-label">تاریخ شروع حراجی</label>
        <input data-jdp name="date_on_sale_from" type="text" class="form-control" />
        <div class="form-text text-danger">
            @error('date_on_sale_from') {{ $message }} @enderror
        </div>
    </div>

    <!-- تاریخ پایان حراجی -->
    <div class="col-md-3">
        <label class="form-label">تاریخ پایان حراجی</label>
        <input data-jdp name="date_on_sale_to" type="text" class="form-control" />
        <div class="form-text text-danger">
            @error('date_on_sale_to') {{ $message }} @enderror
        </div>
    </div>

    <!-- توضیحات -->
    <div class="col-md-12">
        <label class="form-label">توضیحات</label>
        <textarea name="description" rows="5" class="form-control">{{ old('description') }}</textarea>
        <div class="form-text text-danger">
            @error('description') {{ $message }} @enderror
        </div>
    </div>

    <!-- دکمه ارسال -->
    <div>
        <button type="submit" class="btn btn-outline-dark mt-3">ایجاد محصول</button>
    </div>
</form>
@endsection
