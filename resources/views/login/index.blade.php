@extends('layouts.base')

@section('page.title','Страница входа')

@section('content')



    <x-card>
        <x-card-header>
            <x-card-title>{{__('Вход')}}</x-card-title>
            <x-slot name="right">
                <a href="{{ route('register') }}" class='{{ active_link('register', 'text-red-500' ) }}'  rel="noopener noreferrer">{{ __('Регистрация') }}</a>
            </x-slot>
   
</x-card-header>
        <div>
            <x-form action="{{ route('login.store') }}" method="POST">
                  {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                  @csrf
        <x-label required for="email">{{__('Введите почту')}}</x-label>
         <x-input type="email" id="email" name='email' :required="true" />
        {{-- <input type="email"  size="30"  /> --}}
    </div>

    <div>
        <x-label required for="pass">{{__('Введите пароль')}}</x-label>
        <x-input type="password" id="pass" name="password" minlength="6" :required="true" />
        {{-- <input     required class='border border-lime-500'/> --}}
    </div>
        {{-- checkbox --}}
    <div>
            <input name="remember" id="remember" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300" >
                {{__('Запомнить меня')}}</label>
    </div>

    <div>
        <x-button type='submit' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{__('Залогиниться')}}</x-button>
             
    </div>
        </x-form>
    </div>
    </x-card>
    


@endsection
