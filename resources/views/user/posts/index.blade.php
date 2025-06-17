
@extends('layouts.base')

@section('page.title','Посты Юзера')

@section('content')
<x-card-title>
    {{__('Посты юзера')}}
    <x-slot name='right'>

        <a href="{{route('user.posts.create',['name' => Auth::user()->name])}}"> <x-button> Создать новый пост для {{ Auth::user()->id }} </x-button></a>
    </x-slot>

</x-card-title>
<div>
    @if (empty($posts))

    <div> {{__('Нет ни одного поста')}}</div>
        
    @else
    @foreach ($posts as $post )
        <div>{{$post->id}}</div>
        <h5> <a href="{{route('user.posts.show',['name' => Auth::user()->name,'post' => $post->id])}}">      {{$post->title}}</a></h5>

        <div>{!! $post->content !!}</div>
         <div class='text-lime-500'> {{$post->published_at-> diffForHumans()}}</div>
        <div class='text-lime-500'> {{$post->published_at->format('d.m.Y H:i:s')}}</div>
    @endforeach
    <div>{{$posts->links()}}</div>
      </div> 
      @endif 
  
    


@endsection
