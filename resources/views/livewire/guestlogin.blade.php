<div>
@if(session('admin') == 1)

    @livewire('adminlogin')
    @php
    session()->forget('admin')
@endphp
@else
<h1>Guest Login</h1>
<button wire:click='admin()'>I am an Administrator</button>
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
        <label for="email">Email</label>
        <input id="email" type="email" wire:model="email" name="email" value="{{ old('email') }}" required autofocus>
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