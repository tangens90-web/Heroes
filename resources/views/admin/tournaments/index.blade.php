@extends('layouts.admin')


@section('page.title','Админка')

@section('content')
<div class='app-container'>
@if (empty($tournaments))
    <div> <p>Не найдено ни одного турнира </p>
        <div class=''><x-button> {{__('Добавить')}}</x-button></div>
    </div>
    
@else
    
<x-button><a href="{{ route('admin.tournaments.create')}}"> {{ __('Добавить новый турнир') }} </a></x-button>

@foreach ($tournaments as $tournament )
    <div class='grid'>
    
    <x-player.link :link="route('admin.tournaments.show',['id'=> $tournament->id,'tournament'=>$tournament->title])">
       
    <div class=''>
    
    <h3>{{ $tournament->title}}</h3>
    <div class='my-5 players__img-box'>
                            <img src="{{ asset($tournament->image ?? 'images/default.png') }}" alt="{{ $tournament->title  }}">
                        </div>
    </div>

   </x-player.link>
   
   </div>
    
@endforeach
@endif


</div>
</div>
@endsection