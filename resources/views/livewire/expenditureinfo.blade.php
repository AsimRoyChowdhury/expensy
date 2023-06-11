<div>

    <!-- Add Expenses -->
    <button wire:click='addExpense'>Add Expense:</button>
    @if( $view=='AddExpense' )
    <div id="addItemForm">
        <form>
            <label for="Group">Item Group: </label>
            <select id="Group" wire:model="itemGroup" wire:change="selectItemGroup">
            <option value="">Select Group:</option>
                <!-- <option value="">Select Group: </option> -->
                @foreach($groups as $num)
                <option value="{{ $num->id }}">{{$num->group}}</option>
                @endforeach
            </select>
            <label for="item">Item Name: </label>
            <select id="itemGroup" wire:model="itemName">
                <option value="">Select Item</option>

                @foreach($items as $num)
                @if(is_object($num))
                <option value="{{ $num->id }}">{{$num->item_name}}</option>
                @endif
                @endforeach
            </select>

            <label for="item">Add Quantity: </label>
            <input type="text" wire:model="quantity" id="itemName" placeholder="Add Quantity">
            <label for="item">Add Expense: </label>
            <input type="text" wire:model="expenseAmount" id="itemName" placeholder="Add Cost/Quantity">
        </form>
        <button wire:click="saveExpense()">Save Expense</button>
    </div>
    @endif


    <!-- Drop Down menu for selecting group, by default nothing is selected -->
    <label for="item">Item Group: </label>
    <select id="itemGroup" wire:model="groupShow" wire:change="selectGroup">
        <option value="">All Expenses</option>
        @foreach($groups as $num)
        <option value="{{ $num->id }}">{{$num->group}}</option>
        @endforeach
    </select>


    <!-- Showing items as per their group, if no group is selected then all items are shown -->
    <p>Item Group : Item Name : Quantity : Cost : Amount</p>
    @foreach($expenses as $expense)
        @php
            $totalamount = $expense->Quantity*$expense->cost;
            $totalexpense = $totalexpense + $totalamount;
            $createdAt = \Carbon\Carbon::parse($expense->created_at)->format('Y-m-d');
        @endphp
        <p>{{$expense->group}} : {{$expense->item_name}} : {{$expense->Quantity}} : {{$expense->cost}} : {{$totalamount}}   :   {{$createdAt}}   :   <button wire:click='deleteExpense({{$expense->id}})'>Delete</button></p>
    @endforeach
    total expense = {{$totalexpense}}
    

    <!-- Delete Yes or No dialog box -->
    @if($view=='deleteExpenseDialog')
    <form>
        Do you want to delete this expense :
            <div>
                <button wire:click="Yes({{$delid}})">Yes</button>
                <button wire:click="No()">No</button>
            </div>
    </form>
    @endif
    <div>
        <ul>
            @if($msg==1)
            <li>Item Successfully added</li>
            @endif
        </ul>
    </div>
</div>