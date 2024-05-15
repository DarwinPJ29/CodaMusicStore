{{-- To Received --}}
<div class="modal fade" id="receive{{ $cart->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Receive Order</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('toReceive') }}" method="post">
                @csrf
                <div class="modal-body">
                    <h5 class="text-center">Are you sure you received the <b> {{ $cart->name }} </b> parcel </h5>
                </div>
                <input type="hidden" name="id" value="{{ $cart->id }}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Confim</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- To Received --}}
