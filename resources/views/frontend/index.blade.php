@extends('layouts.front')


@section('title')
    Welcome to M-Mart
@endsection

@section('content')
@include('layouts.inc.slider')
   
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Featured Products</h2>
            <div class="owl-carousel owl-theme">

                @foreach ($fetured_products as $prod)
                <div class="item">
                    <a href="{{ url('category/'.$prod->category->slug.'/'.$prod->slug) }}">
                    <div class="card p-3">
                        <img width="70%" src="{{ asset('assets/uploads/product/'.$prod->image) }} " alt="Product Image">
                        <div class="card-body">
                            <h6>{{ $prod->name }}</h6>
                            <span class="float-start">{{ $prod->selling_price }}</span>
                            <span class="float-end"> <s> {{ $prod->original_price }} </s> </span>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach

            </div>
           

        </div>
    </div>
</div>
   
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Trending Category</h2>
            <div class="owl-carousel owl-theme">

                @foreach ($trending_category as $tcategory)
                <div class="item">
                    <a href="{{ url('category/'.$tcategory->slug) }}">
                    <div class="card p-3">
                        <img width="70%" src="{{ asset('assets/uploads/category/'.$tcategory->image) }} " alt="Product Image">
                        <div class="card-body">
                            <h6>{{ $tcategory->name }}</h6>
                            <p>{{ $tcategory->description }}</p>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach

            </div>
           

        </div>
    </div>
</div>

@endsection



@section('scripts')
<script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
    
@endsection