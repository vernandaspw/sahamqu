<div>
    <nav class="navbar shadow navbar-expand navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('broker') }}">Broker</a>
            <ul class="navbar-nav ms-auto  mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"
                        wire:click="$toggle('tambahpage')">Tambah</a>
                </li>
            </ul>
        </div>
    </nav>
    @if (session()->has('msg_success'))
    <div class="alert alert-success">
        {{ session('msg_success') }}
    </div>
    @endif
    @if (session()->has('msg_error'))
    <div class="alert alert-error">
        {{ session('msg_error') }}
    </div>
    @endif
    <div class="mt-3">
        @if ($tambahpage)
        <div class=" d-flex justify-content-center">
            <div class="col-lg-3">
                <div class="card m-3">
                    <div class="card-body">
                        <form wire:submit.prevent='tambah'>
                            <div class="">
                                <label for="nama">Nama broker</label>
                                <input placeholder="Isi nama broker" class="form-control" type="text" id="nama"
                                    wire:model='nama'>
                            </div>
                            <button type="submit" class="btn btn-success form-control mt-2">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else

        @forelse ($datas as $data)
        <div class="card m-2 shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        {{ $data->nama }}
                    </div>
                    <div class="col-2">
                        <button class="btn btn-sm btn-transparent text-warning">edit</button>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-sm btn-transparent text-danger">hapus</button>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <center>Tidak ada data</center>
        @endforelse
        @endif

    </div>
</div>
