@extends('layout.admin')
@section('admin-main')
    @include('admin.components.navbar')
    @include('admin.components.sidebar')
    <div class="row mt-5" id="main-container">
        <div class="row  mt-5">
            {{-- Button Add Crew --}}
            <div class="col text-end">
                <a href="{{ route('delivery.create') }}" class="btn solid-button">Receive</a>
            </div>
            <div class="row mt-3 border-top pt-2">
                {{-- Table of Delivery --}}
                <table class="table table-hover table-md table-striped border" id="table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Date</th>
                            <th scope="col">Code</th>
                            <th scope="col">Price Bundle</th>
                            <th scope="col">Quantity Bundle</th>
                            <th scope="col">Total Amount </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deliveries as $delivery)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ date_format($delivery->created_at, 'F d, Y') }}
                                </td>
                                <td>{{ $delivery->code }}</td>
                                <td>
                                    @php
                                        $convert = (string) $delivery->price_bundle; // convert into a string
                                        $convert = strrev($convert); // reverse string
                                        $arr = str_split($convert, '3'); // break string in 3 character sets
                                        $converted = implode(',', $arr); // implode array with comma
                                        $converted = strrev($converted); // reverse string back
                                    @endphp
                                    <i class="fa-solid fa-peso-sign"></i> {{ $converted }}

                                </td>
                                <td>
                                    @php
                                        $convert = (string) $delivery->quantity_bundle; // convert into a string
                                        $convert = strrev($convert); // reverse string
                                        $arr = str_split($convert, '3'); // break string in 3 character sets
                                        $converted = implode(',', $arr); // implode array with comma
                                        $converted = strrev($converted); // reverse string back
                                    @endphp
                                    <i class="fa-solid fa-peso-sign"></i> {{ $converted }}
                                </td>
                                <td>
                                    @php
                                        $convert = (string) $delivery->amount_bundle; // convert into a string
                                        $convert = strrev($convert); // reverse string
                                        $arr = str_split($convert, '3'); // break string in 3 character sets
                                        $converted = implode(',', $arr); // implode array with comma
                                        $converted = strrev($converted); // reverse string back
                                    @endphp
                                    <i class="fa-solid fa-peso-sign"></i> {{ $converted }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
