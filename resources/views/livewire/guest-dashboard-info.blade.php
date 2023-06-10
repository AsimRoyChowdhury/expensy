<div>
    <h1>Guest Information</h1>

    <p><strong>Hello </strong> {{ $user->username }}</p>
    <br>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <br>

    <button wire:click="edit()">Edit</button>

</div>
