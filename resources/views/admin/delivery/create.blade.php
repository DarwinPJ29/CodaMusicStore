@extends('layout.admin')
@section('admin-main')
    @include('admin.components.navbar')
    @include('admin.components.sidebar')
    <div class="row d-flex justify-content-center pt-5" id="main-container">
        <div class="col-4 border mt-5 p-3 create-prod-container">
            <form action="{{ route('delivery.store') }}" method="post">
                @csrf
                <a href="{{ route('delivery.index') }}" class="nav-link text-end"><i class="fa-solid fa-arrow-left"></i>
                    back</a>
                <h5 class="text-start text-primary-color">
                    Receive Delivery
                </h5>
                <div class="mb-2">

                    <select name="product_id" class="form-select @error('product_id') is-invalid @enderror ">
                        <option value="" selected>Please select code</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                {{ $product->code }}</option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-1">
                    <label for="price_bundle" class="form-label">Bundle Price</label>
                    <input type="number" class="form-control @error('price_bundle') is-invalid @enderror" id="price_bundle"
                        value="1" min="1" name="price_bundle">
                    @error('price_bundle')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-1">
                    <label for="quantity_bundle" class="form-label">Quantity of Bundle</label>
                    <input type="number" class="form-control @error('quantity_bundle') is-invalid @enderror"
                        id="quantity_bundle" value="1" min="1" name="quantity_bundle">
                    @error('quantity_bundle')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="amount_bundle" class="form-label">Total Amount</label>
                    <input type="text" class="form-control @error('amount_bundle') is-invalid @enderror"
                        id="amount_bundle" name="amount_bundle" readonly>
                    @error('amount_bundle')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn  solid-button w-75">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
