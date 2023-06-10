<div>
    <button wire:click='logout()'>Logout</button> 
    <h1>Guest Information</h1>

    <p><strong>Hello </strong> {{ $user->username }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>

    <button wire:click="edit()">Edit</button>

</div>
