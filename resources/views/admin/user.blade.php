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
                            <th scope="col">Type</th>
                            <th scope="col">Registered Date</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->contact }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->role == 1 ? 'Admin' : 'Customer' }}
                                </td>
                                <td>
                                    {{ date_format($user->updated_at, 'F d, Y') }}
                                </td>
                                <td>
                                    <a class="text-success btn "href="{{ route('editAccount', $user->id) }}"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <button class="text-danger btn deleteUserButton"><i
                                            class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
