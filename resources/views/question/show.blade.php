@extends('layouts.template')

@section('content')
   <div class="container mt-4">
        <div class="card mb-4">
            <div class="card-header">
                {{ $question->title }}
                <div class="float-right">
                    {{ $question->category->name }}
                </div>
            </div>
            <div class="card-body">
                Ask by {{ $question->users->name }} on {{ $question->created_at->diffForHumans() }}
                <div class="mb-0 mt-2">
                    {!! $question->body !!}
                </div>
                @if ($question->image!="null")
                <div>
                    <img src="{{ asset("storage/".$question->image) }}" alt="" class="img-fluid img-thumbnail">
                </div>
            @endif
                <div>
                    <a href="/home" class="btn-sm btn btn-primary mt-2">Kembali</a>
                </div>
            </div>
            @if ($question->users_id == auth()->id())
                <div class="card-footer">
                    <a href="" class="btn-sm btn btn-success">Edit</a>
                    <a href="" class="btn-sm btn btn-danger">Delete</a>
                </div>
            @endif
        </div>
        <h4>Comments {{ $question->comment }}</h4>
        <hr>
        <form action="/comment/create/{{ $question->id }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <i class="fa fa-paperclip icon" style="position: absolute; margin-left: 1078px; margin-top:10px; cursor: pointer;"></i>
                    <input type="text" class="form-control" placeholder="Type your comment...." name="comment" id="comment" required>
                </div>
            </div>
            <div class="row img-input mt-2" style="display: none">
                <div class="col-lg-5">
                    <x-label name="image" label="Screenshoot (jika perlu)"/><br>
                    <input type="file" name="image" id="image">
                </div>
            </div>
            <button class="btn btn-info text-white mt-2" type="submit" id="btn-submit-comment">Submit</button>
        </form>
        @if (count($comments)==0)
            <p class="text-center text-muted mt-3">Saat ini belum ada komentar untuk pertanyaan kamu</p>
        @else
            @foreach ($comments as $comment)
                <div class="card mt-3 mb-3">
                   <div class="card-body">
                        <p class="mb-0">
                            @if ($comment->users_id==Auth::user()->id)
                                <a href="/profile">Anda</a> memberikan balasan
                            @else
                                <a href="" data-toggle="modal" data-target="#modal{{ $comment->users->id }}">{{ $comment->users->name }}</a> memberikan balasan
                            @endif
                        </p>
                        <p class="text-muted mb-2">{{ $comment->created_at->diffForHumans() }}</p>
                        <p class="font-weight-bold">{{ $comment->body }}</p>
                        @if ($comment->image!="null")      
                            <div>
                                <img src="{{ asset("storage/".$comment->image) }}" class="img-fluid img-thumbnail">
                            </div>
                        @endif
                   </div>
                   @if ($comment->users_id==auth()->id())
                        <div class="card-footer">
                            <form action="/comment/delete/{{ $comment->id }}" method="post">
                                <input type="hidden" name="id" value="{{ $comment->questions_id }}">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn-sm btn btn-danger">Delete</button>
                            </form>
                        </div>
                   @endif
                </div>
                <div class="modal fade" id="modal{{ $comment->users->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Profile Detail</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-muted mb-1"><i class="fa fa-info-circle"></i> Info terkait teman <b>LaraForums</b> lainnya.</p>
                            <p class="mb-0">Nama : <strong>{{ $comment->users->name }}</strong></p>
                            <p>Email &nbsp;: <strong>{{ $comment->users->email }}</strong></p>
                            <p>Joinned <b>LaraForums</b> since {{ $comment->users->created_at->format("d F Y") }}</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="" data-dismiss="modal" id="btn-close">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
            @endforeach
        @endif
   </div>
@endsection
@push('script')
    <script>
        $(document).ready(function(){
            $(".icon").on("click" , function(){
                $(".img-input").css("display","block")
            })
        })
    </script>
@endpush