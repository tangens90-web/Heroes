
@extends('layouts.base')

@section('page.title','Все игроки')


@section('content')
@if (empty($players))
    <div> Не найдено ни одного игрока</div>
@else
    

@foreach ($players as $player )
    <div class=''>
    
    <x-player.link class='block h-auto' :link="route('player.show',['player'=>$player->username])">
    <div class=''>
    <h3 class='my-5'>{{ $player->username}}</h3>

    <div class='my-5 players__img-box'>
      <img src="{{ asset($player->avatar ?? 'storage/images/players/default.png') }}" alt="{{$player->username}}">
      </div>
       {{-- <div class='text-lime-500'> {{ $player->birthday }}</div> --}}
      <div class='text-lime-500'>{{ $player->birthday ? $player->birthday->diffInYears() . ' лет' : '' }}</div>
    </div>
   </x-player.link>
   </div>
    
@endforeach
@endif

@endsection