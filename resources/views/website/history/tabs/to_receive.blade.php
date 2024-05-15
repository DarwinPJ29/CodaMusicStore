@extends('layout.website')
@section('website-main')
    @include('website.components.navbar')
    <div class="container mt-5">
        <div class="row pt-5">
            @include('website.history.tabs_navbar')
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
                        <th scope="col">Status</th>
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
                            <td class="pt-4">To {{ ucwords($cart->status) }}</td>
                            <td class="pt-4">
                                <button data-bs-toggle="modal" data-bs-target="#receive{{ $cart->id }}"
                                    class="btn btn-sm btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                        <path
                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                        <path
                                            d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
                                    </svg> Received
                                </button>
                            </td>
                        </tr>
                        @include('website.history.modal.receive')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
