@extends('layout.website')
@section('website-main')
    @include('website.components.navbar')
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-lg col-md-8 mt-5 view-image ">
                <img src="{{ url('/storage/products/' . $product->file) }}">
            </div>
            <div class="col-lg col-md-4  mt-5 pt-5 ">
                <h1 class="text-center text-label"><b>{{ $product->name }}</b></h1>
                <div class="row">
                    <div class="col-3">
                        <h5 class="bold">Description</h5>
                    </div>
                    <div class="col-9">
                        <span class="text-muted">{{ $product->description }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <h5 class="bold">Price</h5>
                    </div>
                    <div class="col-9">
                        <span class="text-muted">
                            @php
                                $convert = (string) $product->price; // convert into a string
                                $convert = strrev($convert); // reverse string
                                $arr = str_split($convert, '3'); // break string in 3 character sets
                                $converted = implode(',', $arr); // implode array with comma
                                $converted = strrev($converted); // reverse string back
                            @endphp
                            <i class="fa-solid fa-peso-sign"></i> {{ $converted }}</span>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <h5 class="bold">Stocks</h5>
                    </div>
                    <div class="col-9">
                        <span class="text-muted">
                            @php
                                $convert = (string) $product->stocks; // convert into a string
                                $convert = strrev($convert); // reverse string
                                $arr = str_split($convert, '3'); // break string in 3 character sets
                                $converted = implode(',', $arr); // implode array with comma
                                $converted = strrev($converted); // reverse string back
                            @endphp
                            {{ $converted }}</span>
                        </span>
                    </div>
                </div>
                <hr>
                <form action="{{ route('get.addToCart', $product->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-3 pt-2">
                            <h5 class="bold">Quantity</h5>
                        </div>
                        <div class="col-9">
                            <input type="number" name="quantity" id="quantity"
                                class="form-control text-center w-25 qty-border" value="1" min="1"
                                max="{{ $product->stocks == 0 ? '1' : $product->stocks }}">

                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn text-end solid-button ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-cart3" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg> Add to Cart
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('website.components.related_products');
@endsection
