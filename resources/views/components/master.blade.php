 <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link href="{{ asset('css/main.css') }}" rel="stylesheet">
   <link href="/css/styles.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tweety</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    
</head>
<body>
    <div id="app">
        <section class="flex px-8 py-3  bg-gray-50 border-b border-gray-400" noselect>
            
            <div class="navmenu">
            <x-menu> </x-menu>
            </div>

            <header class="container mx-auto flex justify-center">
                
                <a href="/tweets" class="flex">
                <img width="50" height="50" src="/images/tweety.jpg" class="mr-2 rounded-lg"> <p class="font-bold text-xl mt-2 text-blue-400">Tweety</p></a>
                  
            </header>
            <div class="friendsmenu">
            <x-friendsicon> </x-friendsicon>
            </div>
            
        </section>
        <div class="flex justify-between">
        <x-minisidebar> </x-minisidebar>
        <x-mini-friend-list> </x-minisidebar>
        </div>
        <div class="mt-10">
        {{ $slot }}
        </div>
        
    </div>
    <script src="https://unpkg.com/turbolinks"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/functions.js" type="text/javascript">
        
    </script>
    
</body>
</html>
