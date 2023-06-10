<div>
        <ul>
            @foreach($alert as $msg)
                <li>{{ $msg }}</li>
            @endforeach
        </ul>
<form>
    <div>
        <label for="email">Email</label>
        <input id="email" type="email" wire:model.lazy="email" name="email" required autofocus>
    </div>

    <div>
        <label for="username">Username</label>
        <input id="username" type="text" wire:model.lazy="username" name="username" required>
    </div>

    <div>
        <label for="password">Password</label>
        <input id="password" type="password" wire:model="password" name="password" required>
    </div>


    <div>
        <button type="submit" wire:click.prevent='update()'>Save</button>
    </div>
</form>
</div>
