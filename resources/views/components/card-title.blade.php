<h4 class='text-black-500 text-2xl'> {{ $slot }}</h4>

@isset($link)
    <div>
        {{ $link }}
    </div>
@endisset
@isset($right)
    <div>
        {{ $right }}
    </div>
@endisset
