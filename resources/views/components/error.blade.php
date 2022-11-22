@props(['name'])

@error($name)
<p class=" text-system/error text-xs mt-2">{{ $message }}</p>  
@enderror