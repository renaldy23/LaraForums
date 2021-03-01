@extends('profile.master')

@section('master-child')
    <h5>Pertanyaan kamu : {{ count($all) }}</h5>
    <p class="text-muted"><i class="fa fa-info-circle"></i> Info tentang pertanyaan yang sudah kamu ajukan dan berapa orang 
        yang sudah comment atau memberi kamujawaban atas pertanyaan kamu</p>
    @foreach ($question as $row)
        <div class="card mt-3">
            <div class="card-header">
                <p class="mb-0"><b>{{ $row->title }}</b></p>
                Ask {{ $row->created_at->diffForHumans() }}
            </div>
            <div class="card-body">
                <div style="font-size: 16px;">
                    {!! $row->body !!}
                </div>
                <p class="card-text">Komentar : {{ $row->comment }}</p>
            </div>
            <div class="card-footer text-muted">
                <a href="/question/{{ $row->id }}" class="card-link">Lihat Pertanyaanmu</a>
                <a href="" class="btn-sm btn btn-success float-right ml-2">Edit</a>
                <form action="/question/delete/{{ $row->id }}" method="post" class="d-inline">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn-sm btn btn-danger float-right" onclick = "return confirm('Yakin mau menghapus?')">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection