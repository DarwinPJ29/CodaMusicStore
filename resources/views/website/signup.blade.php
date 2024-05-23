@extends('layout.website')
@section('website-main')
    @include('website.components.navbar_logo')
    <div class="form-container row px-5 d-flex justify-content-center">
        <div class="col-lg-6 col-md-10 col-sm-12  p-5 border form-holder">
            <form action="{{ route('signup') }}" method="post">
                @csrf
                <h2 class="text-label"> <b>Create Account</b> </h2>
                <div class="row">
                    <div class=" col mb-1">
                        <label for="name" class="form-label text-label"><b>Name</b></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            placeholder="Input Name (FN, LN)" name="name" value="{{ @old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class=" col mb-1">
                        <label for="contact" class="form-label text-label"><b>Contact</b></label>
                        <input type="text" class="form-control  @error('contact') is-invalid @enderror" id="contact"
                            placeholder="Input Mobile number" name="contact" value="{{ @old('contact') }}">
                        @error('contact')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-1">
                    <label for="Address" class="form-label text-label"><b>Address</b></label>
                    <input type="text" class="form-control  @error('address') is-invalid @enderror" id="address"
                        placeholder="Input Address" name="address" value="{{ @old('address') }}">
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row mb-2">
                    <div class="col mb-1">
                        <label for="email" class="form-label text-label"><b>Email</b></label>
                        <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email"
                            placeholder="Input email address" name="email" value="{{ @old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-1">
                        <label for="checkbox_show_password" class="form-label text-label"><b>Password</b></label>
                        <input type="password" class="form-control  @error('password') is-invalid @enderror"
                            id="checkbox_show_password" placeholder="Input password" name="password"
                            value="{{ @old('password') }}">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-check">
                            <input class="form-check-input " type="checkbox" value="" id="flexCheckChecked"
                                onclick="showPassword()">
                            <label class="form-check-label" for="flexCheckChecked">
                                Show password
                            </label>
                        </div>
                    </div>

                </div>
                <div class="mb-4">
                    <button type="submit" class="btn solid-button w-100">Submit</button>
                </div>
                <hr>
                <div class="mb-3">
                    <a href="{{ route('signin') }}" class="btn outline-button w-100">Login</a>
                </div>
            </form>
        </div>
    </div>
@endsection
