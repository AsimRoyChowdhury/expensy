<?php

namespace App\Http\Livewire;

use App\Models\Admininfo;
use Livewire\Component;

class Admindashboardinfo extends Component
{
    public $user;


   
    public function render()
    {
        
        $this->user = Admininfo::where('admin_id', session('email'))->first();
        return view('livewire.admindashboardinfo');
    }

    public function edit(){
        return redirect('/edituser');
    }

    public function logout(){
        session()->forget(['email', 'admin']);
        return redirect('/');

    }
}