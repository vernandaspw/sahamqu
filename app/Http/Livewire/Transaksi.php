<?php

namespace App\Http\Livewire;

use App\Models\Perusahaans;
use App\Models\Transaksi as ModelsTransaksi;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Transaksi extends Component
{

    public $byid;
    public $tambah = false;

    public $lot, $harga;

    public function transaksi()
    {
        $this->validate([
            'lot' => 'required',
            'harga' => 'required'
        ]);
        $perusahaan = Perusahaans::with('transaksi', 'broker')->findOrFail($this->byid);

        $total_lembar = $perusahaan->broker->lembar * $this->lot;
        $subtotal_nilai = $total_lembar * $this->harga;
        $fee_buy_nilai =  $subtotal_nilai * $perusahaan->broker->fee_buy_persen / 100;
        $total_nilai_beli = $subtotal_nilai + $fee_buy_nilai;
        $cek = ModelsTransaksi::create([
            'user_id' => auth()->user()->id,
            'broker_id' => $perusahaan->broker->id,
            'perusahaan_id' => $perusahaan->id,
            'harga' => $this->harga,
            'lot' => $this->lot,
            'total_lembar' => $total_lembar,
            'subtotal_nilai' => $subtotal_nilai,
            'fee_buy_nilai' => $fee_buy_nilai,
            'total_nilai_beli' => $total_nilai_beli
        ]);
        if ($cek) {
            session()->flash('msg_success', 'Berhasil simpan transaksi');
        } else {

            session()->flash('msg_error', 'Gagal simpan transaksi');
        }
    }

    public function hapus($trxid)
    {
        $cek = ModelsTransaksi::findOrFail($trxid)->delete();
        if ($cek) {
            session()->flash('msg_success', 'Berhasil hapus transaksi');
        } else {
            session()->flash('msg_error', 'Gagal hapus transaksi');
        }
    }

    public function mount($id)
    {
        $this->byid = $id;
    }

    public function render()
    {
        $data = Perusahaans::with('transaksi', 'broker')->where('user_id', auth()->user()->id)->findOrFail($this->byid);
        $transaksi = ModelsTransaksi::where('perusahaan_id', $data->id)->first();
        return view('livewire.transaksi', [
            'data' => $data,
            'trx' => $transaksi
        ])->extends('app')->section('content');
    }
}
