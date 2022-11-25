@extends('confirmation-layout')
@section('slot')
<div class="mt-44">
    <div>
        <h2 class=" font-black text-3xl tracking-tight text-gray-900">{{ __('Reset Password') }}</h2>
     </div>
     <div>
     <form  method="POST" action="{{ route('login.store') }}" class=" space-y-14 w-450px text-left">
       @csrf
        <div class="space-y-1">
          <label for="email" class="block text-xs font-bold text-dark/100">{{ __('Email') }}</label>
          <div class="mt-1 relative">
            <input id="email" name="email" type="email"  value="{{ old('email') }}" placeholder="Enter your email" 
            class="block w-full appearance-none rounded-md border px-3 h-14
            placeholder-gray-400 shadow-xs focus:border-brand/primary focus:outline-none focus:ring-brand/primary focus:ring-0 sm:text-sm focus:shadow-input
            {{  !$errors->any() ? " border-dark/20" : ($errors->has('email') ? "border-system/error" : "border-system/success") }}">
          </div>
          <x-success name=email/>
          <x-error name=email/> 
          
        </div>
        <div>
            <button type="submit" class=" mt-5 h-14 flex w-full justify-center rounded-md bg-grn py-2 px-4 font-bold pt-4 text-white shadow-xs focus:outline-none focus:ring-2 ">
              <a href="">{{__("RESET PASSWORD")  }}</a>
            </button>
          </div>
      </form>  
</div>



@endsection