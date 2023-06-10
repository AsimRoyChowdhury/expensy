<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Guestinfo;

class Guestregistration extends Component
{
    public $username, $email, $password, $error;

    public function render()
    {
        session()->forget('email');
        return view('livewire.guestregistration');
    }

    public function store()
    {
        $this->validate([
            'username' => ['required'],
            'email' => ['required', 'email', 'unique:guestinfos'],
            'password' => ['required'],
        ]);

        if(Guestinfo::where('email', $this->email)->exists()){
            $this->error = 'This email already exists';
        }
        else{
            $info = [
                'username' => $this->username,
                'email' => $this->email,
                'password' => bcrypt($this->password)
            ];
    
            Guestinfo::create($info);

            session()->flash('message', 'Post Created Successfully.');
        }
    }

    public function login(){
        return redirect('/');
    }
}
