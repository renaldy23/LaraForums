@extends('layouts.template')

@section('content')
    <div class="container mt-4">
        <a href="/category/create" class="btn-kategori">New Category</a>
        <div class="mt-3">
            @if (Session::has("category"))
                <x-alert type="success" messages="Berhasil tambah kategori"/>
            @elseif(Session::has("delete"))
                <x-alert type="danger" messages="Berhasil menghapus kategori"/>
            @endif
        </div>
        @if (count($category)==0)
            <p class="text-center text-muted">Saat ini belum ada data kategori</p>
        @else
            <h3>Your category</h3>
            <hr>
            <table class="table table-data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            <td>Create by {{ $row->user->name }} on {{ $row->created_at->diffForHumans() }}</td>
                            <td>
                                <form action="/category/delete/{{ $row->id }}" method="post">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" class="btn-sm btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection