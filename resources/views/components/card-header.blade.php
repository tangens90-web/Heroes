<div class='mb-5 '>
    <div class='border-b mb-2 mt-3'>
        {{ $slot }}
    </div>



    @isset($right)
        <div>
            {{ $right }}
        </div>
    @endisset
</div>
