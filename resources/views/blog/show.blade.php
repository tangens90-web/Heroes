
@extends('layouts.base')

@section('page.title',$post->title)

@section('content')
<x-card-title>
  {{$post->title}}
  <x-slot name='link'>
    <a href="{{ route('blog') }}"> Назад</a>
  </x-slot>

</x-card-title>

<div>
   
    
        <div>{{$post->id}}</div>
        {{-- <h5> <a href="{{route('blog.show', $post->id)}}">      {{$post->title}}</a></h5> --}}
        
        <div>{!! $post->content !!}</div>
   
      </div> 
   
  
    


@endsection
