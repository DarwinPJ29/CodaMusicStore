@extends('layout.website')
@section('website-main')
    @include('website.components.navbar_logo')
    <div class="form-container row px-5 d-flex justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-10  p-5 border form-holder">
            <form action="{{ route('signin') }}" method="post">
                @csrf
                <h2 class="text-labeltop"> <b>Login</b> </h2>
                @if (Session::has('activated'))
                    <div class="alert alert-success" role="alert">
                        <b>{{ Session::get('activated') }}</b>
                    </div>
                @endif
                @if (Session::has('inactivated'))
                    <div class="alert alert-danger" role="alert">
                        <b>{{ Session::get('inactivated') }}</b>
                    </div>
                @endif
                @if (Session::has('invalid'))
                    <div class="alert alert-danger" role="alert">
                        <b>{{ Session::get('invalid') }}</b>
                    </div>
                @endif
                <div class="mb-1">
                    <label for="email" class="form-label text-label"><b>Email</b></label>
                    <input type="text" class="form-control  @error('email') is-invalid @enderror " id="email"
                        placeholder="Input email address" name="email" value="{{ @old('email') }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-1">
                    <label for="checkbox_show_password" class="form-label text-label"><b>Password</b></label>
                    <input type="password" class="form-control  @error('password') is-invalid @enderror"
                        id="checkbox_show_password" placeholder="Input password" name="password"
                        value="{{ @old('password') }}">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input " type="checkbox" value="" id="flexCheckChecked"
                        onclick="showPassword()">
                    <label class="form-check-label" for="flexCheckChecked" onclick="showPassword()">
                        Show password
                    </label>
                </div>
                <div class="mb-4">
                    <button type="submit" class="btn solid-button w-100">Login</button>
                </div>
                <hr>
                <div class="mb-5">
                    <a href="{{ route('signup') }}" class="btn outline-button  w-100">Create Account</a>
                </div>
            </form>
        </div>
    </div>
@endsection
