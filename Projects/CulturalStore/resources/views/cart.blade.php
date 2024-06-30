@extends('layouts.master')
@section('content')
<div class="container p-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h4 class="fw-bold mb-0 text-black">Shopping Cart</h4>
        <h6 class="mb-0 text-muted">{{ $cartItems->count() }} items</h6>
    </div>

    <div class="row mb-4">
        <div class="col-md-2 col-lg-2 col-xl-2"><strong>Image</strong></div>
        <div class="col-md-3 col-lg-3 col-xl-3"><strong>Product Name</strong></div>
        <div class="col-md-3 col-lg-3 col-xl-3"><strong>Quantity</strong></div>
        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1"><strong>Subtotal</strong></div>
        <div class="col-md-1 col-lg-1 col-xl-1 text-end"><strong>Remove</strong></div>
        <div class="col-md-1 col-lg-1 col-xl-1 text-end"><strong>Update</strong></div>
    </div>

    @foreach($cartItems as $item)
        <div class="row mb-4 d-flex justify-content-between align-items-center">
            <div class="col-md-2 col-lg-2 col-xl-2">
                <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid rounded-3" alt="{{ $item->name }}">
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3">
                <h6 class="text-black mb-0">{{ $item->name }}</h6>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3">
                <h6 class="text-black mb-0">{{ $item->qty }}</h6>
            </div>
            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h6 class="mb-0">{{ number_format($item->subtotal, 2) }}</h6>
            </div>
            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a href="{{ route('cart.remove', $item->id) }}" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
          &nbsp;&nbsp;&nbsp;
                <a href="{{ route('cart.update', $item->id) }}" class="text-primary"><i class="fas fa-sync-alt fa-lg"></i></a>
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-between align-items-center">
        <h4 class="fw-bold text-black">Total: {{ number_format($subtotal, 2) }}</h4>
    </div>

    <h6 class="mb-0 mt-4 text-body cursor-pointer" onclick="window.history.back();">
        <i class="fas fa-long-arrow-alt-left mr-2"></i>Back to shop
    </h6>
</div>
@endsection
