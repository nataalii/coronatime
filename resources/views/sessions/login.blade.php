@extends('login-layout')
@section('content')

<div class="mt-28">
    <h2 class=" font-black text-2xl lg:text-3xl tracking-tight text-gray-900">{{ __('text.welcome') }}</h2>
    <h3 class=" text-base lg:text-xl text-dark-60 mt-4">{{ __('text.welcome_details') }}</h3>
 </div>
 <div>
 <form  method="POST" id="form" action="{{ route('login.store', app()->getLocale()) }}" class="space-y-6 sm:w-340px lg:w-400px">
   @csrf
    <div class="space-y-1">
      <label for="login" class="block text-xs font-bold text-dark-100">{{ __('text.username') }}</label>
      <x-input name=login type=text placeholder="{{ __('text.username_or_email') }}" err="login" id="login"/>
      <x-success name="login"/>
      <x-error name="login"/> 
      
    </div>
   <div class="space-y-1">
     <label for="password" class="block text-xs font-bold text-dark-100">{{ __('text.password') }}</label>
     <x-input name=password type=password placeholder="{{ __('text.password_placeholder') }}" err=password/>
     <x-error name=password/>
   </div>

   <div class="flex items-center justify-between mb-4">
      <x-checkbox/>
   </div>

   <div>
     <button type="submit" class=" mt-5 h-14 flex w-full justify-center rounded-md bg-grn py-2 px-4 font-bold pt-4 text-white shadow-xs focus:outline-none focus:ring-2 ">
       {{__("text.login")  }}
     </button>
   </div>
   <p class=" text-center text-dark-60">{{ __('text.account') }}
     <a href="{{ route('register.create', app()->getLocale()) }}" class="text-dark-100 font-bold">{{ __('text.signup') }} </a>
   </p>
 </form>
</div>

@endsection