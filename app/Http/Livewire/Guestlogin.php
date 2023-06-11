<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Guestinfo;
use Illuminate\Support\Facades\Hash;

class Guestlogin extends Component
{
    public $email, $password, $error, $user;
    public function render()
    {
        session()->forget('email');
        return view('livewire.guestlogin');
    }

    public function admin(){
        session(['admin'=> '1']);
        return redirect('/');
    }

    public function login()
    {
        $validatedData = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        $this->user = Guestinfo::where('email', $this->email)->exists();
    
        if ($this->user) {
            $userinfo = Guestinfo::where('email', $this->email)->first();
            if (Hash::check($validatedData['password'], $userinfo->password)) {
                session(
                    [
                        'admin' => 2,
                        'email'=> $this->email,
                        'user_id'=> $userinfo->id
                    ]);
                return redirect('/guestinfo');
            } 
            else {
                $this->error = 'wrong password';
            }
        }
        else{
            $this->error = 'email is not registered';
        }
    }

    public function register(){
        return redirect('/register');
    }
}
