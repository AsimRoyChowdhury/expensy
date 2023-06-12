<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Guestinfo;

class Guestregistration extends Component
{
    public $username, $email, $password, $error, $confirmPassword;

    public function render()
    {
        session()->forget('email');
        return view('livewire.guestregistration');
    }

    public function store()
    {
        if($this->password != $this->confirmPassword){
            $this->error = 'Please type in same Passwords to confirm';
        }
        else{
            $this->validate([
                'username' => ['required'],
                'email' => ['required', 'email', 'unique:guestinfos'],
                'password' => ['required', 'min:8'],
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
                $this->error = 'Success';

                return redirect('/');
            }
        }
    }


}
