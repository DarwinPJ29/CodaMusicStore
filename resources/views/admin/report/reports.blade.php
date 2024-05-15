@extends('layout.admin')
@section('admin-main')
    @include('admin.components.navbar')
    @include('admin.components.sidebar')
    <div class="row mt-5" id="main-container">
        <div class="row  mt-5">
            <div class="row mt-3 border-top pt-2">
                <div class="row mb-2">
                    <div class="col">
                        <p><b>Total Expenditures : </b>
                            <span>
                                @php
                                    $convert = (string) $expenditures; // convert into a string
                                    $convert = strrev($convert); // reverse string
                                    $arr = str_split($convert, '3'); // break string in 3 character sets
                                    $converted = implode(',', $arr); // implode array with comma
                                    $converted = strrev($converted); // reverse string back
                                @endphp
                                <i class="fa-solid fa-peso-sign"></i> {{ $converted }}
                            </span> <br>
                            <b>Total Revenues : </b>
                            <span>
                                @php
                                    $convert = (string) $revenues; // convert into a string
                                    $convert = strrev($convert); // reverse string
                                    $arr = str_split($convert, '3'); // break string in 3 character sets
                                    $converted = implode(',', $arr); // implode array with comma
                                    $converted = strrev($converted); // reverse string back
                                @endphp
                                <i class="fa-solid fa-peso-sign"></i> {{ $converted }}
                            </span> <br>
                            <b>Total Profit : </b>
                            <span>
                                @php
                                    $convert = (string) $revenues - $expenditures; // convert into a string
                                    $convert = strrev($convert); // reverse string
                                    $arr = str_split($convert, '3'); // break string in 3 character sets
                                    $converted = implode(',', $arr); // implode array with comma
                                    $converted = strrev($converted); // reverse string back
                                @endphp
                                <i class="fa-solid fa-peso-sign"></i> {{ $converted }}
                            </span>
                        </p>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="{{ route('generateToPdf') }}" class="btn solid-button"><i
                                class="fa-solid fa-file-pdf fs-4"></i></a>
                    </div>
                </div>

                {{-- Table of Report --}}
                <table class="table table-hover table-md table-striped border" id="table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Code</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Sold</th>
                            <th scope="col">Revenue</th>
                            <th scope="col">Expenditures</th>
                            <th scope="col">Profit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product_array as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    @php
                                        $convert = (string) $product->price; // convert into a string
                                        $convert = strrev($convert); // reverse string
                                        $arr = str_split($convert, '3'); // break string in 3 character sets
                                        $converted = implode(',', $arr); // implode array with comma
                                        $converted = strrev($converted); // reverse string back
                                    @endphp
                                    <i class="fa-solid fa-peso-sign"></i> {{ $converted }}
                                </td>
                                <td>
                                    @php
                                        $convert = (string) $product->quantity; // convert into a string
                                        $convert = strrev($convert); // reverse string
                                        $arr = str_split($convert, '3'); // break string in 3 character sets
                                        $converted = implode(',', $arr); // implode array with comma
                                        $converted = strrev($converted); // reverse string back
                                    @endphp
                                    {{ $converted }}
                                </td>
                                <td>
                                    @php
                                        $convert = (string) $product->amount; // convert into a string
                                        $convert = strrev($convert); // reverse string
                                        $arr = str_split($convert, '3'); // break string in 3 character sets
                                        $converted = implode(',', $arr); // implode array with comma
                                        $converted = strrev($converted); // reverse string back
                                    @endphp
                                    <i class="fa-solid fa-peso-sign"></i> {{ $converted }}
                                </td>
                                <td>
                                    @php
                                        $convert = (string) $product->amount_bundle; // convert into a string
                                        $convert = strrev($convert); // reverse string
                                        $arr = str_split($convert, '3'); // break string in 3 character sets
                                        $converted = implode(',', $arr); // implode array with comma
                                        $converted = strrev($converted); // reverse string back
                                    @endphp
                                    <i class="fa-solid fa-peso-sign"></i> {{ $converted }}
                                </td>
                                <td>
                                    @php
                                        $profit = $product->amount - $product->amount_bundle;
                                        $convert = (string) $profit; // convert into a string
                                        $convert = strrev($convert); // reverse string
                                        $arr = str_split($convert, '3'); // break string in 3 character sets
                                        $converted = implode(',', $arr); // implode array with comma
                                        $converted = strrev($converted); // reverse string back
                                        
                                        $string = 'Net Income';
                                        if ($converted < 1) {
                                            $string = 'Net Loss';
                                        }
                                    @endphp
                                    <p><span
                                            class="Text-muted {{ $converted < 1 ? 'text-danger' : 'text-success' }}">{{ $string }}</span>
                                        <br>
                                        <i class="fa-solid fa-peso-sign"></i> {{ $converted }}
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
