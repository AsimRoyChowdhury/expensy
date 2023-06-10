<?php

namespace App\Http\Livewire;

use App\Models\Admininfo;
use App\Models\Guestinfo;
use Livewire\Component;

class Editinfo extends Component
{
    public $email, $username, $password, $info, $alert=[];

    public function render()
    {
        if(session('admin')=='1'){
            $info = Admininfo::where('admin_id', session('email'))->first();
        }
        else{
            $info = Guestinfo::where('email', session('email'))->first();
        }
        return view('livewire.editinfo');
    }

    public function update(){
        $this->alert = [];
        if(session('admin')=='1'){
            $info = Admininfo::where('admin_id', session('email'))->first();
            if($this->email != null){
                $info->update([
                    'email' => $this->email
                ]);
                $this->alert = ['Email succesfully updated'];
            }
            if($this->username != null){
                $info->update([
                    'username' => $this->username
                ]);
                $this->alert = ['Username succesfully updated'];
            }
            if($this->password != null){
                $info->update([
                    'password' => bcrypt($this->password)
                ]);
                $this->alert = ['Password succesfully updated'];
            }
        }
        else{
            $info = Guestinfo::where('email', session('email'))->first();
            if($this->email != null){
                $info->update([
                    'email' => $this->email
                ]);
                $this->alert = 'Email succesfully updated';
            }
            if($this->username != null){
                $info->update([
                    'username' => $this->username
                ]);
                $this->alert = 'Username succesfully updated';
            }
            if($this->password != null){
                $info->update([
                    'password' => bcrypt($this->password)
                ]);
                $this->alert = 'Password succesfully updated';
            }
        }
    dump($this->alert);
    }

}
