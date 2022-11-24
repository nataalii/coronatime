@extends('login-layout')
@section('content')


<div class="-mt-20">
    <h2 class=" font-black text-3xl tracking-tight text-gray-900">{{ __('Welcome back') }}</h2>
    <h3 class="text-xl text-dark/60 mt-4">{{ __('Welcome back! Please enter your details') }}</h3>
 </div>
 <div>
 <form  method="POST" action="{{ route('register.store') }}" class="space-y-6 w-450px">
   @csrf
   <div class="space-y-1">
     <label for="username" class="block text-xs font-bold text-dark/100">{{ __('Username') }}</label>
     <div class="mt-1 relative">
       <input id="username" name="username" type="text" value="{{old('username') }} "placeholder="Enter unique Username"
        class="block w-full appearance-none rounded-md border px-3 h-14
        placeholder-gray-400 shadow-xs focus:border-brand/primary focus:outline-none focus:ring-brand/primary sm:text-sm focus:shadow-input
         {{  !$errors->any() ? " border-dark/20" : ($errors->has('username') ? "border-system/error" : "border-system/success") }}">

     </div>
     <x-success name=username/>
     <x-error name=username/> 
     
   </div>
   <div class="space-y-1">
     <label for="password" class="block text-xs font-bold text-dark/100">{{ __('Password') }}</label>
     <div class="mt-1">
       <input id="password" name="password" type="password" placeholder="Fill in password" 
       class="block w-full appearance-none rounded-md border px-3 h-14 placeholder-gray-400 
       shadow-xs focus:border-brand/primary focus:outline-none focus:ring-brand/primary sm:text-sm focus:shadow-input
       {{  !$errors->any() ? "border-dark/20" : ($errors->has('password') ? "border-system/error" : "border-system/success") }}">

     </div>
     <x-success name=password/>
     <x-error name=password/>
   </div>


   <div class="flex items-center justify-between mb-4">
      <div>
        <input id="default-checkbox" type="checkbox" name="remember_me" class="w-5 h-5 rounded border-dark/20 checked:bg-system/success "> 
        <label for="default-checkbox" class="ml-2 text-sm font-medium text-dark/100 dark:text-gray-300">Remember this device</label>
      </div>

      <span>
        <a href="" class=" text-brand/primary text-sm font-bold">Forgot password?</a>
      </span>
   </div>

   <div>
     <button type="submit" class=" mt-5 h-14 flex w-full justify-center rounded-md bg-grn py-2 px-4 font-bold pt-4 text-white shadow-xs focus:outline-none focus:ring-2 ">
       <a href="">{{__("LOG IN")  }}</a>
     </button>
   </div>
   <p class=" text-center text-dark/60">Don’t have and account?
     <a href="{{ route('register.create') }}" class="text-dark/100 font-bold">Sign up for free </a>
   </p>
 </form>
</div>


@endsection