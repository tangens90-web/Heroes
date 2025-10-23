  @vite(['resources/scss/app.scss'])
   {{-- <livewire:test  > --}}
      {{-- <livewire:player-select  > --}}
   {{-- @livewire('create-post') --}}
 <header class='py-3 header'>
   
     <div class='app-container'>
         <div class='flex justify-between text-lime-500'>

             <div class='header__tabs'>
                
                 
                <x-logo href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="{{ __('Логотип') }}">
                  
                </x-logo>
               
                {{-- <x-tab href="{{ route('home') }}" class="{{ active_link('home', 'text-red-500') }}" text="{{ __('Главная') }}" /> --}}
                      
                
                 {{-- <a href="{{ route('user') }}" class='{{ active_link('user*', 'text-red-500' ) }}' rel="noopener noreferrer">{{ __('Юзер') }}</a> --}}
               <x-tab href="{{ route('players.index') }}" class="{{ active_link('player*', 'text-red-500') }}" text="{{ __('Игроки') }}" >
                
               </x-tab>
               {{-- <x-tab href="{{ route('tournaments') }}" class="{{ active_link('tournament*', 'text-red-500') }}" text="{{ __('Турниры') }}" /> --}}
               <x-tab href="{{ route('blog') }}" class="{{ active_link('blog*', 'text-red-500') }}" text="{{ __('Статьи') }}" />
             </div>

             @auth
                 <!-- Пользователь авторизован: показываем его имя -->
                 <div class='flex justify-right gap-2 items-center'>
                 <a href="{{ route('user.posts', ['name' => Auth::user()->name]) }}"> {{ Auth::user()->name }} </a>
                 
                 <form method="POST" action="{{ route('logout') }}">
                     @csrf
                     <button type="submit">Выход</button>
                 </form>
                 </div>
             @else
                 <!-- Не авторизован: показываем вход и регистрацию -->
                 <ul>
                     <li>
                         <a href="{{ route('login') }}" class='{{ active_link('login', 'text-red-500') }}'
                             rel="noopener noreferrer">{{ __('Вход') }}</a>
                     </li>
                     <li>
                         <a href="{{ route('register') }}" class='{{ active_link('register', 'text-red-500') }}'
                             rel="noopener noreferrer">{{ __('Регистрация') }}</a>
                     </li>
                 </ul>
             @endauth

         </div>
     </div>
 </header>

