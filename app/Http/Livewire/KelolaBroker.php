<?php

namespace App\Http\Livewire;

use App\Models\Broker;
use Livewire\Component;

class KelolaBroker extends Component
{
    public $nama;
    public $tambahpage = false;
    public $editpage = false;
    public $paginate = 10;

    public $byid;

    public function next()
    {
        $this->paginate = $this->paginate + 10;
    }

    public function resetinput()
    {
        $this->byid = null;
        $this->nama = null;
    }

    public function tambah()
    {
        $this->validate([
            'nama' => 'required|max:50'
        ]);

        $tambah = Broker::create([
            'user_id' => auth()->user()->id,
            'nama' => $this->nama
        ]);

        if ($tambah) {
            $this->tambahpage = false;
            session()->flash('msg_success', 'berhasil menambahkan broker');
            $this->resetinput();
        } else {
            session()->flash('msg_error', 'gagal menambahkan broker');
            $this->resetinput();
        }
    }

    public function edit($id)
    {
        $this->editpage = true;
        $this->byid = $id;

        $data = Broker::find($this->byid);
        $this->nama = $data->nama;
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required|max:50'
        ]);

        $tambah = Broker::find($this->byid)->update([
            'nama' => $this->nama
        ]);

        if ($tambah) {
            $this->editpage = false;
            session()->flash('msg_success', 'berhasil ubah broker');
            $this->resetinput();
        } else {
            session()->flash('msg_error', 'gagal ubah broker');
            $this->resetinput();
        }
    }

    public function hapus($id)
    {
        $data = Broker::findOrFail($id)->delete();

        if ($data) {
            session()->flash('msg_success', 'berhasil menghapus broker');
        } else {
            session()->flash('msg_error', 'gagal menghapus broker');
        }
    }

    public function render()
    {
        $datas = Broker::latest()->where('user_id', auth()->user()->id);
        return view('livewire.kelola-broker', [
            'datas' => $datas->paginate($this->paginate)
        ]);
    }
}
