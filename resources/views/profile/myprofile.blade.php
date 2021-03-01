@extends('profile.master')

@section('master-child')
    @if (Session::has("false"))
        <x-alert type="danger" messages="Password yang kamu masukkan salah!"/>
    @elseif(Session::has("email"))
        <x-alert type="success" messages="Email berhasil di rubah"/>
    @elseif(Session::has("name"))
        <x-alert type="success" messages="Nama berhasil di rubah"/>
    @endif
    <div class="card">
        <div class="card">
            <div class="card-body">
                <p class="text-muted"><i class="fa fa-info-circle"></i> Kamu dapat melihat , mengubah serta mengelola informasi terkait profile LaraForums kamu</p>
                <h4 class="card-title">{{ $user->name }}</h4>
                <p class="card-text">{{ $user->email }}</p>
            </div>
            <div class="card-footer text-muted">
                <div class="row">
                    <div class="col-sm-6 text-center"><a href="" data-toggle="modal" data-target="#modalemail">Ubah Email</a></div>
                    <div class="col-sm-6 text-center"><a href="" data-toggle="modal" data-target="#modalnama">Ubah Nama</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalemail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
           <form action="/profile/email" method="post" role="form">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Email</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <x-label name="pass" label="Your Password"/>
                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Type your password...." required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modalnama" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
           <form action="/profile/name" method="post" role="form">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Nama</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <x-label name="pass" label="Your Password"/>
                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Type your password...." required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection