@extends('layout.admin')
@section('admin-main')
    @include('admin.components.navbar')
    @include('admin.components.sidebar')
    <div class="row mt-5" id="main-container">
        <div class="row  mt-5">
            <div class="row mt-3 border-top pt-2">
                {{-- Table of Stocks --}}
                <table class="table table-hover table-md table-striped border" id="table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Code</th>
                            <th scope="col">Product</th>
                            <th scope="col">Stocks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stocks as $stock)
                            <tr class="{{ $stock->quantity <= 10 ? 'bg-danger' : '' }}">
                                <td class="{{ $stock->quantity <= 10 ? 'text-light' : '' }}">{{ $loop->iteration }}</td>
                                <td class="{{ $stock->quantity <= 10 ? 'text-light' : '' }}">{{ $stock->code }}</td>
                                <td class="{{ $stock->quantity <= 10 ? 'text-light' : '' }}">{{ $stock->name }}</td>
                                <td class="{{ $stock->quantity <= 10 ? 'text-light' : '' }}">
                                    @php
                                        $convert = (string) $stock->quantity; // convert into a string
                                        $convert = strrev($convert); // reverse string
                                        $arr = str_split($convert, '3'); // break string in 3 character sets
                                        $converted = implode(',', $arr); // implode array with comma
                                        $converted = strrev($converted); // reverse string back
                                    @endphp
                                    {{ $converted }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
