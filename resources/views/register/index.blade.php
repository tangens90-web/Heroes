@extends('layouts.base')

@section('page.title','Страница регистрации')

@section('content')

<x-errors></x-errors>

    <x-card>
        <x-card-header>
            <x-card-title>{{__('Регистрация')}}</x-card-title>
             <x-slot name="right">
                <a href="{{ route('login') }}" class='{{ active_link('login', 'text-red-500' ) }}'  rel="noopener noreferrer">{{ __('Вход') }}</a>
            </x-slot>
   
</x-card-header>
        <div>
            <x-form action="{{ route('register.store') }}" method="POST">
                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                   @csrf
                   <div class='flex items-center justify-center space-x-2 flex-col'>
                <x-label required for="name">{{__('Введите имя')}}</x-label>
         <x-input  id="name" name='name' value="{{ request()->old('name') }}" :required="true" />
            </div>
            <div class='flex items-center justify-center space-x-2 flex-col'>
        <x-label required for="email">{{__('Введите почту')}}</x-label>
         <x-input type="email" name='email' id="email" value="{{ old('email') }}" :required="true" />
         </div>
        {{-- <input type="email"  size="30"  /> --}}
    </div>

    <div class='flex items-center justify-center space-x-2 flex-col'>
        <x-label required for="pass">{{__('Введите пароль')}}</x-label>
        <x-input type="password" id="pass" name="password" minlength="6" :required="true" />
        </div>
<div class='flex items-center justify-center space-x-2 flex-col'>
        <x-label required for="pass_confirmation">{{__('Введите пароль ещё раз')}}</x-label>
        <x-input type="password" id="pass_confirmation" name="password_confirmation" minlength="6" :required="true" />
        </div>
        {{-- <input     required class='border border-lime-500'/> --}}
    
        {{-- checkbox --}}
    <div>
            <input type="hidden" name="agreement" value="0">
            <input name="agreement" id="agreement" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="agreement" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300" >
                {{__('Подтвердить соглашение')}}</label>
    </div>

    <div>
        <x-button type='submit' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{__('Зарегистрироваться')}}</x-button>
             
    </div>
        </x-form>
    </div>
    </x-card>
    


@endsection
