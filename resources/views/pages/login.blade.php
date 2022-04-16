@extends('app')

@section('content')

<div class="container">
    <div class="mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">

                        <h3>Login</h3>
                        <hr>
                        App ini dibuat Untuk mengetauhi kapan waktunya jual saham yang dimiliki secara avg
                        <hr>
                        @if (session()->has('msg_error'))
                        <div class="alert alert-danger">
                            {{ session('msg_error') }}
                        </div>
                        @endif
                        <br>
                        <form action="{{ url('login') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input name='email' type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                @error('email')
                                <div class='text-sm text-danger'>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input name='password' type="password" class="form-control" id="exampleInputPassword1">
                                @error('password')
                                <div class='text-sm text-danger'>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary form-control mb-3">Login</button>
                        </form>
                        Tidak memiliki akun?
                        <a class="btn btn-transparent form-control mt-1" href="{{ url('daftar') }}">Buat akun</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
