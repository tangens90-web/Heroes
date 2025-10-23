
@extends('layouts.admin')


@section('page.title',__('Просмотр Игрока') )

@section('content')
<div class='app-container'>
<section> 
    <div class='app-container'>
        @if (empty($player))
    <div> Не найдено ни одного игрока</div>
@else
<div>
 <div class=''>
    <h3 class='my-5'>{{ $player->username}}</h3>

    <div class='my-5 players__img-box'>
        
    <img src="{{ asset($player->avatar ?? 'storage/images/players/default.png') }}" alt="{{$player->username}}">

    {{-- <img src="{{ asset('storage/images/players/default.png') }}" alt="{{$player->username}}"> --}}

        {{-- <div>{{$player->avatar}}</div> --}}
{{--         
      <img src="{{ asset(  $player->avatar) }}" alt="  "> --}}
      </div>
       {{-- <div class='text-lime-500'> {{ $player->birthday }}</div> --}}
      <div class='text-lime-500'>{{ $player->birthday ? $player->birthday->diffInYears() . ' лет' : '' }}</div>
    </div>
</div>
@endif

    </div>
</div>
</section>


@endsection