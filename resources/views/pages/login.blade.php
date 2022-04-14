@extends('app')

@section('content')

<div class="container">
    <div class="mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        @if (session()->has('msg_error'))
                        <div class="text-danger">{{ session()->get('msg_error') }}</div>
                        @endif
                        <h3>Login</h3>
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

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
