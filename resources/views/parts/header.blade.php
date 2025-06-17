 <header class='p-3'>
    <div class='flex justify-between text-lime-500'>
        <div>
            <a href="{{ route('home') }}" class='{{ active_link('home', 'text-red-500' ) }}'  rel="noopener noreferrer">{{ __('Главная') }}</a>
            <a href="{{ route('blog') }}" class='{{ active_link('blog*', 'text-red-500' ) }}' rel="noopener noreferrer">{{ __('Статьи') }}</a>
            {{-- <a href="{{ route('user') }}" class='{{ active_link('user*', 'text-red-500' ) }}' rel="noopener noreferrer">{{ __('Юзер') }}</a> --}}
             <a href="{{ route('players') }}" class='{{ active_link('player*', 'text-red-500' ) }}' rel="noopener noreferrer">{{ __('Игроки') }}</a>
        </div>
       
        @auth
                <!-- Пользователь авторизован: показываем его имя -->
                <a href="{{ route('user.posts', ['name' => Auth::user()->name]) }}"> {{ Auth::user()->name }} </a>
                <li></li>
                <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Выход</button>
</form>
            @else
                <!-- Не авторизован: показываем вход и регистрацию -->
                <ul>
        <li>
            <a href="{{ route('login') }}" class='{{ active_link('login', 'text-red-500' ) }}'  rel="noopener noreferrer">{{ __('Вход') }}</a>
        </li>
        <li>
            <a href="{{ route('register') }}" class='{{ active_link('register', 'text-red-500' ) }}'  rel="noopener noreferrer">{{ __('Регистрация') }}</a>
        </li>
        </ul>
            @endauth

    </div>
    
    </header>