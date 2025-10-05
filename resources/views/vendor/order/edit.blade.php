@extends('vendor.layouts.app')
@section('pageTitle','Update order')
@section('content')

<div class="body-wrapper-inner">
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
          <h3>Update order</h3>
            <form action="{{route('vendor.order.update', $order->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @forelse ($order->orderItems->where('vendor_id',auth()->guard('vendor')->id()) as $or)
                    <div class="form-group">
                        <label for="status">{{$or->product?->name}} Status </label>
                        <select name="status[{{$or->id}}]" class="form-control">
                            <option value="">Select Status</option>
                            <option value="0" @if($or->status=="0") selected @endif>Pending</option>
                            <option value="1" @if($or->status=="1") selected @endif>Delivered</option>
                            <option value="2" @if($or->status=="2") selected @endif>Cancel</option>
                        </select>
                    </div>
                @empty
                @endforelse
              <button type="submit" class="btn btn-info mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection
