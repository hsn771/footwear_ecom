@extends('layouts.app_back')
@section('pageTitle','Add New Size')
@section('content')

<div class="body-wrapper-inner">
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
          <h3>Add New Product</h3>
            <form action="{{route('size.store')}}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                <label for="size_label">Size Label</label>
                <input type="number" class="form-control" id="size_label" name="size_label" placeholder="Size Label">
              </div>
              <button type="submit" class="btn btn-info mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection