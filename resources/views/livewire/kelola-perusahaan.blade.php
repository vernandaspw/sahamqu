<div>
    <nav class="navbar shadow navbar-expand navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('broker') }}">Perusahaan</a>
            <ul class="navbar-nav ms-auto  mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" wire:click='tambah'>Tambah</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="mt-3">
        <div class="row">
            <div class="container">
                <div class="card m-2 shadow-sm">
                    <div class="card-body ">
                        <div class="row d-flex align-items-center">
                            <div class="col-7">
                                <div class="fs-3">
                                    nama
                                </div>
                                <div class="fs-6">
                                    (broker)
                                </div>
                            </div>
                            <div class="col-2">

                                <button class="btn btn-transparent text-warning">edit</button>

                            </div>
                            <div class="col-2">

                                <button class="btn btn-transparent text-danger">hapus</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
