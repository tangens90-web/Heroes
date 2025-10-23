@extends('layouts.admin')


@section('page.title', 'Админка')

@section('content')
<div class='app-container'>
    @if (empty($players))
        <div>
            <p>Не найдено ни одного игрока </p>
            <div class=''><x-button> {{ __('Добавить') }}</x-button></div>
        </div>
    @else
        <x-button><a href="{{ route('admin.player.create') }}"> {{ __('Добавить нового игрока') }} </a></x-button>
        @foreach ($players as $player)
            <div class='grid'>
                <x-player.link :link="route('admin.player.show', ['id' => $player->id, 'player' => $player->username])" >

                <div class='w-[50px] h-10'>
                    <h3>{{ $player->username }}</h3>

                </div>

                </x-player.link>

            </div>
        @endforeach
    @endif

</div>

@endsection
