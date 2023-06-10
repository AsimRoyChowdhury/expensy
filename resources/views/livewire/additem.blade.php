<div>
<div>
  <button wire:click="addItem()">Add Item</button>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($msg == 1)
        <div>
            <ul>
                <li>An item with this name already exits in this group</li>
            </ul>
        </div>
    @endif
    
  @if( $view==1 )
  
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
    </div>
    <button wire:click.prevent="saveItem()">Save</button>
    </form>
    @endif

    <button wire:click="showItem()">Show All Item</button>



    @if($msg == 2)
        <div>
            <ul>
                <li>Item Successfully added</li>
            </ul>
        </div>
    @endif


    @if( $view==2 )
        
        @foreach ($items as $item)
            <p>{{$item->item_name}} : {{$item->group}}</p>
        @endforeach
    @endif
    @php 
        $msg = 0;
        $view = 0;
    @endphp
</div>
</div>
