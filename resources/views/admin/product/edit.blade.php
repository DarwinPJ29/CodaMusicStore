@extends('layout.admin')
@section('admin-main')
    @include('admin.components.navbar')
    @include('admin.components.sidebar')
    <div class="row d-flex justify-content-center pt-5" id="main-container">
        <div class="col-5 mt-5 p-3 create-prod-container">
            <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <a href="{{ route('product.index') }}" class="nav-link text-end"><i class="fa-solid fa-arrow-left"></i>
                    back</a>
                <h3 class="text-start text-primary-color">
                    Update Product
                </h3>
                <div class="row">
                    <div class="col mb-1">
                        <label for="formGroupExampleInput" class="form-label">Product Category</label>
                        <select class="form-select" aria-label="Default select example" name="category">
                            <option value="Terno Shirt + Short"
                                {{ $product->category === 'Terno Shirt + Short' ? 'Selected' : '' }}>Terno Shirt + Short
                            </option>
                            <option value="Terno Shirt + Jogger"
                                {{ $product->category === 'Terno Shirt + Jogger' ? 'Selected' : '' }}>Terno Shirt + Jogger
                            </option>
                            <option value="Terno Shirt + Flair Pants"
                                {{ $product->category === 'Terno Shirt + Flair Pants' ? 'Selected' : '' }}>Terno Shirt +
                                Flair
                                Pants</option>
                            <option value="Terno Shirt + Skirts"
                                {{ $product->category === 'Terno Shirt + Skirts' ? 'Selected' : '' }}>Terno Shirt + Skirts
                            </option>
                            <option value="Terno Sando + Short"
                                {{ $product->category === 'Terno Sando + Short' ? 'Selected' : '' }}>Terno Sando + Short
                            </option>
                            <option value="Terno Sando + Skirts"
                                {{ $product->category === 'Terno Sando + Skirts' ? 'Selected' : '' }}>Terno Sando + Skirts
                            </option>
                            <option value="Terno Long Sleeves + Jogger"
                                {{ $product->category === 'Terno Long Sleeves + Jogger' ? 'Selected' : '' }}>Terno Long
                                Sleeves
                                +
                                Jogger</option>
                            <option value="Terno Long Sleeves + Pants"
                                {{ $product->category === 'Terno Long Sleeves + Pants' ? 'Selected' : '' }}>Terno Long
                                Sleeves
                                + Pants</option>
                            <option value="Terno Polo Sleepwear"
                                {{ $product->category === 'Terno Polo Sleepwear' ? 'Selected' : '' }}>Terno Polo
                                Sleepwear</option>
                            <option value="Dress" {{ $product->category === 'Dress' ? 'Selected' : '' }}>Dress</option>
                        </select>
                    </div>
                    <div class="col mb-1">
                        <label for="code" class="form-label">Product Code</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                            placeholder="Input code" name="code" value="{{ $product->code }}" disabled>
                        @error('code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-1">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            placeholder="Input name" name="name" value="{{ $product->name }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-1">
                        <label for="price" class="form-label">Product Price</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                            placeholder="Input price" name="price" value="{{ $product->price }}">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-1">
                    <div class="form-floating">
                        <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Description" id="desc"
                            name="description">{{ $product->description }}</textarea>
                        <label for="desc">Description</label>
                    </div>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-1">
                    <label for="file" class="form-label">Product Image</label>
                    <img src="{{ url('/storage/products/' . $product->file) }}" alt="" srcset=""
                        class="w-100" style="height: 250px">
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Upload new Image</label>
                    <input type="file" class="form-control @error('file') is-invalid @enderror" id="file"
                        name="file" value="{{ old('file') }} " accept="image/png, image/jpeg, image/jpg">
                    @error('file')
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
