@extends('layout.website')
@section('website-main')
    @include('website.components.navbar_logo')
    <div class="form-container row px-5 d-flex justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-10  p-3 border form-holder">
            <form action="{{ route('editUser') }}" method="post">
                @csrf
                <h3 class="text-label"><b>Edit Account</b> </h3>
                <div class="mb-1">
                    <label for="name" class="form-label text-label"><b>Name</b></label>
                    <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name"
                        placeholder="Enter your name:" name="name" value="{{ auth()->user()->name }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-1">
                    <label for="email" class="form-label text-label"><b>email</b></label>
                    <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email"
                        placeholder="Enter your email:" name="email" value="{{ auth()->user()->email }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-1">
                    <label for="contact" class="form-label text-label"><b>Contact</b></label>
                    <input type="text" class="form-control  @error('contact') is-invalid @enderror" id="contact"
                        placeholder="Enter your contact:" name="contact" value="{{ auth()->user()->contact }}">
                    @error('contact')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-1">
                    <label for="name" class="form-label text-label"><b>Address</b></label>
                    <textarea type="text" class="form-control  @error('address') is-invalid @enderror" id="name"
                        placeholder="Enter your address:" name="address">{{ auth()->user()->address }}</textarea>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn solid-button w-100">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
