@extends('layouts.admin')


@section('page.title', __('Создание игрока Игрока'))

@section('content')
    <section>
        <div class='app-container'>
            <x-form action="{{ route('admin.tournaments.store') }}" method="POST" enctype="multipart/form-data">
                {{-- название турнира --}}
                <x-item placeholder='Название турнира' required type="text" name='title'
                    id="title">{{ __('Введите название турнира') }}</x-item>
                {{-- призовой фонд --}}
                <x-item placeholder='Призовой фонд' type="text" name='prize_fund'
                    id="prize_fund">{{ __('Введите призовой фонд') }}</x-item>
                <div>

                    {{-- выборка игроков --}}
                    {{-- @livewire('players-select') --}}
                    {{-- <livewire:test  > --}}
                    @php
                        $options = [];
                        for ($i = 2; $i <= 64; $i++) {
                            $options[$i] = $i;
                        }
                    @endphp
                    <div>
                        <label for="number_participants">Количество участников</label>

    <x-select 
        name="number_participants" 
        id="number_participants"
        :options="$options" 
        :value="old('number_participants')" 
        required
    />

    @error('number_participants')
        <div style="color:red;">{{ $message }}</div>
    @enderror
                    </div>

                    <label for='image'>Добавьте изображение для турнира</label>
                    <input type='file' id='image' name='image'>
                </div>
                <x-errors></x-errors>
                <x-button type='submit'>Добавить турнир</x-button>
            </x-form>
        </div>


    @endsection
