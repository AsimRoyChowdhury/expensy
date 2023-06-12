<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="bg-gray-900">
        @if(session('admin')==null)
            @livewire('editinfo')
            @livewire('expenditureinfo')
        @else
            @livewire('editinfo')
        @endif
    @livewireScripts

</body>

</html>
