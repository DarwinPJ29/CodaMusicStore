<!-- Modal -->
<div class="modal fade" id="view{{ $req->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Accept Receipt</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ url('/storage/receipts/' . $req->file) }}" class="img-fluid w-100">
            </div>
            <div class="modal-footer">
                <a href="{{ route('declineReceipts', $req->id) }}" class="btn btn-danger">Decline</a>
                <a href="{{ route('receiveReceipts', $req->id) }}" class="btn btn-success">Accept</a>
            </div>
        </div>
    </div>
</div>
