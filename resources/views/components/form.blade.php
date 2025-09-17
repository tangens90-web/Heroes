
@props(['method'=>'GET'])
@php($method =strtoupper($method))
@php($_method = in_array($method,['GET','POST']))
       

<div class='flex justify-center '>
<form class='min-w-[400px]' {{ $attributes }} method="{{ $_method ? $method : 'POST' }}">
    @csrf
   @unless ($_method)
       @method($method)
   @endunless
   
    
        
   
    {{ $slot }}
</form>
</div>