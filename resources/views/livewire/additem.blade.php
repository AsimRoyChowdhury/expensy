<div>
<div class="flex justify-center mx-auto">
<button class="flex text-white mr-10  border border-purple-600 py-1 px-4 focus:outline-none hover:bg-purple-600 rounded-lg text-sm" wire:click="addItem()">Add Item</button>
  <button class="flex text-white   border border-purple-600 py-1 px-6 focus:outline-none hover:bg-purple-600 rounded-lg text-sm" wire:click="addGroup()">Add Group</button>
  </div>

  <div class="flex mx-auto justify-center my-5">
    <button class="flex text-white mr-10  border border-purple-600 py-1 px-4 focus:outline-none hover:bg-purple-600 rounded-lg text-sm" wire:click="showItem()">Show Item</button>
    <button class="flex text-white mr-10  border border-purple-600 py-1 px-4 focus:outline-none hover:bg-purple-600 rounded-lg text-sm" wire:click="deleteItem('DeleteItem')">Delete Item</button>
    <button class="flex text-white border border-purple-600 py-1 px-4 focus:outline-none hover:bg-purple-600 rounded-lg text-sm" wire:click="deleteItem('DeleteGroup')">Delete Group</button>
    </div>
    <div class="sm:px-28 px-12">
    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8 " />
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div class="flex p-4 mb-4 m-6 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div>
            {{$error}}
            </div>
        </div>
                @endforeach
        </div>
    @endif
    

    <form>
        
        @if($msg==5)
    <div id="alert-additional-content-2" class="p-3 mb-4 m-6 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-400" role="alert">
            <div class="flex items-center">
                <h3 class="text-lg font-medium">Are you sure, do you want to delete?</h3>
            </div> 
            <div class="flex my-4">

                @if(is_string($del))
                
                <button wire:click.prevent="Yes('{{$del}}')" type="button" class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 mx-4 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <svg aria-hidden="true" class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                Yes
                </button>
                    <!-- <button wire:click.prevent="Yes('{{$del}}')">Yes</button> -->
                @else
                <button wire:click.prevent="Yes({{$del}})" type="button" class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 mx-4 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <svg aria-hidden="true" class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                Yes
                </button>
                    <!-- <button wire:click.prevent="Yes({{$del}})">Yes</button> -->
                @endif
                <button wire:click="No()" type="button" class="text-red-800 bg-transparent border border-red-800 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800" data-dismiss-target="#alert-additional-content-2" aria-label="Close">
                No
                </button>
            </div>
                <!-- <button wire:click="No()">No</button> -->
            </div>
        @endif
    </form>

    <div>
        @if($msg==6)
        <div class="flex p-4 mb-4 m-6 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div>
                <span class="font-medium">Item Successfully Deleted</span>
                </div>
            </div>
        @endif
    </div>



    <!-- showing messages -->
    <div>
        @if($msg == 1)
        <div class="flex p-4 mb-4 m-6 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div>
            An item with this name already exits in this group
            </div>
        </div>
            <!-- <li>An item with this name already exits in this group</li> -->
        @elseif($msg == 2)
            <div class="flex p-4 mb-4 m-6 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div>
                <span class="font-medium">Item Successfully added!</span>
                </div>
            </div>
            <!-- <li>Item Successfully added</li> -->
        @elseif($msg == 3)
        <div class="flex p-4 mb-4 m-6 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div>
            This Group already exists
            </div>
            <!-- <li>This Group already exists</li> -->
        @elseif($msg==4)
                <div class="flex p-4 mb-4 m-6 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div>
                <span class="font-medium">Group Successfully added!</span>
                </div>
            </div>
            <!-- <li>Group Successfully added</li> -->
        @endif
    </div>

    <!-- Adding Items -->
    @if( $view=='AddItem' )
  
        <div class="mx-auto justify-center my-4 md:flex-col"id="addItemForm">
            <form class="flex flex-wrap mx-auto justify-center">
                <div class='w-full md:w-auto flex-grow md:flex-initial flex items-center justify-between ml-4 mr-4 md:mb-4'>
                    <select id="itemGroup" wire:model="itemGroup" class="flex text-white   border border-purple-400 bg-purple-400 my-2 mx-auto py-1 px-4 focus:outline-none hover:bg-purple-600 rounded text-xs">
                        <option value="">Group Name</option>
                    @foreach($groups as $num)
                        <option value="{{ $num->id }}">{{$num->group}}</option>
                    @endforeach
                    </select>
                </div>
                <div class='w-full md:w-auto flex-grow md:flex-initial flex items-center justify-between mx-4 md:mb-4'>
                    <input type="text" wire:model="itemName" id="itemName" placeholder="Add Item" class="flex text-gray-500   border border-purple-400 bg-white my-2 mx-auto py-1 px-6 focus:outline-none  rounded text-xs">
                </div>

            </form>
            <div class='w-full md:w-auto flex-grow md:flex-initial flex items-center justify-between mr-4 md:mb-4'>
            <button wire:click="saveItem()" class="flex text-white   border border-purple-700 bg-purple-700 my-2 mx-auto py-1 px-6 focus:outline-none  rounded text-xs">Save</button>
            </div>
        </div>
    @endif

    <div>
        <form>
            @if($view=='AddGroup')
                <input type="text" wire:model="AddGroupName" id="itemName" placeholder="Add Group" class="flex text-gray-500   border border-purple-400 bg-white my-2 mx-auto py-1 px-6 focus:outline-none  rounded text-xs">
                <button wire:click.prevent="saveGroup()" class="flex text-white   border border-purple-700 bg-purple-700 my-2 mx-auto py-1 px-6 focus:outline-none  rounded text-xs">Save</button>
            @endif
        </form>     
    </div>
    


    <!-- showing all the items along with their groups -->
    <div>
    @if( $view=='ShowItem' )
        <select id="itemGroup" wire:model="selectItemGroup" class="flex text-white   border border-purple-400 bg-purple-400 my-2 mx-auto py-1 px-4 focus:outline-none hover:bg-purple-600 rounded text-xs">
            <option value="">Group Name</option>
            @foreach($groups as $num)
                <option value="{{ $num->id }}">{{$num->group}}</option>
            @endforeach
        </select>
        <button wire:click="show()" class="flex text-white   border border-purple-700 bg-purple-700 my-2 mx-auto py-1 px-6 focus:outline-none  rounded text-xs">Show Item</button>

        <div class="relative overflow-x-auto  sm:rounded-lg px-40">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Item Name
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            @if(is_object($item))
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$item->item_name}}
                </th>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    </div>
    @endif
