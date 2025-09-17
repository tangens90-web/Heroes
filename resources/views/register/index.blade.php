@extends('layouts.base')

@section('page.title', 'Страница регистрации')

@section('content')

    <x-errors></x-errors>

    <x-card>
        <x-card-header>
            <x-card-title>{{ __('Регистрация') }}</x-card-title>
            <x-slot name="right">
                <div class=''>
                    <p> Не зарегистрированы?
                        <a class='hover:text-blue-500' href="{{ route('login') }}"
                            class='{{ active_link('login', 'text-red-500') }}'
                            rel="noopener noreferrer">{{ __('Войти') }}</a>
                    </p>
                </div>
            </x-slot>

        </x-card-header>
        <div>

            <x-form action="{{ route('register.store') }}" method="POST">
                @csrf

                {{-- Username --}}
                <x-item labelClass='somethin twtwetwtwetg' placeholder='Например: username12345' :required="true" name='name' id='name'
                    value="{{ request()->old('name') }}">{{ __('Введите username') }}</x-item>
                {{-- Username/ --}}
                {{-- Почта input --}}
                <x-item placeholder='Например: ivan@mail.ru' required name='email' id='email' type='email'
                    value="{{ old('email') }}">{{ __('Введите почту') }}</x-item>

                {{-- Почта input --}}

                {{-- Пароль --}}
                <x-item placeholder='Введите пароль' required minlength="6" :required="true" name='password'
                    id='pass' type='password'>{{ __('Введите пароль') }}</x-item>
                {{-- Подтверждение Пароля --}}
                <x-item placeholder='Подтвердите пароль' required minlength="6" :required="true"
                    name='password_confirmation' id='pass_confirmation'
                    type='password'>{{ __('Введите пароль ещё раз') }}</x-item>
                {{-- Подтверждение Пароля/ --}}


                {{-- checkbox --}}
                <div>
                    <input type="hidden" name="agreement" value="0">
                    <input name="agreement" id="agreement" type="checkbox" value="1"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="agreement" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        {{ __('Подтвердить соглашение') }}</label>
                </div>

                <div>
                    {{-- Отправка формы --}}
                    <x-button type='submit'
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Зарегистрироваться') }}</x-button>
                        {{-- Отправка формы/ --}}

                </div>
            </x-form>
        </div>
    </x-card>



@endsection
