@extends('login-layout')
@section('content')

<div class="-mt-20">
    <h2 class=" font-black text-3xl tracking-tight text-gray-900">{{ __('Welcome back') }}</h2>
    <h3 class="text-xl text-dark-60 mt-4">{{ __('Welcome back! Please enter your details') }}</h3>
 </div>
 <div>
 <form  method="POST" action="{{ route('login.store') }}" class="space-y-6 w-450px">
   @csrf
    <div class="space-y-1">
      <label for="username" class="block text-xs font-bold text-dark-100">{{ __('Username') }}</label>
      <x-input name=username type=text placeholder="Enter unique username" err=username/>
      <x-success name=username/>
      <x-error name=username/> 
      
    </div>
   <div class="space-y-1">
     <label for="password" class="block text-xs font-bold text-dark-100">{{ __('Password') }}</label>
     <x-input name=password type=password placeholder="Fill in password" err=password/>
     <x-success name=password/>
     <x-error name=password/>
   </div>

   <div class="flex items-center justify-between mb-4">
      <x-checkbox/>
   </div>

   <div>
     <button type="submit" class=" mt-5 h-14 flex w-full justify-center rounded-md bg-grn py-2 px-4 font-bold pt-4 text-white shadow-xs focus:outline-none focus:ring-2 ">
       <a href="">{{__("LOG IN")  }}</a>
     </button>
   </div>
   <p class=" text-center text-dark-60">Don’t have and account?
     <a href="{{ route('register.create') }}" class="text-dark-100 font-bold">Sign up for free </a>
   </p>
 </form>
</div>


@endsection