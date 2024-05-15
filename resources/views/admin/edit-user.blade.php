@extends('layout.admin')
@section('admin-main')
    @include('admin.components.navbar')
    @include('admin.components.sidebar')
    <div class="row mt-5" id="main-container">
        <div class="box-shadow">
            <h3 class="text-start mt-2">Edit Accounts</h3>
            <hr>
            <form action="{{ route('updateAccount', $user->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-8 m-auto">
                        <div class="">
                            <label for="firstName">Name <span class="text-danger">*</span></label>
                            <input type="text" name="first_name" id="firstName" class="form-control mb-2"
                                placeholder="Enter First Name:" value="{{ $user->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control mb-2"
                                placeholder="Enter Email:" value="{{ $user->email }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="">
                            <label for="contact">Contact <span class="text-danger">*</span></label>
                            <input type="contact" name="contact" id="contact" class="form-control mb-2"
                                placeholder="Enter contact:" value="{{ $user->contact }}">
                            @error('contact')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="">
                            <label for="address">Address <span class="text-danger">*</span></label>
                            <textarea type="address" name="address" id="address" class="form-control mb-2" placeholder="Enter address:">{{ $user->address }}</textarea>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-primary w-50">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
