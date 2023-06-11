<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\ItemGroup;
use App\Models\Expenditure;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Additem extends Component
{
    public $view, $itemName, $itemGroup, $groups, $items=[], $msg, $AddGroupName;
    public function render()
    {
        return view('livewire.additem');
    }


    //showing the additem div
    public function addItem(){
        $this->msg = '';
        $this->groups = ItemGroup::all();
        $this->view = 'AddItem';
    }

    public function addGroup(){
        $this->msg = '';
        $this->view = 'AddGroup';
    }


    private $temp;

    //saving the items to the database
    public function saveItem(){
        $this->validate([
            'itemName' => ['required'],
            'itemGroup' => ['required']
        ]);
        
        $this->temp = strtolower($this->itemName);
        if(Item::where('item_name', $this->temp)->where('item_group_id', $this->itemGroup)->first()){
            $this->msg = 1; //Warning: An item with this name is already added
        }
        else{
            $info = [
                'item_name' => $this->temp,
                'item_group_id' => $this->itemGroup 
            ];
            
            Item::create($info);
            $this->view = 0;
            $this->msg = 2; //item succesfully added
            
        }
        
    }


    //Saving the Groups to the database
    public function saveGroup(){
        $this->temp = strtolower($this->AddGroupName);
        if(ItemGroup::where('group', (strtolower($this->temp)))->first()){
            $this->msg = 3; //This Group is already added 
        }
        else{
            $info = [
                'group' => $this->temp,
            ];
            
            ItemGroup::create($info);
            $this->view = 0;
            $this->msg = 4; //Group Successfully added 

        }
    }
    

    public $selectItemGroup;


    //showing items of specific group in database
    public function showItem(){
        $this->msg = '';
        $this->view = 'ShowItem';
        $this->groups = ItemGroup::all();
    }

    public function show(){
        
        $this->items = DB::select('SELECT *
            FROM items, item_groups
            WHERE items.item_group_id = item_groups.id
            AND item_groups.id = ?
            ', [$this->selectItemGroup]);
    }
    
    public function deleteItem($view){
        $this->msg = '';
        $this->groups = ItemGroup::all();
        $this->view = $view;
    }


    public $del;
    public function destroy($del1){
        $this->del = $del1;
        $this->msg = 5; //Yes or No dialog
        
    }


    public function Yes($del1){
        if(is_string($del1)){
            $itemid = DB::table('items')->where('item_name', $del1)->pluck('id');
            DB::table('items')->where('item_name', $del1)->delete();
            if($itemid!=null){
                DB::table('expenditures')->where('item_id', $itemid)->delete();
            }
            // Item::find($id)->delete();
        }
        else{
            ItemGroup::find($del1)->delete();
            DB::table('items')->where('item_group_id', $del1)->delete();
            DB::table('expenditures')->where('item_group_id', $del1)->delete();
        }
        $this->del = null;
        $this->msg = 6; 
    }

    public function No(){
        $this->view = 0;
        $this->msg=0;
    }
}
