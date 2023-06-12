<section class="text-gray-400 body-font bg-gray-900 m-0">
<div class="flex flex-col  bg-gray-900">
<div>

    <!-- Add Expenses -->
    <button class="flex text-white   border border-purple-600 my-2 mx-auto py-1 px-6 focus:outline-none hover:bg-purple-600 rounded-lg text-lg" wire:click='addExpense'>
    Add Expense</span></button>
    @if( $view=='AddExpense' )
    <div id="addItemForm" class="relative z-0 w-full mb-6 group flex my-5 justify-center">
        <form class="flex flex-wrap mx-auto">
            <div class='w-full md:w-auto flex-grow md:flex-initial flex items-center justify-between ml-4 mr-4 md:mb-4'>
            <select id="Group" wire:model="itemGroup" wire:change="selectItemGroup" class="flex text-white   border border-purple-400 bg-purple-400 my-2 mx-auto py-1 px-6 focus:outline-none hover:bg-purple-600 rounded text-xs">
            <option value="">Select Group</option>
                <!-- <option value="">Select Group: </option> -->
                @foreach($groups as $num)
                <option value="{{ $num->id }}">{{$num->group}}</option>
                @endforeach
            </select>
            </div>
            <div class='w-full md:w-auto flex-grow md:flex-initial flex items-center justify-between mr-4 md:mb-4'>
            <select id="itemGroup" wire:model="itemName" class="flex text-white   border border-purple-400 bg-purple-400 my-2 mx-auto py-1 px-6 focus:outline-none hover:bg-purple-600 rounded text-xs">
                <option value="">Select Item</option>

                @foreach($items as $num)
                @if(is_object($num))
                <option value="{{ $num->id }}">{{$num->item_name}}</option>
                @endif
                @endforeach
            </select>
            </div>
            <div class='w-full md:w-auto flex-grow md:flex-initial flex items-center justify-between mr-4 md:mb-4'>
            <input type="text" wire:model="quantity" id="itemName" placeholder="Add Quantity" class="flex text-gray-500   border border-purple-400 bg-white my-2 mx-auto py-1 px-6 focus:outline-none  rounded text-xs">
            </div>
            <div class='w-full md:w-auto flex-grow md:flex-initial flex items-center justify-between mr-4 md:mb-4'>
            <input type="text" wire:model="expenseAmount" id="itemName" placeholder="Add Cost/Quantity" class="flex text-gray-500   border border-purple-400 bg-white my-2 mx-auto py-1 px-6 focus:outline-none  rounded text-xs">
            </div>
            <div class='w-full md:w-auto flex-grow md:flex-initial flex items-center justify-between mr-4 md:mb-4'>
                <button wire:click="saveExpense()" class="flex text-white   border border-purple-700 bg-purple-700 my-2 mx-auto py-1 px-6 focus:outline-none  rounded text-xs">Save Expense</button>
                </div>
            </form>
    </div>
    @endif


    <!-- Drop Down menu for selecting group, by default nothing is selected -->
    <!-- <label for="item">Item Group: </label> -->
    <div  class="my-6 flex justify-center mx-auto ">
    <select id="itemGroup" wire:model="groupShow" class=" text-white bg-purple-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg mx-auto text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-blue-800" wire:change="selectGroup" >
    
        <option value="" >All Expenses</option>
        @foreach($groups as $num)
        <option value="{{ $num->id }}">{{$num->group}}</option>
        @endforeach

    </select>
    </div>

    <div  class="my-6 flex justify-center mx-auto ">
    <!-- Delete Yes or No dialog box -->
    @if($view=='deleteExpenseDialog')
    <form class="mx-auto">
        <div id="alert-additional-content-2" class="p-3 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-400" role="alert">
            <div class="flex items-center">
                <h3 class="text-lg font-medium">Do you want to delete this expense?</h3>
            </div>
            <div class="flex my-4">
                <button wire:click="Yes({{$delid}})" type="button" class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 mx-4 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <svg aria-hidden="true" class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                Yes
                </button>
                <button wire:click="No()" type="button" class="text-red-800 bg-transparent border border-red-800 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800" data-dismiss-target="#alert-additional-content-2" aria-label="Close">
                No
                </button>
            </div>
        </div>
    </form>
    @endif
    <div>
            @if($msg==1)
            <div class="flex p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div>
                <span class="font-medium">Item Successfully Added!</span>
                </div>
            </div>
            @endif
    </div>
    </div>
    
 <!-- Showing items as per their group, if no group is selected then all items are shown -->
<div class="relative overflow-x-auto  sm:rounded-lg px-8">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Item Name
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Group
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Quantity
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Price
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Amount
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Added On
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only"></span>
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($expenses as $expense)
        @php
            $totalamount = $expense->Quantity*$expense->cost;
            $totalexpense = $totalexpense + $totalamount;
            $createdAt = \Carbon\Carbon::parse($expense->created_at)->format('Y-m-d');
        @endphp
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$expense->item_name}}
                </th>
                <td class="px-6 py-4">
                {{$expense->group}}
                </td>
                <td class="px-6 py-4">
                {{$expense->Quantity}}
                </td>
                <td class="px-6 py-4">
                {{$expense->cost}}
                </td>
                <td class="px-6 py-4">
                {{$totalamount}}
                </td>
                <td class="px-6 py-4">
                {{$createdAt}}
                </td>
                <td class="px-6 py-4">
                    <button wire:click='deleteExpense({{$expense->id}})'>
                    <div class=" w-8 h-8">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 12V17" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 12V17" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 7H20" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    </button>
                </div>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr class="font-semibold text-gray-900 dark:text-white">
                <th scope="row" class="px-6 py-3 text-base">Total</th>
                <td class="px-6 py-3"></td>
                <td class="px-6 py-3"></td>
                <td class="px-6 py-3"></td>
                <td class="px-6 py-3">{{$totalexpense}}</td>
            </tr>
        </tfoot>
    </table>
</div>



   

    <!-- Delete Yes or No dialog box -->
    <!-- @if($view=='deleteExpenseDialog')
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
</div> -->

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


</div>
</section>