
@extends('layout.master')

@section('title' , 'Slider Create')


@section('content')
 
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">داشبورد</h4>
    </div>

    <form class="row gy-4">
        <div class="col-md-6">
            <label class="form-label">عنوان</label>
            <input name="title" type="text" class="form-control" />
        </div>
        <div class="col-md-3">
            <label class="form-label">عنوان لینک</label>
            <input name="link" type="text" class="form-control" />
        </div>
        <div class="col-md-3">
            <label class="form-label">آدرس لینک</label>
            <input name="link" type="text" class="form-control" />
        </div>
        <div class="col-md-12">
            <label class="form-label">متن</label>
            <textarea name="body" class="form-control" rows="3"></textarea>
        </div>

        <div>
            <button type="submit" class="btn btn-outline-dark mt-3">
                ایجاد اسلایدر
            </button>
        </div>
    </form>

@endsection