@extends('layout.admin')
@section('admin-main')
    @include('admin.components.navbar')
    @include('admin.components.sidebar')
    <div class="row d-flex justify-content-center pt-5" id="main-container">
        <div class="col-5 mt-5 p-3 create-prod-container">
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <a href="{{ route('product.index') }}" class="nav-link text-end"><i class="fa-solid fa-arrow-left"></i>
                    back</a>
                <h3 class="text-start text-primary-color">
                    Create new Product
                </h3>
                <div class="row">
                    <div class="col mb-1">
                        <label for="formGroupExampleInput" class="form-label">Product Category</label>
                        <select class="form-select" aria-label="Default select example" name="category">
                            <option value=""selected hidden>Select Category</option>
                            <option value="Drums"
                                {{ old('category') === 'Drums' ? 'Selected' : '' }}>Drums
                            </option>
                            <option value="Guitar"
                                {{ old('category') === 'Guitar' ? 'Selected' : '' }}>Guitar
                            </option>
                            <option value="Accessories"
                                {{ old('category') === 'Accessories' ? 'Selected' : '' }}>Accessories
                                Pants</option>
                        </select>
                    </div>
                    <div class="col mb-1">
                        <label for="code" class="form-label">Product Code</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                            placeholder="Input code" name="code" value="{{ old('code') }}">
                        @error('code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-1">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            placeholder="Input name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-1">
                        <label for="price" class="form-label">Product Price</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                            placeholder="Input price" name="price" value="{{ old('price') }}">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-1">
                    <div class="form-floating">
                        <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Description" id="desc"
                            name="description">{{ old('description') }}</textarea>
                        <label for="desc">Description</label>
                    </div>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Product Image</label>
                    <input type="file" class="form-control @error('file') is-invalid @enderror" id="file"
                        name="file" value="{{ old('file') }} " accept="image/png, image/jpeg, image/jpg">
                    @error('file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn solid-button w-100">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
