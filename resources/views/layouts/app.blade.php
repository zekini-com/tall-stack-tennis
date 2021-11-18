<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tennis Game App</title>
    <link rel="shortcut icon" type="image/svg" href="{{asset('tennisball.svg')}}"/>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    @livewireStyles
</head>
<body>

    <div id="app-container">
        @yield('page-contents')
    </div>

   
    
    @livewireScripts
</body>
</html>