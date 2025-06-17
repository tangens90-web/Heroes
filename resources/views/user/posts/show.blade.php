
@extends('layouts.base')

@section('page.title','Просмотр поста')

@section('content')
<x-card-title>{{__('Просмотр поста юзера')}}
  <x-slot name='right'>
    <x-button><a href="{{route('user.posts.edit', ['name' => Auth::user()->name,'post' => $post->id])}}"> Изменить </x-button>
  </x-slot>
</x-card-title>
<div>
  <div>{!! $post->id!!}</div>
      <div>{!! $post->title!!}</div>
  <div>{!! $post->content !!}</div>
    <div class='text-lime-500'> {{now()-> format('d.m.Y H:i:s')}}</div>


@endsection
