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
                            <th></th>
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
                                <td class="pt-5">
                                    <button data-bs-toggle="modal" data-bs-target="#view{{ $req->id }}"
                                        class="btn btn-md btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-aspect-ratio" viewBox="0 0 16 16">
                                            <path
                                                d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                                            <path
                                                d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z" />
                                        </svg>
                                    </button>
                                </td>
                                @include('admin.receipt.modal.request')
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
