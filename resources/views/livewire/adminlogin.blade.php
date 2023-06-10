<div> 
@if(session('guest') == 1)
@php
    session()->forget('guest')
@endphp
    @livewire('guestlogin')
@else
<h1>Admin Login</h1>
<button wire:click='guest()'>I am a User</button> 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div>
{{$error}}
<form>

    <div>
        <label for="admin_id">Admin ID</label>
        <input id="admin_id" type="text" wire:model="admin_id" name="admin_id" value="{{ old('admin_id') }}" required autofocus>
    </div>

    <div>
        <label for="password">Password</label>
        <input id="password" type="password" wire:model="password" name="password" required>
    </div>
    
    <div>
        <button type="submit" wire:click.prevent='login()'>Login</button>
    </div>
</form>
</div>
@endif