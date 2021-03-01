@extends('layouts.template')

@section('content')
    <div class="container mt-4">
        <form action="" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search a question" name="search">
                <div class="input-group-append">
                    <button class="btn btn-outline-info" type="submit" id="button-addon2" name="button" value="tap"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
        @if (count($question)==0)
            <div class="container mt-4">
                <p class="text-center text-muted">Saat ini belum ada data</p>
            </div>
            @if (Session::has("question"))
                <x-alert type="success" messages="Berhasil membuat pertanyaan" />
            @elseif(Session::has("delete"))
                <x-alert type="danger" messages="Berhasil menghapus pertanyaan"  />
            @elseif(Session::has("update"))
                <x-alert type="success" messages="Berhasil mengupdate data"/>
            @endif
        @else
            @foreach ($question as $row)
                <div class="card mb-4">
                    <div class="card-header">
                        {{ $row->title }}
                        <div class="float-right">
                            {{ $row->category->name }}
                        </div>
                    </div>
                    <div class="card-body">
                        Ask by {{ $row->users->name }} on {{ $row->created_at->diffForHumans() }}
                        <div class="mb-0 mt-2">
                            {!! $row->body !!}
                        </div>
                        @if ($row->image!="null")
                            <div>
                                <img src="{{ asset("storage/".$row->image) }}" alt="" class="img-fluid img-thumbnail">
                            </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        @if ($row->users_id == auth()->id())
                            <a href="/question/edit/{{ $row->id }}" class="btn-sm btn btn-success">Edit</a>
                            <form action="/question/delete/{{ $row->id }}" method="post" class="d-inline">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn-sm btn btn-danger" onclick = "return confirm('Yakin mau menghapus?')">Delete</button>
                            </form>
                        @endif
                        @if ($row->users_id==auth()->id())
                            <a href="/question/{{ $row->id }}" class="btn-sm btn btn-primary float-right">Read Comment</a>
                        @else
                            <a href="/question/{{ $row->id }}" class="btn-sm btn btn-primary float-right">Answer Now</a>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection