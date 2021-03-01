@extends('layouts.template')

@section('content')
<div class="container mt-4">
    <form action="/question/update/{{ $question->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="card mb-3">
            <div class="card-header">
                Edit Question
            </div>
            <div class="card-body">
                <div class="form-group">
                    <x-label name="title" label="Title" />
                    <input type="text" name="title" id="title" class="form-control" value="{{ old("title") ?? $question->title }}">
                </div>
                <div class="form-group">
                    <x-label name="body" label="Body" />
                    <textarea name="body" id="body" rows="3" class="form-control">{!! old("body") ?? $question->body !!}</textarea>
                </div>
                <div class="form-group">
                    <x-label name="category" label="Kategori" />
                    <select name="category" id="category" class="form-control">
                        @foreach ($category as $row)
                            @if ($row->id==$question->category_id)
                                <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
                            @else
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <x-label name="image" label="Upload screeshoot (jika perlu)"/><br>
                    @if ($question->image!="null")
                        <div class="row">
                            <div class="col">
                                <input type="file" name="image" id="sampul" onchange="imgpreview()">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <img src="{{ asset("storage/".$question->image) }}" class="img-fluid img-thumbnail" style="width:550px;" id="img-preview">
                            </div>
                        </div>
                    @else
                        <input type="file" name="image" id="image"/>
                    @endif
                </div>
            </div>
            <div class="card-footer">
                <a href="/home" class="btn-sm btn btn-info text-white">Kembali</a>
                <button type="submit" class="btn-sm btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('script')
<script>
    CKEDITOR.replace( 'body' );
</script>
@endpush

@push('script')
    <script>
       function imgpreview() { 
           const sampul = document.querySelector("#sampul");
           const preview = document.querySelector("#img-preview");

           const fileSampul = new FileReader();
           fileSampul.readAsDataURL(sampul.files[0]);

           fileSampul.onload = function(e){
               preview.src = e.target.result;
           }
        }
    </script>
@endpush