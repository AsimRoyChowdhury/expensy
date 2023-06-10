<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Admininfo;
use Illuminate\Support\Facades\Hash;

class Adminlogin extends Component
{
    public $admin_id, $password, $error, $user;
    public function render()
    {
        session()->forget('email');
        return view('livewire.adminlogin');
    }

    public function guest(){
        session(['guest'=> '1']);
        return redirect('/');
    }

    public function login()
    {
        $validatedData = $this->validate([
            'admin_id' => ['required'],
            'password' => ['required'],
        ]);
    
        $this->user = Admininfo::where('admin_id', $this->admin_id)->exists();
    
        if ($this->user) {
            $userinfo = Admininfo::where('admin_id', $this->admin_id)->first();
            if (Hash::check($validatedData['password'], $userinfo->password)) {
                session(
                    [
                        'admin' => 1,
                        'email'=> $this->admin_id
                    ]);
                return redirect('/admininfo');
            } 
            else {
                $this->error = 'wrong password';
            }
        }
        else{
            $this->error = 'This is not a Admin ID';
        }
    }
}
