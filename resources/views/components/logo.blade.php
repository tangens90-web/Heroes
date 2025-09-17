@props(['href' => ''])


<div class='header__logo '>
    <a href="{{ $href }}">

        {{ $slot }}
    </a>
</div>
