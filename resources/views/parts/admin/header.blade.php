  @vite(['resources/scss/app.scss'])
  <head>


 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
 <header class='py-3'>
     <div class='app-container'>
         <div class='flex justify-between text-lime-500'>

             <div class='header__tabs'>
                 {{-- <a href="" class='{{ active_link('home', 'text-red-500') }}'
                 
                 rel="noopener noreferrer"></a> --}}
                 
               
                  <x-logo href="{{ route('admin') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="{{ __('Логотип') }}">
                  
                </x-logo>
               
                {{-- <x-tab href="{{ route('home') }}" class="{{ active_link('home', 'text-red-500') }}" text="{{ __('Главная') }}" /> --}}
                      
                
                 {{-- <a href="{{ route('user') }}" class='{{ active_link('user*', 'text-red-500' ) }}' rel="noopener noreferrer">{{ __('Юзер') }}</a> --}}
               {{-- <x-tab href="{{ route('players') }}" class="{{ active_link('player*', 'text-red-500') }}" text="{{ __('Игроки') }}" >
                
               </x-tab>
               {{-- <x-tab href="{{ route('tournaments') }}" class="{{ active_link('tournament*', 'text-red-500') }}" text="{{ __('Турниры') }}" /> --}}
             
             </div>

             @auth
                 <!-- Пользователь авторизован: показываем его имя -->
                 Добро пожаловать в админ панель {{ Auth::user()->name }}
               
                
                 <form method="POST" action="{{ route('logout') }}">
                     @csrf
                     <button type="submit">Выход</button>
                 </form>
             @else
                 <!-- Не авторизован: показываем вход и регистрацию -->
               
             @endauth

         </div>
     </div>
 </header>

