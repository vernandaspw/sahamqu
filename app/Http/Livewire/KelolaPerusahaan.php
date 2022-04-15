<?php

namespace App\Http\Livewire;

use App\Models\Broker;
use App\Models\Perusahaans;
use Livewire\Component;

class KelolaPerusahaan extends Component
{
    public $nama;
    public $tambahpage = false;
    public $editpage = false;
    public $paginate = 10;
    public $kode_perusahaan, $broker_id;

    public $byid;

    public function next()
    {
        $this->paginate = $this->paginate + 10;
    }

    public function resetinput()
    {
        $this->byid = null;
        $this->broker_id = null;
        $this->kode_perusahaan = null;
    }

    public function tambah()
    {
        $this->validate([
            'broker_id' => 'required',
            'kode_perusahaan' => 'required|max:6'
        ]);

        $tambah = Perusahaans::create([
            'user_id' => auth()->user()->id,
            'broker_id' => $this->broker_id,
            'kode_perusahaan' => $this->kode_perusahaan
        ]);

        if ($tambah) {
            $this->tambahpage = false;
            session()->flash('msg_success', 'berhasil menambahkan Perusahaan');
            $this->resetinput();
        } else {
            session()->flash('msg_error', 'gagal menambahkan Perusahaan');
            $this->resetinput();
        }
    }

    public function edit($id)
    {
        $this->editpage = true;
        $this->byid = $id;

        $data = Perusahaans::find($this->byid);
        $this->kode_perusahaan = $data->kode_perusahaan;
        $this->broker_id = $data->broker_id;
    }

    public function update()
    {
        $this->validate([
            'broker_id' => '',
            'kode_perusahaan' => '|max:6'
        ]);

        $tambah = Perusahaans::find($this->byid)->update([
            'broker_id' => $this->broker_id,
            'kode_perusahaan' => $this->kode_perusahaan
        ]);

        if ($tambah) {
            $this->editpage = false;
            session()->flash('msg_success', 'berhasil ubah Perusahaan');
            $this->resetinput();
        } else {
            session()->flash('msg_error', 'gagal ubah Perusahaan');
            $this->resetinput();
        }
    }

    public function hapus($id)
    {
        $data = Perusahaans::findOrFail($id)->delete();

        if ($data) {
            session()->flash('msg_success', 'berhasil menghapus Perusahaan');
        } else {
            session()->flash('msg_error', 'gagal menghapus Perusahaan');
        }
    }

    public function render()
    {
        $datas = Perusahaans::latest()->with('broker')->where('user_id', auth()->user()->id);
        $brokersdata = Broker::latest()->where('user_id', auth()->user()->id)->get();
        return view('livewire.kelola-perusahaan', [
            'datas' => $datas->paginate($this->paginate),
            'brokersdata' => $brokersdata
        ]);
    }
}
