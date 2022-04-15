@extends('app')
@section('content')
<nav class="navbar shadow navbar-expand fixed-top navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('broker') }}">Akun</a>
        {{-- <ul class="navbar-nav ms-auto  mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#" wire:click="$toggle('tambahpage')">Tambah</a>
            </li>
        </ul> --}}
    </div>
</nav>
<div class="container-fluid" style="margin-top: 75px">
    <h3>Hi, {{ auth()->user()->nama }}</h3>
    <br>
    <a class="form-control btn btn-danger" href="{{ url('logout') }}">Logout</a>
</div>
@endsection
