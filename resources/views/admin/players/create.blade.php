{{-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> --}}

@extends('layouts.admin')


@section('page.title',__('Добавление Игрока') )

@section('content')
<div class='app-container'>

<div class='flex justify-center'>
    <x-errors></x-errors>
    <x-form action="{{ route('admin.player.store') }}" method='post' enctype="multipart/form-data">
       
    <x-item name='username'>
        Введите ник игрока
    </x-item>

    <x-item name='name'>
        Введите имя  игрока
    </x-item>
   
    <x-item name='surname'>
        Введите фамилию игрока
    </x-item>
     <label for="date">Выберите дату:</label>
    <input type="text" id="birthday" name="birthday" required class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 max-w-[500px]'>

     {{-- <x-item name='birthday' id="birthday">
        Введите дату рождения игрока
    </x-item> --}}

     <x-item name='country'>
        Введите страну
    </x-item>
    <div>
    <label for='avatar'>Добавьте фото</label>
    <input type='file' id='avatar' name='avatar'>
    </div>
    <x-button type='submit'>Добавить игрока</x-button>

    </x-form>
</div>
    @endsection

@push('css')
  <link rel="stylesheet" href="/css/flat.css">

@endpush
    @push('js')
  <script src='/js/flat.js'></script>
@endpush
<script>
document.addEventListener('DOMContentLoaded', function() {
    flatpickr("#birthday", {
        dateFormat: "Y-m-d" // формат даты, который Laravel ожидает (например, 2024-04-27)
    });
});
</script>

