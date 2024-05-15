@extends('layout.website')
@section('website-main')
    @include('website.components.navbar')
    <div class="container pt-5">
        <div class="row mt-5 px-3">
            <div class="col">
                <h1>My Cart</h1>
            </div>
            <div class="col pt-3 text-end">
                <h5> <a href="{{ route('checkoutHistory') }}" class="nav-link"><i class="fa-solid fa-arrow-right"></i> Payment
                        History</a></h5>
            </div>
            <hr>
            <h5 class="text-end"><b>Total
                    @php
                        $convert = (string) $total; // convert into a string
                        $convert = strrev($convert); // reverse string
                        $arr = str_split($convert, '3'); // break string in 3 character sets
                        $converted = implode(',', $arr); // implode array with comma
                        $converted = strrev($converted); // reverse string back
                    @endphp
                    <i class="fa-solid fa-peso-sign"></i> {{ $converted }}</b>
            </h5>
            {{-- Table of Product --}}
            <table class="table table-hover table-md table-striped border" id="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Amount</th>
                        <th scope="col" style="width: 100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                        <tr class="tr">
                            <td class="pt-4">{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ url('/storage/products/' . $cart->file) }}" class="d-block table-image">
                            </td>
                            <td class="pt-4">{{ $cart->name }}</td>
                            <td class="pt-4">
                                @php
                                    $convert = (string) $cart->price; // convert into a string
                                    $convert = strrev($convert); // reverse string
                                    $arr = str_split($convert, '3'); // break string in 3 character sets
                                    $converted = implode(',', $arr); // implode array with comma
                                    $converted = strrev($converted); // reverse string back
                                @endphp
                                <i class="fa-solid fa-peso-sign"></i> {{ $converted }}
                            </td>
                            <td class="pt-4">
                                @php
                                    $convert = (string) $cart->quantity; // convert into a string
                                    $convert = strrev($convert); // reverse string
                                    $arr = str_split($convert, '3'); // break string in 3 character sets
                                    $converted = implode(',', $arr); // implode array with comma
                                    $converted = strrev($converted); // reverse string back
                                @endphp
                                {{ $converted }}
                            </td>
                            <td class="pt-4">
                                @php
                                    $convert = (string) $cart->amount; // convert into a string
                                    $convert = strrev($convert); // reverse string
                                    $arr = str_split($convert, '3'); // break string in 3 character sets
                                    $converted = implode(',', $arr); // implode array with comma
                                    $converted = strrev($converted); // reverse string back
                                @endphp
                                <i class="fa-solid fa-peso-sign"></i> {{ $converted }}
                            </td>
                            <td class="pt-4">
                                <button data-bs-toggle="modal" data-bs-target="#qtyEdit{{ $cart->id }}"
                                    class="btn btn-sm btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </button>
                                <a href="{{ route('get.checkout', $cart->id) }}" class="btn btn-sm btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                    </svg>
                                </a>
                                <button data-bs-toggle="modal" data-bs-target="#remove{{ $cart->id }}"
                                    class="btn btn-sm btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        @include('website.modal.cart_modal')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
