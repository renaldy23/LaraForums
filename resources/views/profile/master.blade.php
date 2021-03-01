@extends('layouts.template')

@section('content')
<div class="container mt-4">
    <h3>My Profile</h3>
    <hr>
    <div class="row">
        <div class="col-sm-4" id="menu-list">
        <ul id="data-ul">
                <li class="li-data"><a href="/profile" id="{{ request()->is("profile") ? "item-active":""}}">Profile</a></li>
                <li class="li-data"><a href="/profile/active" id="{{ request()->is("profile/active") ? "item-active":""}}">Keaktifan</a></li>
                <li class="li-data"><a href="/profile/questions" id="{{ request()->is("profile/questions") ? "item-active":""}}">My Question</a></li>
            </ul>
        </div>
        <div class="col-sm-8" id="content-item">
           @yield('master-child')
        </div>
    </div>
</div>
@endsection