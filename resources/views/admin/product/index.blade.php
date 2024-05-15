@extends('layout.admin')
@section('admin-main')
    @include('admin.components.navbar')
    @include('admin.components.sidebar')
    <div class="row mt-5" id="main-container">
        <div class="row  mt-5">
            {{-- Button Add Crew --}}
            <div class="col text-end">
                <a href="{{ route('product.create') }}" class="btn solid-button">Create</a>
            </div>
            <div class="row mt-3 border-top pt-2">
                {{-- Table of Product --}}
                <table class="table table-hover table-md table-striped border" id="table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Image</th>
                            <th scope="col">Code</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Status</th>
                            <th scope="col" style="width: 100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="tr">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ url('/storage/products/' . $product->file) }}" class="d-block table-image">
                                </td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <p class="text-truncate" style="width: 200px">{{ $product->description }}</p>
                                </td>
                                <td>
                                    @php
                                        $convert = (string) $product->price; // convert into a string
                                        $convert = strrev($convert); // reverse string
                                        $arr = str_split($convert, '3'); // break string in 3 character sets
                                        $converted = implode(',', $arr); // implode array with comma
                                        $converted = strrev($converted); // reverse string back
                                    @endphp
                                    {{ $converted }}</td>
                                <td>{{ $product->category }}</td>
                                <td>
                                    <p class="{{ $product->archive === 1 ? 'text-danger' : 'text-success' }}">
                                        {{ $product->archive === 0 ? 'Unarchive' : 'Archive' }}</p>
                                </td>
                                <td>
                                    <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                            <path
                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </a>

                                    <button data-bs-toggle="modal" data-bs-target="#archive{{ $product->id }}"
                                        class="btn btn-sm btn-danger" {{ $product->archive === 0 ? '' : 'hidden' }}>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                            <path
                                                d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                    </button>

                                    <button data-bs-toggle="modal" data-bs-target="#unarchive{{ $product->id }}"
                                        class="btn btn-sm btn-success" {{ $product->archive === 1 ? '' : 'hidden' }}>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-inbox" viewBox="0 0 16 16">
                                            <path
                                                d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438L14.933 9zM3.809 3.563A1.5 1.5 0 0 1 4.981 3h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374l3.7-4.625z" />
                                        </svg>
                                    </button>

                                </td>
                                @include('admin.product.modal.modal')
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
