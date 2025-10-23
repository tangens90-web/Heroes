@extends('layouts.admin')


@section('page.title', __('Изменение турнира | :title', ['title' => $tournament->title]))

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
                            {{-- <div class='my-5 '>
                                <img src="{{ asset($tournament->image ?? 'images/default.png') }}"
                                    alt="{{ $tournament->title }}">
                            </div> --}}
                           {{-- <livewire:tournament.tournament-edit  > --}}
                            <div class="flex space-x-4 mb-4">
    <a 
        href="{{ route('admin.tournaments.edit', ['id' => $tournament->id, 'tournament' => $tournament->title,'section' => 'players']) }}" 
        class="px-4 py-2 rounded {{ $section === 'players' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }}"
    >
        Игроки
    </a>
    <a 
        href="{{ route('admin.tournaments.edit', ['id' => $tournament->id, 'tournament' => $tournament->title, 'section' => 'groups']) }}" 
        class="px-4 py-2 rounded {{ $section === 'groups' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }}"
    >
        Группы
    </a>
    <a 
        href="{{ route('admin.tournaments.edit', ['id' => $tournament->id, 'tournament' => $tournament->title,'section' => 'matches']) }}" 
        class="px-4 py-2 rounded {{ $section === 'matches' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }}"
    >
        Матчи
    </a>
</div>
                            <div class="tab-content">
    @if ($section === 'players')
        <div>
                                {{ $tournament->number_participants
                                    ? $tournament->number_participants . __(' участника')
                                    : __('Нет данных об участниках') }}
                            </div>
                            <livewire:tournament.tournament-create  :tournamentId="$tournament->id" :tournamentNumberParticipants="$tournament->number_participants">
                                <livewire:tournament.players-list  :tournamentId="$tournament->id" >
    @elseif ($section === 'groups')
       354353543
    @elseif ($section === 'matches')
        42342424
        {{-- @else 
        eqweqweq --}}
    @endif
    
</div>
                           
                                 {{-- <livewire:forms.tournament-table  :tournamentId="$tournament->id" :tournamentNumberParticipants="$tournament->number_participants"> --}}
                                
                            {{-- @livewire('test', ['tournament' => $tournament]) --}}
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
                <div>
           
             {{-- <livewire:tournament.match-create  :tournamentId="$tournament->id" > --}}
        </div>
        </div>
        {{-- создание матча --}}
        
    </section>


@endsection