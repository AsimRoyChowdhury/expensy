
<section class="text-gray-400 body-font bg-gray-900 m-0">
<div class="flex flex-col">
    <a href = "http://127.0.0.1:8000/">
	
			<button class="flex text-white text-xs  border border-purple-400 mt-10 ml-auto mx-10 py-1 px-6 focus:outline-none hover:bg-purple-600 rounded text-lg" wire:click='logout()'>Logout</button>
		</a>
<div class="flex flex-col justify-center mx-auto max-w-xl my-1 p-6  rounded-xl sm:px-12 dark:bg-gray-900 dark:text-gray-100">
	<img src="https://source.unsplash.com/150x150/?portrait?3" alt="" class="w-32 h-32 mx-auto rounded-full dark:bg-gray-500 aspect-square">
	<div class="space-y-4 text-center divide-y divide-gray-700">
		<div class="my-2 space-y-1 flex flex-col items-center justify-center pt-2 space-x-4 align-center">
	  <button class="flex text-white text-xs  border border-purple-400 py-1 px-6 focus:outline-none hover:bg-purple-600 rounded text-lg" wire:click='edit'>Edit Profile</button>
			<h2 class="text-xl font-semibold sm:text-2xl">{{ $user->username }}</h2>
			<p class="px-5 text-xs sm:text-base dark:text-gray-400">{{ $user->email }}</p>
		</div>
		<div class="flex flex-col items-center justify-center pt-2 space-x-4 align-center">
            
		</div>
	</div>
	</div>
</div>
</section>
<!-- </div>
<section>
<div>
    <button wire:click='logout()'>Logout</button> 
    <h1>Guest Information</h1>

    <p><strong>Hello </strong> {{ $user->username }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>

    <button wire:click="edit()">Edit</button>

</div> -->
