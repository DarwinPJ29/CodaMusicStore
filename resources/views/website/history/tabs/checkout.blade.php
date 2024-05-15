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
                        <th scope="col">Date</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                        <tr class="tr">
                            <td class="pt-4">{{ $loop->iteration }}</td>

                            <td>
                                <img src="{{ url('/storage/products/' . $cart->file) }}" class="d-block table-image">
                            </td>
                            <td class="pt-4">
                                {{ date_format($cart->created_at, 'F d, Y') }}
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
                            <td class="pt-4">{{ ucwords($cart->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
