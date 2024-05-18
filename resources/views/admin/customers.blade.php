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
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Adress</th>
                            <th scope="col">Registered Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->contact }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>
                                    {{ date_format($customer->updated_at, 'F d, Y') }}
                                </td>
                                <td>
                                    <p class="{{ $customer->activated === 1 ? 'text-success' : ' text-danger' }}">
                                        {{ $customer->activated === 0 ? 'Deactivate' : 'Active' }}</p>
                                </td>
                                <td>
                                    <!-- Deactivate button: visible when activated is 1 -->
                                    <button class="btn text-danger {{ $customer->activated === 1 ? '' : 'd-none' }}"
                                        data-bs-toggle="modal" data-bs-target="#deactivate{{ $customer->id }}">
                                        <i class="fa-solid fa-lock"></i>
                                    </button>

                                    <!-- Activate button: visible when activated is not 1 -->
                                    <button class="btn text-success {{ $customer->activated === 1 ? 'd-none' : '' }}"
                                        data-bs-toggle="modal" data-bs-target="#activate{{ $customer->id }}">
                                        <i class="fa-solid fa-key"></i>
                                    </button>
                                </td>
                            </tr>
                            @include('admin.customer.modal.customer-modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
