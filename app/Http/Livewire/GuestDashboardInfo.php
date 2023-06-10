<?php

namespace App\Http\Livewire;

use App\Models\Guestinfo;
use Livewire\Component;

class GuestDashboardInfo extends Component
{
    public $user;


   
    public function render()
    {
        // $this->email_retrive();
        
        $this->user = Guestinfo::where('email', session('email'))->first();
        return view('livewire.guest-dashboard-info');
    }

    public function logout(){
        session()->forget(['email', 'admin']);
        return redirect('/');

    }
    
    public function edit(){
        return redirect('/edituser');
    }


}
