<div>
    <nav class="navbar shadow navbar-expand navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('beranda') }}">Sahamqu</a>
            <ul class="navbar-nav ms-auto  mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" wire:click="$toggle('tambah')">Tambah</a>
                </li>
            </ul>
        </div>
    </nav>

    <div style="margin-top: 28px; margin-bottom: 58px">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="">Broker : {{ $data->broker->nama }}</div>
                    <div class="">Broker Fee buy % : {{ $data->broker->fee_buy_persen }}</div>
                    <div class="">Broker Fee sell % : {{ $data->broker->fee_sell_persen }}</div>
                    <div class="">Kode Saham : {{ $data->kode_perusahaan }}</div>

                </div>
            </div>

            @if (session()->has('msg_success'))
            <div class="alert alert-success">
                {{ session('msg_success') }}
            </div>
            @endif
            @if (session()->has('msg_error'))
            <div class="alert alert-danger">
                {{ session('msg_error') }}
            </div>
            @endif
            <br>
            @if ($tambah)

            <div>
                <h4>Tambah Transaksi saham</h4>
            </div>
            <form wire:submit.prevent='transaksi'>
                <div class="">
                    <label for="lot">Lot</label>
                    <input placeholder="Isi lot" class="form-control" type="text" id="lot" wire:model='lot'>
                </div>
                <div class="">
                    <label for="harga">Harga</label>
                    <input placeholder="Isi harga" class="form-control" type="text" id="harga" wire:model='harga'>
                </div>
                <button type="submit" class="btn btn-primary form-control mt-2">Tambah</button>
            </form>
            <button wire:click="$toggle('tambah')" class="btn btn-transparent form-control mt-1">kembali</button>
            <br><br><br>
            @endif
            <div class="card">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Lot</th>
                            <th scope="col">Harga beli</th>
                            <th>Value(*sdh fee)</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data->transaksi as $transaksi)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $transaksi->lot }}</td>
                            <td>@uang($transaksi->harga)</td>
                            <td>@uang($transaksi->total_nilai_beli)</td>
                            <td>{{ $transaksi->created_at }}</td>
                        </tr>
                        @empty
                        tidak ada data
                        @endforelse

                    </tbody>
                </table>
            </div>
            <br>
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="">Total lot dimiliki : {{ $data->transaksi->sum('lot') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
