<div>
    <nav class="navbar shadow navbar-expand navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('beranda') }}">Sahamqu</a>
            {{-- <ul class="navbar-nav ms-auto  mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" wire:click='tambah'>Tambah</a>
                </li>
            </ul> --}}
        </div>
    </nav>

    <div style="margin-top: 28px; margin-bottom: 58px">
        <div class="container-fluid">
            <div class="card m-2 shadow-sm">
                <div class="card-body">
                    Hi, {{ auth()->user()->nama }}
                </div>
            </div>
        </div>
        <hr>
        <div class="container-fluid">
            <h5>Broker ku</h5>
        </div>
        <div class="container-fluid">

            @forelse ($broker as $data)

            <div class="card m-2 shadow-sm">
                <div class="card-body">
                    <div class="row">

                        <div class="col-8">
                            <a class="btn" wire:click='detailbroker({{ $data->id }})'>
                                <div class="">
                                    <div class="fs-3">
                                        {{ $data->nama }}
                                    </div>
                                    <div class="fs-6">
                                        Perusahaan: {{ $data->perusahaan->count() }}
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 d-flex align-items-center">
                            <button wire:click='hapus({{ $data->id }})'
                                onclick="confirm('Anda yakin ingin menghapus {{$data->nama}}?') || event.stopImmediatePropagation()"
                                class="btn btn-sm btn-transparent text-danger">hapus</button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <center>Tidak ada data</center>
            @endforelse

        </div>
        <hr>
        <div class="container-fluid">
            <h5>Saham dimiliki</h5>
        </div>
        <div class="container-fluid">
            @forelse ($perusahaan as $data)

            <div class="card m-2 shadow-sm">
                <div class="card-body">
                    <div class="row">

                        <div class="col-8">
                            <a class="btn" wire:click='detailbroker({{ $data->id }})'>
                                <div class="text-start">
                                    <div class="fs-6">
                                        {{ $data->broker->nama }}
                                    </div>
                                    <div class="fs-3" style="text-transform: uppercase">
                                        {{ $data->kode_perusahaan }}
                                    </div>
                                    <div class="fs-6">
                                        <div>Transaksi: {{$data->transaksi->count() }}</div>
                                        <div>lot : {{ $data->transaksi->sum('lot') }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-2 d-flex align-items-center">
                            <button wire:click='hapus({{ $data->id }})'
                                onclick="confirm('Anda yakin ingin menghapus {{$data->nama}}?') || event.stopImmediatePropagation()"
                                class="btn btn-sm btn-transparent text-danger">hapus</button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <center>Tidak ada data</center>
            @endforelse
        </div>
    </div>
</div>
