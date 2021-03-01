@extends('layouts.template')

@section('content')
    <div class="container mt-4">
        <a href="/category" class="btn-back-category">Kembali</a>
        <div class="card mt-3">
           <form action="/category/store" method="post">
                @csrf
                <div class="card-header">Create category</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <button type="submit" class="btn-submit-category">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection