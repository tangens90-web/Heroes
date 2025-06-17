@extends('layouts.base')

@section('page.title',__('Игрок: ' . $player->username))


@section('content')


@if (empty($player))
    <div> Такого игрока не найдено</div>
@else
    


    <div class='grid'>
    <div>{{$player->username}}</div>
   </div>
    

@endif
@endsection