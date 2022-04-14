<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'email',
            'password' => 'min:3'
        ]);

        dd('aeaf');

        $auth = auth()->attempt([$this->email, $this->password], true);
        if ($auth) {
            return redirect()->to('/beranda');
        }

        session()->flash('msg_error', 'Gagal login');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
