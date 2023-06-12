<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @livewireStyles
</head>
    <body class="bg-gray-900 ">
    @if(session('email')==null)
    <?php
        header("Location: http://127.0.0.1:8000/"); 
        exit;
    ?>
    @endif
        @livewire('admindashboardinfo')
        @livewire('additem')
        @livewireScripts
    </body>
</html>