
@extends('layouts.base')

@section('page.title','Создать новый пост')

@section('content')
{{-- ошибки --}}

<x-errors></x-errors>
<x-card-title>
    {{__('Посты юзера')}}
  <x-slot name='link'>
    <a href="{{ route('user.posts',['name' => Auth::user()->name]) }}"> Назад</a>
  </x-slot>

</x-card-title>
<div>
  <div> Тут создаём новые посты юзера</div>
  <x-form  action="{{ route('user.posts.store',['name' => Auth::user()->name]) }}" method='POST'>
    @csrf
    <x-label>
      {{__('Название поста')}}
    </x-label>
    <x-input autofocus name='title' value="{{ $post->title?? '' }}"/>


  
    <x-error name='title'></x-error>
   
    <x-label>
  {{__('Содержимое поста')}}
      
    </x-label>
    {{-- <x-input  name='content'>
    
    </x-input> --}}
    {{-- <input id="content" type="hidden" value="{{ $post->content?? '' }}" > --}}
 <x-label required>{{ __('Содержание поста') }}</x-label>
        <x-trix name="content" value="{{ $post->content ?? '' }}" />
         <x-error name='content'></x-error>
         <div class='published_at'>
          <x-label required>{{__('Дата публикации')}}</x-label>
          <x-input name='published_at' placeholder='dd.mm.yyyy'></x-input>
          <x-error name='published_at'></x-error>
         </div>
         <x-checkbox></x-checkbox>
    <x-button type='submit'> Создать пост</x-button>
  </x-form>

  
    


@endsection
@push('css')
  <link rel="stylesheet" href="/css/trix.css">

@endpush
@push('js')
  <script src='/js/trix.js'></script>
@endpush