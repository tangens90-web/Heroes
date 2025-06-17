
@extends('layouts.base')

@section('page.title','Все игроки')


@section('content')
@if (empty($players))
    <div> Не найдено ни одного игрока</div>
@else
    

@foreach ($players as $player )
    <div class='grid'>
    
    <x-player.link :link="route('player.show',['player'=>$player->username])">
    <div class='w-[50px] h-10'>
    <h3>{{ $player->username}}</h3>
    </div>
   </x-player.link>
   </div>
    
@endforeach
@endif

@endsection