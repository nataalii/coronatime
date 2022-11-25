@extends('login-layout')
@section('content')

<div class="mt-9">
  <h2 class="text-3xl font-black tracking-tight text-gray-900">{{ __('Welcome to Coronatime') }}</h2>
  <h3 class="text-xl text-dark/60 mt-4">{{ __('Please enter required info to sign up') }}</h3>
</div>
<div class="mt-8">
  <form  method="POST" action="{{ route('register.store') }}" class="space-y-7 w-450px">
    @csrf
    <div class="space-y-1">
      <label for="username" class="block text-xs font-bold text-dark/100">{{ __('Username') }}</label>
      <div class="mt-1 relative">
        <input id="username" name="username" type="username"  value="{{ old('username') }}" placeholder="Enter unique username" 
        class="block w-full appearance-none rounded-md border px-3 h-14
        placeholder-gray-400 shadow-xs focus:border-brand/primary focus:outline-none focus:ring-brand/primary focus:ring-0 sm:text-sm focus:shadow-input
         {{  !$errors->any() ? " border-dark/20" : ($errors->has('username') ? "border-system/error" : "border-system/success") }}">
      </div>
      <x-success name=username/>
      <x-error name=username/> 
      
    </div>
    <div>
      <label for="email" class="block text-xs font-bold text-dark/100 ">{{ __('Email') }}</label>
      <div class="mt-1">
        <input id="email" name="email" type="email"  value="{{ old('email') }}" placeholder="Enter your email" 
         class="block w-full appearance-none rounded-md border px-3 h-14
         placeholder-gray-400 shadow-xs focus:border-brand/primary focus:outline-none focus:ring-brand/primary focus:ring-0 sm:text-sm focus:shadow-input
          {{  !$errors->any() ? " border-dark/20" : ($errors->has('email') ? "border-system/error" : "border-system/success") }}">

      </div>
      <x-success name=email/>
      <x-error name=email/>
    </div>

    <div class="space-y-1">
      <label for="password" class="block text-xs font-bold text-dark/100">{{ __('Password') }}</label>
      <div class="mt-1">
        <input id="password" name="password" type="password" placeholder="Fill in password" 
        class="block w-full appearance-none rounded-md border px-3 h-14 placeholder-gray-400 
        shadow-xs focus:border-brand/primary focus:outline-none focus:ring-brand/primary focus:ring-0 sm:text-sm focus:shadow-input
        {{  !$errors->any() ? " border-dark/20" : ($errors->has('password') ? "border-system/error" : "border-system/success") }}">

      </div>
      <x-success name=password/>
      <x-error name=password/>
    </div>

    <div class="space-y-1 mb-4">
      <label for="password_confirmation" class="block text-xs font-bold text-dark/100">{{ __('Repeat password') }}</label>
      <div class="mt-1">
        <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Repeat password"
         class="block w-full appearance-none rounded-md border px-3 h-14 placeholder-gray-400 
         shadow-xs focus:border-brand/primary focus:outline-none focus:ring-brand/primary focus:ring-0 sm:text-sm focus:shadow-input
         {{  !$errors->any() ? " border-dark/20" : ($errors->has('password') ? "border-system/error" : "border-system/success") }}">

      </div>
      <x-success name=password/>
      <x-error name=password/>
    </div>

      <div>
        <button type="submit" class=" h-14 flex w-full justify-center rounded-md bg-grn py-2 px-4 font-bold pt-4 text-white shadow-xs focus:outline-none focus:ring-2 ">
          <a>{{__("SIGN UP")  }}</a>
        </button>
      </div>
      <p class=" text-center text-dark/60">Already have an account? 
        <a href="{{ route('login.create') }}" class="text-dark/100 font-black">Log in</a>
      </p>


  </form>
</div>
@endsection
