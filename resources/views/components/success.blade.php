@props(['name'])
@if ($errors->any() && !$errors->has($name))
<div class="relative">
  <img src="/images/success.svg" alt="success" class=" absolute right-4 -mt-10">
</div> 
@endif