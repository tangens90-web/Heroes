@extends('layouts.admin')


@section('page.title','Админка')

@section('content')
<div class='app-container'>
wetgwwegtwegwgewg
{{-- @if (empty($players))
    <div> <p>Не найдено ни одного игрока </p>
        <div class=''><x-button> {{__('Добавить')}}</x-button></div>
    </div>
    
@else  --}}
    
<x-button><a href="{{ route('admin.players')}}"> {{ __('Игроки') }} </a></x-button>
<x-button><a href="{{ route('admin.tournaments')}}"> {{ __('Турниры') }} </a></x-button>
 {{-- @endif  --}}


</div>
</div>
@endsection