@extends('layout.admin')
@section('admin-main')
    @include('admin.components.navbar')
    @include('admin.components.sidebar')
    <div class="row mt-5" id="main-container">
        <div class="row  mt-5">
            <div class="row pt-2">
                <div class="dashboard-card mb-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title "><b>Total Expenditures</b></h5>
                            <div class="row px-3">
                                <div class="col-4 icon "><i class="fa-solid fa-money-bill-wave text-primary-color"></i></div>
                                <div class="col-8 count d-flex justify-content-center">
                                    @php
                                        $convert = (string) $expenditures; // convert into a string
                                        $convert = strrev($convert); // reverse string
                                        $arr = str_split($convert, '3'); // break string in 3 character sets
                                        $converted = implode(',', $arr); // implode array with comma
                                        $converted = strrev($converted); // reverse string back
                                    @endphp
                                    {{ $converted }}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <small class="card-footers"><a href="{{ route('reports') }}" class="nav-link">
                                    <b><i class="fa-solid fa-arrow-right"></i> View
                                        Information</b></a></small>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title "><b>Total Revenue</b></h5>
                            <div class="row px-3">
                                <div class="col-4 icon "><i class="fa-solid fa-money-bill-wave text-primary-color"></i>
                                </div>
                                <div class="col-8 count d-flex justify-content-center">
                                    @php
                                        $convert = (string) $revenues; // convert into a string
                                        $convert = strrev($convert); // reverse string
                                        $arr = str_split($convert, '3'); // break string in 3 character sets
                                        $converted = implode(',', $arr); // implode array with comma
                                        $converted = strrev($converted); // reverse string back
                                    @endphp
                                    {{ $converted }}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <small class="card-footers"><a href="{{ route('reports') }}" class="nav-link">
                                    <b><i class="fa-solid fa-arrow-right"></i> View
                                        Information</b></a></small>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title "><b>Total Profit</b></h5>
                            <div class="row px-3">
                                <div class="col-4 icon "><i class="fa-solid fa-money-bill-wave text-primary-color"></i>
                                </div>
                                <div class="col-8 count d-flex justify-content-center">
                                    @php
                                        $convert = (string) $revenues - $expenditures; // convert into a string
                                        $convert = strrev($convert); // reverse string
                                        $arr = str_split($convert, '3'); // break string in 3 character sets
                                        $converted = implode(',', $arr); // implode array with comma
                                        $converted = strrev($converted); // reverse string back
                                    @endphp
                                    {{ $converted }}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <small class="card-footers"><a href="{{ route('reports') }}" class="nav-link">
                                    <b><i class="fa-solid fa-arrow-right"></i> View
                                        Information</b></a></small>
                        </div>
                    </div>
                </div>

                <div class="row px-5">
                    <h5 class="text-primary-color"><b>Low Stocks</b></h5>
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
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $stock->code }}</td>
                                    <td>{{ $stock->name }}</td>
                                    <td>
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
    </div>
@endsection
