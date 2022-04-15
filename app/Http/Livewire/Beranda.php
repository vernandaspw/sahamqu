<?php

namespace App\Http\Livewire;

use App\Models\Broker;
use App\Models\Perusahaans;
use App\Models\Transaksi;
use Livewire\Component;

class Beranda extends Component
{
    public function hapussaham($id)
    {
        $cek = Perusahaans::findOrFail($id)->delete();
        if ($cek) {
            session()->flash('msg_success', 'berhasil hapus saham');
        } else {
            session()->flash('msg_error', 'gagal hapus saham');
        }
    }
    public function render()
    {
        $broker = Broker::with('perusahaan')->where('user_id', auth()->user()->id)->get();
        $perusahaan = Perusahaans::with('transaksi', 'broker')->where('user_id', auth()->user()->id)->get();

        return view('livewire.beranda', [
            'broker' => $broker,
            'perusahaan' => $perusahaan
        ]);
    }
}
