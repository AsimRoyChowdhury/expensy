<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\ItemGroup;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Additem extends Component
{
    public $view, $itemName, $itemGroup, $groups, $items, $msg;
    public function render()
    {
        return view('livewire.additem');
    }


    //showing the additem div
    public function addItem(){
        $this->groups = ItemGroup::all();
        $this->view = 1;
    }


    //saving the items to the database
    public function saveItem(){
        $this->validate([
            'itemName' => ['required'],
        ]);

        if(Item::where('item_name', $this->itemName)->where('item_group_id', $this->itemGroup)->first()){
            $this->msg = 1;
        }
        else{
            $info = [
                'item_name' => $this->itemName,
                'item_group_id' => $this->itemGroup 
            ];
            
            Item::create($info);
            $this->view = 0;
            $this->msg = 2;

        }

    }

    //showing all the items along with their groups
    public function showItem(){
        $this->msg=0;
        $this->groups = ItemGroup::all();

        $this->items = DB::table('items')
            ->join('item_groups', 'items.item_group_id', '=', 'item_groups.id')
            ->get();


        // $this->groups = ItemGroup::all();
        // $this->items = Item::all();
        $this->view = 2;

    }

}
