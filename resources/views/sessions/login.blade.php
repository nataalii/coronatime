@extends('login-layout')
@section('content')

<div class="-mt-20">
    <h2 class=" font-black text-3xl tracking-tight text-gray-900">{{ __('text.welcome') }}</h2>
    <h3 class="text-xl text-dark-60 mt-4">{{ __('text.welcome_details') }}</h3>
 </div>
 <div>
 <form  method="POST" action="{{ route('login.store') }}" class="space-y-6 w-400px">
   @csrf
    <div class="space-y-1">
      <label for="username" class="block text-xs font-bold text-dark-100">{{ __('text.username') }}</label>
      <x-input name=username type=text placeholder="{{ __('text.username_placeholder') }}" err=username/>
      <x-success name=username/>
      <x-error name=username/> 
      
    </div>
   <div class="space-y-1">
     <label for="password" class="block text-xs font-bold text-dark-100">{{ __('text.password') }}</label>
     <x-input name=password type=password placeholder="{{ __('text.password_placeholder') }}" err=password/>
     <x-success name=password/>
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
     <a href="{{ route('register.create') }}" class="text-dark-100 font-bold">{{ __('text.signup') }} </a>
   </p>
 </form>
</div>


@endsection