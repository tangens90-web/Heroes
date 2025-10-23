@extends('layouts.base')

@section('page.title', 'Laravel')

@section('content')
    <h4 class='text-black-500 text-2xl'> Главная страница</h4>
    <div> Секция предстоящих матчей
        @foreach ($matches as $match)
        
            <div>
                {{ $match->stage->title ?? 'Без стадии' }}
                {{ strtoupper($match->bo_format) ?? 'Нет формата' }}
                {{ $match->type }}


                <h2>Матч #{{ $match->id }} - Стадия: {{ $match->stage->title ?? 'Не задана' }}</h2>

                <h3>Сторона 1</h3>
                <ul>
                    @foreach ($match->players->where('pivot.side', 1) as $player)
                        <li>{{ $player->username }}</li>
                    @endforeach

                    @if ($match->players->where('pivot.side', 1)->isEmpty())
                        <li>Игроков нет</li>
                    @endif
                </ul>
{{-- сторона 2 --}}
                <h3>Сторона 2</h3>
                <ul>
                    @foreach ($match->players->where('pivot.side', 2) as $player)
                        <li>{{ $player->username }}</li>
                    @endforeach

                    @if ($match->players->where('pivot.side', 2)->isEmpty())
                        <li>Игроков нет</li>
                    @endif
                </ul>
{{-- сторона 3 --}}
{{-- @if ($match->typeIsAllowed())
    <li>Тип матча не 1v1v1 и не 1v1v1v1</li>
    @else <li>Тип матча нет такого</li>

@endif --}}
            </div>
        @endforeach



    </div>
@endsection
