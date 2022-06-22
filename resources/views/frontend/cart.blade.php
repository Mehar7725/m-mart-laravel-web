@extends('layouts.front')


@section('title')
   My Cart
@endsection

@section('content')


<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/') }}">Home</a>/
            <a href="{{ url('cart') }}">Cart</a>/
           
        </h6>
    </div>
</div>




<div class="container my-5">
    <div class="card shadow product_data">
        <div class="card-body">
@php
    $total = 0;
@endphp

            @foreach ($cartitems as $item)
            <div class="row">
                <div class="col-md-2 my-auto">
                    <img src="{{ asset('assets/uploads/product/'.$item->products->image) }}" class="w-25" alt="">
                </div>
                <div class="col-md-3 my-auto">
                    <h6>{{ $item->products->name  }}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>{{ $item->products->selling_price  }}</h6>
                </div>
                <div class="col-md-3 my-auto containerr">
                   @if ($item->products->qty >= $item->prod_qty)
                   <label for="Quantity">Quantity</label>
                   <div class="input-group text-center mb-3 button-container" style="width: 130px;">
                       <input type="hidden" value="{{ $item->prod_id }}" class="prod_id">
                       <button  class="input-group-text changeQuantity cart-qty-minus" style="cursor: pointer;">-</button>
                       <input type="text"name="quantity " value="{{ $item->prod_qty }}" class="form-control qty-input text-center" >
                       <button  class="input-group-text changeQuantity cart-qty-plus" style="cursor: pointer;">+</button>
                   </div>
                       
                   @else
                   <h6  class="badge text-danger">Out of stock</h6>
                   @endif
               
                </div>
                <div class="col-md-2 my-auto">
                    {{-- <input type="hidden" value="{{ $item->prod_id }}" class="prod_id"> --}}
                    <button class="btn btn-danger delete-cart-item" data-id="{{$item->prod_id}}"><i class="fa-solid fa-trash-can"></i> Remove</button>
                </div>
            </div>
            <hr>
            @php
    $total += $item->products->selling_price * $item->prod_qty ;
@endphp
            @endforeach

        </div>
        <div class="card-footer">
            <h5>Total Price : Rs {{ $total }}
            
                <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end">Proceed to Checkout</a>
            </h5>
        </div>

    </div>
</div>














@endsection