</div>



    <!-- delete items from group -->
    <div>
    @if( $view=='DeleteItem' )
        <select id="DeleteitemGroup" wire:model="selectItemGroup" class="flex text-white   border border-purple-400 bg-purple-400 my-2 mx-auto py-1 px-4 focus:outline-none hover:bg-purple-600 rounded text-xs">
            <option value="">Group Name</option>
            @foreach($groups as $num)
                <option value="{{ $num->id }}">{{$num->group}}</option>
            @endforeach
        </select>
        <button wire:click="show()" class="flex text-white   border border-purple-700 bg-purple-700 my-2 mx-auto py-1 px-6 focus:outline-none  rounded text-xs">Show Item</button>


        <div class="relative mx-auto my-5 sm:px-50 overflow-x-auto justify-center sm:rounded-lg px-20">
    <table class=" w-full mx-auto text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Item Name
                </th>
                <th scope="col" class="px-6 py-3">
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            @if(is_object($item))
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$item->item_name}}
                </th>
                <th>
                <button wire:click="destroy('{{$item->item_name}}')">
                    <div class=" w-8 h-8">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 12V17" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 12V17" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 7H20" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    </button>
                </th>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    </div>
    @endif
    </div>

    <!-- delete item groups -->

    
    <div>
    @if( $view=='DeleteGroup' )
    <div class="relative mx-auto my-5 sm:px-50 overflow-x-auto justify-center sm:rounded-lg px-20">
    <table class=" w-full mx-auto text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Group
                </th>
                <th scope="col" class="px-6 py-3">
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($groups as $item)
            @if(is_object($item))
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$item->group}}
                </th>
                <th>
                <button wire:click="destroy({{$item->id}})">
                    <div class=" w-8 h-8">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 12V17" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 12V17" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 7H20" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    </button>
                </th>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    </div>
    @endif
    </div>

 
    <!-- yes no dialog box -->
    

