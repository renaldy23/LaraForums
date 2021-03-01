@extends('profile.master')

@section('master-child')
    <h5>Poin Keaktifan : {{ count($all) }}</h5>
    <p class="text-muted"><i class="fa fa-info-circle"></i> Point keaktifan mu diambil dari seberapa banyak kamu membantu teman-teman 
        <b>LaraForums</b> lainnya dalam bentuk komentar atas pertanyaan mereka .</p>
    @foreach ($comment as $row)
        @if ($row->questions->id==$row->questions_id)
            <div class="card mt-3 mb-3">
                <div class="card-header">
                    Pertanyaan dari {{ $row->questions->users->name }}
                </div>
                <div class="card-body">
                    <div style="font-size: 16px;">
                        {!! $row->questions->body !!}
                    </div>
                    <p class="card-text">Komentar</p>
                    <hr>
                    <p class="text-muted">Jawaban dari Anda :</p>
                    <p><b>{{ $row->body }}</b></p>
                </div>
                <div class="card-footer">
                    <a href="/question/{{ $row->questions->id }}" class="card-link">Lihat Pertanyaanmu</a>
                </div>
            </div>
        @endif
    @endforeach
    {{ $comment->links() }}
@endsection