
@extends('layouts.base')

@section('page.title','Создать новый пост')

@section('content')
<x-card-title>
    {{__('Посты юзера')}}
  <x-slot name='link'>
    <a href="{{ route('user.posts.show',['name' => Auth::user()->name,'post' => $post->id]) }}"> Назад</a>
  </x-slot>

</x-card-title>
<div>
<div> Тут меняем пост  юзера №{{ $post->id }} </div>
  <x-form action="{{ route('user.posts.delete',['name' => Auth::user()->name,'post' => $post->id]) }}" method='post'>
    @method('delete')
    @csrf
    <x-button type='submit' class='bg-red-500'> {{__('Удалить пост')}}</x-button>
  </x-form>
  
  <x-form  action="{{ route('user.posts.update',['name' => Auth::user()->name,'post' => $post->id]) }}" method='put'>
    @method('PUT')
    @csrf
    <x-label>
      {{__('Название поста')}}
    </x-label>
    <x-input autofocus name='title' :value="$post->title">
      
    </x-input>
    <x-error name='title'></x-error>
    <x-label>
  {{__('Содержимое поста')}}
      
    </x-label>
    {{-- <x-input  name='content'>
    
    </x-input> --}}
    <input id="content" type="hidden" name="content" value="{!! $post->content !!}">
  <trix-editor input="content" :value="$post->content"></trix-editor>
  <x-error name='content'></x-error>
    <x-button type='submit'> {{__('Изменить пост')}}</x-button>
    
  </x-form>

  
    


@endsection
@push('css')
  <link rel="stylesheet" href="/css/trix.css">

@endpush
@push('js')
  <script src='/js/trix.js'></script>
@endpush