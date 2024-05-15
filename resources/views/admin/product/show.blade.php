@extends('layout.admin')
@section('admin-main')
    @include('admin.components.navbar')
    @include('admin.components.sidebar')
    <div class="row px-5 mt-5 " id="main-container">

        <div class="col-lg col-md-8 mt-5 view-image ">
            <img src="{{ url('/storage/products/' . $product->file) }}" class="d-block ">
        </div>
        <div class="col-lg col-md-4  mt-5 pt-5 ">
            <h3 class="bold">Code: <span class="text-muted">
                    {{ $product->code }}</span></h3>
            <h4 class="bold">Name: <span class="text-muted">{{ $product->name }}</span></h4>
            <h4 class="bold">Description: <span class="text-muted">{{ $product->description }}</span></h4>
            <h4 class="bold">Price: <span class="text-muted"><i class="fa-solid fa-peso-sign"></i>
                    {{ $product->price }}.00</span></h4>
            <h4 class="bold">Category: <span class="text-muted"> {{ $product->category }}</span></h4>
            <hr>
            <div class="text-end">
                <a href="{{ route('product.index') }}" class="btn text-end solid-button "><i
                        class="fa-solid fa-arrow-left"></i>
                    back</a>
            </div>
        </div>
    </div>
@endsection
