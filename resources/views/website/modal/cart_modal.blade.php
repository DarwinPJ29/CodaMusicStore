{{-- Edit Quantity --}}
<div class="modal fade" id="qtyEdit{{ $cart->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Quantity</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('patch.updateQuantity', $cart->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <h3 class="text-center text-label"><b>{{ $cart->name }}</b></h3>
                    <div class="row d-flex justify-content-center mt-3">
                        <div class="col d-flex justify-content-center">
                            <label for="checkbox_show_password" class="form-label pt-2 mx-2"><b>Quantity</b></label>
                            <input type="number" name="quantity" id="quantity"
                                class="form-control text-center w-25 qty-border" value="{{ $cart->quantity }}"
                                min="1" max="{{ $cart->stocks }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Edit Quantity --}}

{{-- Remove Product --}}
<div class="modal fade" id="remove{{ $cart->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Remove Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('del.removeProduct', $cart->id) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <h3 class="text-center"><span class="text-danger">Remove</span> <b>{{ $cart->name }} </b> in cart
                        ?</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Remove Product --}}
