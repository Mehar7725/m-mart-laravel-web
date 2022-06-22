@extends('layouts.front')


@section('title')
    Category
@endsection

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($category as $cate)
                    <div class="col-md-3 mb-3">
                    <a href="{{ url('category/'.$cate->slug) }}">
                        <div class="card p-3" >
                            <img width="70%" src="{{ asset('assets/uploads/category/'.$cate->image) }} " alt="Category Image">
                            <div class="card-body">
                                <h6>{{ $cate->name }}</h6>
                                <p>{{ $cate->description }}</p>
                               
                            </div>
                        </div>
                    </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection