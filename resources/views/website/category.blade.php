@extends('layout.website')
@section('website-main')
    @include('website.components.navbar')
    <div class="container pt-5 ">
    @section('titles')
        <h8 class="text-center "><b>{{ $category }}</b></h8>
    @endsection
    @include('website.components.products')
</div>
@include('website.components.footer')
@endsection
