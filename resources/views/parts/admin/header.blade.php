  @vite(['resources/scss/app.scss'])
 <header class='py-3'>
     <div class='app-container'>
         <div class='flex justify-between text-lime-500'>

             <div class='header__tabs'>
                 {{-- <a href="" class='{{ active_link('home', 'text-red-500') }}'
                 
                 rel="noopener noreferrer"></a> --}}
                 
                <x-logo>
                    <img href="{{ route('home') }}" src="{{ asset('images/logo.png') }}" alt="{{ __('Логотип') }}">
                  
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

