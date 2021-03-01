@extends('layouts.template')

@section('content')
<div class="modal" tabindex="-1" id="modalmail">
    <div class="modal-dialog">
        <form action="/profile/newmail" method="post">
            @csrf
            @method("PUT")
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="email" id="email" class="form-control" placeholder="Type your new email.....">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('script')
    <script>
        $(document).ready(function(){
            $('#modalmail').fadeIn(250).modal('show');
        })
    </script>
@endpush