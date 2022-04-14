<div>
    <div class="card">
        <div class="card-body">
            @if (session()->has('msg_error'))
            <div class="text-danger">{{ session()->get('msg_error') }}</div>
            @endif
            <h3>Login</h3>
            <form wire:submit.prevent='login'>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input wire:model='email' type="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                    {{ auth()->user() }}
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input wire:model='password' type="password" class="form-control" id="exampleInputPassword1">
                </div>
                @error('password') <span class="error">{{ $message }}</span> @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
