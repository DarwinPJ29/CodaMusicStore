@extends('layout.admin')
@section('admin-main')
    @include('admin.components.navbar')
    @include('admin.components.sidebar')
    <div class="row mt-5" id="main-container">
        <div class="row  mt-5">

            <div class="row mt-3 pt-2">
                @include('admin.receipt.tabs_navbar')
                {{-- Table of Request --}}
                <table class="table table-hover table-md table-striped border" id="table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Date</th>
                            <th scope="col">Customer Information</th>
                            <th scope="col">Order Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reqs as $req)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {{ date_format($req->updated_at, 'F d, Y') }}</td>
                                <td>
                                    <p>Name: <span class="text-muted">{{ $req->name }}</span> <br>
                                        Email: <span class="text-muted">{{ $req->email }}</span> <br>
                                        Contact: <span class="text-muted">{{ $req->contact }}</span> <br>
                                        Address: <span class="text-muted">{{ $req->address }}</span>
                                    </p>
                                </td>

                                <td>
                                    <p>Code: <span class="text-muted">{{ $req->product_code }}</span> <br>
                                        Price : <span class="text-muted">
                                            @php
                                                $convert = (string) $req->product_price; // convert into a string
                                                $convert = strrev($convert); // reverse string
                                                $arr = str_split($convert, '3'); // break string in 3 character sets
                                                $converted = implode(',', $arr); // implode array with comma
                                                $converted = strrev($converted); // reverse string back
                                            @endphp
                                            <i class="fa-solid fa-peso-sign"></i> {{ $converted }}.00
                                        </span> <br>
                                        Quantity: <span class="text-muted">
                                            @php
                                                $convert = (string) $req->quantity; // convert into a string
                                                $convert = strrev($convert); // reverse string
                                                $arr = str_split($convert, '3'); // break string in 3 character sets
                                                $converted = implode(',', $arr); // implode array with comma
                                                $converted = strrev($converted); // reverse string back
                                            @endphp
                                            {{ $converted }}
                                        </span>
                                        <br>
                                        Total: <span class="text-muted">
                                            @php
                                                $convert = (string) $req->quantity * $req->product_price; // convert into a string
                                                $convert = strrev($convert); // reverse string
                                                $arr = str_split($convert, '3'); // break string in 3 character sets
                                                $converted = implode(',', $arr); // implode array with comma
                                                $converted = strrev($converted); // reverse string back
                                            @endphp
                                            <i class="fa-solid fa-peso-sign"></i> {{ $converted }}.00
                                        </span>
                                    </p>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
