
@extends('layouts.base')

@section('page.title',__('Список постов'))

@section('content')
<x-card-title>{{__('Список постов')}}</x-card-title>

<x-form action="{{ route('blog') }}">

    <x-input name='search' value="{{ request('search') }}" 
    placeholder="{{__('Поиск')}}"></x-input>
 
         <x-select value="{{ request('category_id') }}" name="category_id" :options="$categories"></x-select>

    <x-button type='submit'>{{__('Применить')}}</x-button>
</x-form>
<div>
    @if (empty($posts))

    <div> {{__('Нет ни одного поста')}}</div>
        
    @else
    @foreach ($posts as $post )
        <div>{{$post->id}}</div>
        <h5> <a href="{{route('blog.show', $post->id)}}">      {{$post->title}}</a></h5>

        <div>{!! $post->content !!}</div>
        {{-- <div class='text-lime-500'> {{now()-> format('d.m.Y H:i:s')}}</div> --}}
         <div class='text-lime-500'> {{$post->published_at?-> diffForHumans()}}</div>
        <div class='text-lime-500'> {{$post->published_at?-> format('d.m.Y H:i:s')}}</div>
    @endforeach
      </div> 
      <div>{{$posts->links()}}</div>
      @endif 
  
    


@endsection

