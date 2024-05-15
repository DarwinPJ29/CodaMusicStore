@extends('layout.website')
@section('website-main')
    @include('website.components.navbar')
    <div class="container py-5">
        <div class="row pt-5 d-flex justify-content-center">
            <div class="col-5 mt-5 form-holder p-3">
                <form action="{{ route('get.checkout', $cart->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <a href="{{ route('view.showCart', $cart->user_id) }}" class="nav-link text-end"><i
                            class="fa-solid fa-arrow-left"></i>
                        back</a>
                    <h3 class="text-center mb-5 mt-3">
                        Please Upload Payment Receipt
                    </h3>
                    <input type="hidden" name="id" value="{{ $cart->id }}">
                    <h5><b>Product name : {{ $cart->name }} </b></h5>
                    <h5><b>Total amount :
                            @php
                                $convert = (string) $cart->total; // convert into a string
                                $convert = strrev($convert); // reverse string
                                $arr = str_split($convert, '3'); // break string in 3 character sets
                                $converted = implode(',', $arr); // implode array with comma
                                $converted = strrev($converted); // reverse string back
                            @endphp
                            <i class="fa-solid fa-peso-sign"></i> {{ $converted }}
                        </b></h5>
                    <div class="m-3">
                        <label for="file" class="form-label">Upload Receipt</label>
                        <input type="file" class="form-control @error('file') is-invalid @enderror" id="file"
                            name="file" accept="image/png, image/jpeg, image/jpg">
                        @error('file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn solid-button w-100">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
