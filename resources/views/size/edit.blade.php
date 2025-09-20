@extends('layouts.app_back')
@section('pageTitle',content: 'Edit Sizes')
@section('content')

<div class="body-wrapper-inner">
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
          <h3>Update Products</h3>
            <form action="{{route('size.update', $size->id)}}" method="post">
                @csrf
                @method('PATCH')
              <div class="form-group">
                <label for="size_label">Size Label</label>
                <input type="number" class="form-control" id="size_label" name="size_label" placeholder="Size Label" value="{{$size->name}}">
              </div>
              <button type="submit" class="btn btn-info mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection