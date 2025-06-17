<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('css')
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('page.title','Laravel')</title>
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
       @yield('content')
    </main>
    @include('parts.footer')
    </div>
    <script>
        
        window.App = @json(['locale'=>config('app.locale')])
    </script>
    @stack('js')
</body>
</html>
