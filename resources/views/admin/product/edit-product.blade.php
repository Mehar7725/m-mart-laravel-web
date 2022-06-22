@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit/Update Product</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">

                <div class="col-md-12 mb-3">
                    <select class="form-select form-control" >
                        <option value="">{{ $products->category->name }}</option>
                      
                      </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" value="{{ $products->name }}" class="form-control" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" value="{{ $products->slug }}"  class="form-control" name="slug">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Small Description</label>
                    <textarea name="small_description" class="form-control" rows="3">{{ $products->small_description }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ $products->description }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Original Price</label>
                    <input type="number" value="{{ $products->original_price }}" class="form-control" name="original_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Selling Price</label>
                    <input type="number" value="{{ $products->selling_price }}" class="form-control" name="selling_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="number" value="{{ $products->tax }}" class="form-control" name="tax">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quantity</label>
                    <input type="number" value="{{ $products->qty }}"  class="form-control" name="qty">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" {{ $products->status == '1' ? 'checked':'' }}  name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox" {{ $products->trending == '1' ? 'checked':'' }}  name="trending">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" value="{{ $products->meta_title }}" class="form-control" name="meta_title">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords"  class="form-control" rows="3">{{ $products->meta_keywords }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{{ $products->meta_description }}</textarea>
                </div>
                @if ($products->image)
                <img src="{{ asset('assets/uploads/product/'.$products->image) }}" alt="category image">
            @endif
                <div class="col-md-12 mb-3">
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="col-md-12 mb-3">
                   <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
    
@endsection