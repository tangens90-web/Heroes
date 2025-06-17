  @props(['name'=>''])
  
  <div class='bg-lime-500'>
  @error($name)
        {{$message}}
      @enderror
  </div>