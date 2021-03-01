@extends('layouts.template')

@section('content')
   <div class="container mt-4">
        @if (count($category)==0)
        <p class="text-danger">Saat ini belum ada category yang anda buat , silahkan buat dahulu kategori agar bisa melanjutkan proses ini</p>
        @endif
        <form action="/question/store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card mb-3">
                <div class="card-header">
                    Ask Question
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <x-label name="title" label="Title" />
                        <x-input type="text" name="title"/>
                    </div>
                    <div class="form-group">
                        <x-label name="body" label="Body" />
                        <x-textarea name="body"/>
                    </div>
                    <div class="form-group">
                        <x-label name="category" label="Kategori" />
                        <select name="category" id="category" class="form-control">
                            <option value="" disabled selected>--Pilih Kategori--</option>
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <x-label name="image" label="Upload screeshoot (jika perlu)"/><br>
                        <input type="file" name="image" id="image">
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