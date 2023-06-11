<div>
  <button wire:click="addItem()">Add Item</button>
  <button wire:click="addGroup()">Add Group</button>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <!-- Adding Items -->
    @if( $view=='AddItem' )
  
        <div id="addItemForm">
            <form>
                <label for="item">Item Name: </label>
                <input type="text" wire:model="itemName" id="itemName" placeholder="Add Item">

                <label for="item">Item Group: </label>
                <select id="itemGroup" wire:model="itemGroup">
                    <option value="">Group Name</option>
                @foreach($groups as $num)
                    <option value="{{ $num->id }}">{{$num->group}}</option>
                @endforeach
            </select>
            </form>
            <button wire:click="saveItem()">Save</button>
        </div>
    @endif

    <div>
        <from>
            @if($view=='AddGroup')
                <label for="item">Add Group: </label>
                <input type="text" wire:model="AddGroupName" id="itemName" placeholder="Add Group">
                <button wire:click.prevent="saveGroup()">Save</button>
            @endif
        </from>     
    </div>
    

    <button wire:click="showItem()">Show Item</button>
    <button wire:click="deleteItem('DeleteItem')">Delete Item</button>
    <button wire:click="deleteItem('DeleteGroup')">Delete Item Group</button>

    


    <!-- showing messages -->
    <div>
        <ul>
        @if($msg == 1)
            <li>An item with this name already exits in this group</li>
        @elseif($msg == 2)
            <li>Item Successfully added</li>
        @elseif($msg == 3)
            <li>This Group already exists</li>
        @elseif($msg==4)
            <li>Group Successfully added</li>
        @endif
        </ul>
    </div>
    


    <!-- showing all the items along with their groups -->
    <div>
    @if( $view=='ShowItem' )
        <label for="item">Select Item Group: </label>
        <select id="itemGroup" wire:model="selectItemGroup">
            <option value="">Group Name</option>
            @foreach($groups as $num)
                <option value="{{ $num->id }}">{{$num->group}}</option>
            @endforeach
        </select>
        <button wire:click="show()">Show Item</button>



        @foreach ($items as $item)
            @if(is_object($item))
                <p>{{$item->item_name}}</p>
            @endif
        @endforeach
    @endif
    </div>


    <!-- delete items from group -->
    <div>
    @if( $view=='DeleteItem' )
        <label for="item">Select Item Group: </label>
        <select id="DeleteitemGroup" wire:model="selectItemGroup">
            <option value="">Group Name</option>
            @foreach($groups as $num)
                <option value="{{ $num->id }}">{{$num->group}}</option>
            @endforeach
        </select>
        <button wire:click="show()">Show Item</button>


        @foreach ($items as $item)
            @if(is_object($item))
            <p>{{$item->item_name}}
            <button wire:click="destroy('{{$item->item_name}}')">Delete</button>
            </p>
            @endif
        @endforeach
    @endif
    </div>

    <!-- delete item groups -->
    <div>
    @if( $view=='DeleteGroup' )
        @foreach ($groups as $item)
            @if(is_object($item))
            <p>
            {{$item->group}}
            <button wire:click="destroy({{$item->id}})">Delete</button>
            </p>
            @endif
        @endforeach
    @endif
    </div>

    <!-- yes no dialog box -->
    <form>
        
        @if($msg==5)
            Do you want to delete this item : 
            <div>
                @if(is_string($del))
                    <button wire:click.prevent="Yes('{{$del}}')">Yes</button>
                @else
                    <button wire:click.prevent="Yes({{$del}})">Yes</button>
                @endif
                <button wire:click="No()">No</button>
            </div>
        @endif
    </form>

    <div>
        @if($msg==6)
            Item Successfully Deleted
        @endif
    </div>

</div>
