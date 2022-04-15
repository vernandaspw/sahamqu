<?php

namespace App\Http\Livewire;

use App\Models\Broker;
use Livewire\Component;

class KelolaBroker extends Component
{
    public $nama, $fee_buy_persen, $fee_sell_persen, $lembar;


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
        $this->fee_buy_persen = null;
        $this->fee_sell_persen = null;
        $this->lembar = null;
    }

    public function tambah()
    {
        $this->validate([
            'nama' => 'required|max:50',
            'fee_buy_persen' => 'required',
            'fee_sell_persen' => 'required',
            'lembar' => 'required',
        ]);

        $tambah = Broker::create([
            'user_id' => auth()->user()->id,
            'nama' => $this->nama,
            'fee_buy_persen' => $this->fee_buy_persen,
            'fee_sell_persen' => $this->fee_sell_persen,
            'lembar' => $this->lembar
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
        $this->fee_buy_persen = $data->fee_buy_persen;
        $this->fee_sell_persen = $data->fee_sell_persen;
        $this->lembar = $data->lembar;
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required|max:50',
            'fee_buy_persen' => '',
            'fee_sell_persen' => '',
            'lembar' => '',
        ]);

        $tambah = Broker::find($this->byid)->update([
            'nama' => $this->nama,
            'fee_buy_persen' => $this->fee_buy_persen,
            'fee_sell_persen' => $this->fee_sell_persen,
            'lembar' => $this->lembar
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
