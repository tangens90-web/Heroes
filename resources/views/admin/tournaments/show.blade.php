@extends('layouts.admin')


@section('page.title', __('Просмотр Турнира | :title', ['title' => $tournament->title]))

@section('content')
    <section>
        <div class='app-container'>
            @if (empty($tournament))
                <div> Не найдено ни одного турнира</div>
            @else
                <div>
                    <div class=''>
                        <h3 class='my-5'>{{ $tournament->title }}</h3>

                        <div class='my-5 tournaments__img-box'>

                            {{-- <img src="{{ asset($tournament->avatar ?? 'storage/images/tournaments/default.png') }}" alt="{{$tournament->title}}"> --}}
                            <div class='my-5 players__img-box'>
                                <img src="{{ asset($tournament->image ?? 'images/default.png') }}"
                                    alt="{{ $tournament->title }}">
                            </div>
                            <div>
                                {{ $tournament->number_participants
                                    ? $tournament->number_participants . __(' участника')
                                    : __('Нет данных об участниках') }}
                            </div>
                            <h3>Игроки в турнире:</h3>

                            @if ($tournament->players->isEmpty())
                                <p>Игроки не найдены.</p>
                            @else
                                <ol>
                                    @foreach ($tournament->players as $player)
                                        <li>{{$loop->iteration }}. {{ $player->username }}</li>
                                    @endforeach
                                </ol>
                            @endif
                            <x-button> <a href="{{ route('admin.tournaments.edit', ['id' => $tournament->id, 'tournament' => $tournament->title]) }}">
                                    {{ __('Редактировать турнир') }}
                                </a></x-button>
                            {{-- <img src="{{ asset('storage/images/tournaments/default.png') }}" alt="{{$tournament->username}}"> --}}

                            {{-- <div>{{$tournament->avatar}}</div> --}}
                            {{--         
      <img src="{{ asset(  $tournament->avatar) }}" alt="  "> --}}
                        </div>
                        {{-- <div class='text-lime-500'> {{ $tournament->birthday }}</div> --}}
                        {{-- <div class='text-lime-500'>{{ $player->birthday ? $player->birthday->diffInYears() . ' лет' : '' }}</div> --}}
                    </div>
                </div>
            @endif

        </div>
    </section>


@endsection
