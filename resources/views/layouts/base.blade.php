<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('page.title','Laravel')</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
</head>
<body>
     
    @php
        $foo =' <h2 class="text-3xl font-bold underline text-lime-500">something</h2>';
    @endphp
    @if (true)
        <p>
            {{-- {{ $foo }} --}}
        </p>
        
       
    
        
    @endif
    <div class="flex flex-col min-h-screen text-center">
   @include('parts.header')
    <main class='flex-grow '>
        <div class='app-container'>
       @yield('content')
        </div>
    </main>
    @include('parts.footer')
    </div>
   
    <script>
        
        window.App = @json(['locale'=>config('app.locale')])
    </script>
    @stack('js')
</body>
</html>
