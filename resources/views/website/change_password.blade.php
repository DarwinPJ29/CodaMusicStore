@extends('layout.website')
@section('website-main')
    @include('website.components.navbar_logo')
    <div class="form-container row px-5 d-flex justify-content-center">
        <div class="d-flex justify-content-end ">
            @if (auth()->user()->role === 0)
            <a href="{{ route('index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
            @else
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm">Back</a>
            @endif

        </div>
        <div class="col-lg-4 col-md-6 col-sm-10  p-3 border form-holder">
            <form action="{{ route('changePassword') }}" method="post">
                @csrf
                <h3 class="text-label"> <b>Change Password</b> </h3>
                <div class="mb-1">
                    <label for="checkbox_show_password" class="form-label text-label"><b>Old Password</b></label>
                    <input type="password" class="form-control  @error('password_old') is-invalid @enderror"
                        id="checkbox_show_password" placeholder="Input password" name="password_old"
                        value="{{ @old('password_old') }}">
                    @error('password_old')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-1">
                    <label for="checkbox_show_password_new" class="form-label text-label"><b>New Password</b></label>
                    <input type="password" class="form-control  @error('password_new') is-invalid @enderror"
                        id="checkbox_show_password_new" placeholder="Input password" name="password_new"
                        value="{{ @old('password_new') }}">
                    @error('password_new')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-1">
                    <label for="checkbox_show_password_confirm" class="form-label text-label"><b>Confirm
                            Password</b></label>
                    <input type="password" class="form-control  @error('password_confirm') is-invalid @enderror"
                        id="checkbox_show_password_confirm" placeholder="Input password" name="password_confirm"
                        value="{{ @old('password_confirm') }}">
                    @error('password_confirm')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input " type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked" onclick="showThreePassword()">
                        Show password
                    </label>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn solid-button w-100">Change password</button>
                </div>
            </form>
        </div>
    </div>
@endsection
