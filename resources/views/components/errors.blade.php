




@if ($errors->any())
<div class='bg-lime-500'>
    @foreach ($errors->all() as $message )
    <div>
        {{ $message }}
    </div>
        
    @endforeach


</div>
  
@endif