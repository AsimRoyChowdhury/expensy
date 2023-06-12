<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\ItemGroup;
use App\Models\Expenditure;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Expenditureinfo extends Component
{
    public $msg, $groups, $view, $items=[], $expenses=[];
    public $totalamount, $totalexpense=0; 
    public $itemName, $itemGroup, $expenseAmount, $quantity, $groupShow; //wire:model variables

    public function render()
    {
        $this->groups = ItemGroup::all();
        if($this->groupShow != null){
        $this->expenses = DB::select('SELECT *, expenditures.created_at,  expenditures.id
            FROM expenditures, items, item_groups
            WHERE items.item_group_id = item_groups.id
            AND expenditures.item_id = items.id
            AND expenditures.user_id = ?
            AND item_groups.id = ?
            GROUP BY expenditures.id, items.id, item_groups.id, item_groups.group
            ORDER BY expenditures.created_at DESC
            ', [session('user_id'), $this->groupShow]);
        }
        else{
            $this->expenses = DB::select('SELECT *, expenditures.created_at, expenditures.id
            FROM expenditures, items, item_groups
            WHERE items.item_group_id = item_groups.id
            AND expenditures.item_id = items.id
            AND expenditures.user_id = ?
            GROUP BY expenditures.id, items.id, item_groups.id, item_groups.group
            ORDER BY item_groups.group
            ', [session('user_id')]);
        }
        
        return view('livewire.expenditureinfo');
    }


    //showing expenses for items
    public function selectGroup(){
        $this->view = '';
    }
   

    //changing view for adding the expense
    public function addExpense(){
        $this->view = '';
        $this->msg = '';
        $this->groups = ItemGroup::all();
        $this->view = 'AddExpense';
    }

    public function selectItemGroup(){
        $this->msg = '';
        if (!empty($this->itemGroup)) {
            $this->items = Item::where('item_group_id', $this->itemGroup)->get();
        } else {
            $this->items = [];
        }
    }

    //saving the expense
    public function saveExpense(){
        $this->validate([
            'itemName' => ['required'],
            'itemGroup' => ['required'],
            'quantity' => ['required'],
            'expenseAmount' => ['required']
        ]);

            $info = [
                'user_id' => session('user_id'),
                'item_id' => $this->itemName,
                'item_group_id' => $this->itemGroup,
                'Quantity' => $this->quantity,
                'cost' => $this->expenseAmount

            ];
            Expenditure::create($info);
            $this->view = 0;
            $this->msg = 1; //item succesfully added
            return redirect('/guestinfo');
            
        }

        public $delid = 0;
        public function deleteExpense($id){
            $this->view = 'deleteExpenseDialog';
            $this->delid = $id;
        }

        public function Yes($delid){
            DB::table('expenditures')->where('id', $delid)->delete();
            $this->view = '';
        }

        public function No(){
            $this->view = '';
        }
}
