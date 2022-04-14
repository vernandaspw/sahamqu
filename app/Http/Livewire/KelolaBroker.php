<?php

namespace App\Http\Livewire;

use App\Models\Broker;
use Livewire\Component;

class KelolaBroker extends Component
{
    public $nama;
    public $tambahpage = false;

    public function tambahpage()
    {
        $this->tambahpage = 'daw';
    }

    public function tambah()
    {
        $this->validate([
            'nama' => 'required|max:50'
        ]);

        $tambah = Broker::create([
            'nama' => $this->nama
        ]);

        if ($tambah) {
            $this->tambahpage = false;
            session()->flush('msg_success', 'berhasil menambahkan broker');
        } else {
            session()->flush('msg_error', 'gagal menambahkan broker');
        }
    }

    public function render()
    {
        $datas = Broker::latest()->get();
        return view('livewire.kelola-broker', [
            'datas' => $datas
        ]);
    }
}