</div>
<div>

<footer class="bg-white rounded-lg dark:bg-gray-900 m-4">
<hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0">
                <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.8" d="M12.8992 2.52009L12.8692 2.59009L9.96922 9.32009H7.11922C6.43922 9.32009 5.79922 9.45009 5.19922 9.71009L6.94922 5.53009L6.98922 5.44009L7.04922 5.28009C7.07922 5.21009 7.09922 5.15009 7.12922 5.10009C8.43922 2.07009 9.91922 1.38009 12.8992 2.52009Z" fill="#805ad5"></path> <path d="M18.2907 9.52002C17.8407 9.39002 17.3707 9.32002 16.8807 9.32002H9.9707L12.8707 2.59002L12.9007 2.52002C13.0407 2.57002 13.1907 2.64002 13.3407 2.69002L15.5507 3.62002C16.7807 4.13002 17.6407 4.66002 18.1707 5.30002C18.2607 5.42002 18.3407 5.53002 18.4207 5.66002C18.5107 5.80002 18.5807 5.94002 18.6207 6.09002C18.6607 6.18002 18.6907 6.26002 18.7107 6.35002C18.9707 7.20002 18.8107 8.23002 18.2907 9.52002Z" fill="#805ad5"></path> <path opacity="0.4" d="M21.7602 14.1998V16.1498C21.7602 16.3498 21.7502 16.5498 21.7402 16.7398C21.5502 20.2398 19.6002 21.9998 15.9002 21.9998H8.10023C7.85023 21.9998 7.62023 21.9798 7.39023 21.9498C4.21023 21.7398 2.51023 20.0398 2.29023 16.8598C2.26023 16.6198 2.24023 16.3898 2.24023 16.1498V14.1998C2.24023 12.1898 3.46023 10.4598 5.20023 9.70982C5.80023 9.44982 6.44023 9.31982 7.12023 9.31982H16.8802C17.3702 9.31982 17.8402 9.38982 18.2902 9.51982C20.2902 10.1298 21.7602 11.9898 21.7602 14.1998Z" fill="#805ad5"></path> <path opacity="0.6" d="M6.95023 5.52979L5.20023 9.70978C3.46023 10.4598 2.24023 12.1898 2.24023 14.1998V11.2698C2.24023 8.42979 4.26023 6.05979 6.95023 5.52979Z" fill="#805ad5"></path> <path opacity="0.6" d="M21.7591 11.2698V14.1998C21.7591 11.9898 20.2891 10.1298 18.2891 9.51984C18.8091 8.22984 18.9691 7.19984 18.7091 6.34984C18.6891 6.25984 18.6591 6.17984 18.6191 6.08984C20.4891 7.05984 21.7591 9.02984 21.7591 11.2698Z" fill="#805ad5"></path> <path d="M14.5 16.75H9.5C9.09 16.75 8.75 16.41 8.75 16C8.75 15.59 9.09 15.25 9.5 15.25H14.5C14.91 15.25 15.25 15.59 15.25 16C15.25 16.41 14.91 16.75 14.5 16.75Z" fill="#805ad5"></path> </g></svg>
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Expensy</span>
            </a>
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/" class="hover:underline">Expensy™</a>. All Rights Reserved.</span>
    </div>
</footer>