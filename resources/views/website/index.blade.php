@extends('layout.website')
@section('website-main')
    @include('website.components.navbar')
    <div class=" pt-5 overflow-x-hidden">
        {{-- Hero Section --}}
        <div class="image-container-hero">
            {{-- <img src="{{ asset('assets/images/guitarbg.png') }}" class="img-hero" alt="..." > --}}
                <div class="d-flex justify-content-end me-5 pt-5">
                    <div class="ms-5">
                        <p class="text-uppercase fw-bold title-text text-white">
                            the <br> persuit of music <br>PERFECTION
                        </p>
                        <p class="text-uppercase text-white coda "> coda music store</p>
                    </div>
                </div>
        </div>
    </div>

@section('titles')
    <h1 class="text-center"><b>Our Products</b></h1>
@endsection
@include('website.components.products')

</div>
@include('website.components.footer')
@endsection
