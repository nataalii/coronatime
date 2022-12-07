@extends('login-layout')
@section('content')

<div class="mt-20">
  <h2 class=" text-2xl lg:text-3xl font-black tracking-tight text-gray-900">{{ __('text.welcome_to') }}</h2>
  <h3 class=" text-base lg:text-xl text-dark-60 mt-4">{{ __('text.required_info') }}</h3>
</div>
<div class="mt-8">
  <form  method="POST" action="{{ route('register.store', app()->getLocale()) }}" class="space-y-7 sm:w-340px lg:w-400px">
    @csrf
    <div class="space-y-1">
      <label for="username" class="block text-xs font-bold text-dark-100">{{ __('text.username') }}</label>
      <x-input name=username type=text placeholder="{{ __('text.username_placeholder') }}" err=username/>
      <x-success name=username/>
      <x-error name=username/> 
      
    </div>
    <div>
      <label for="email" class="block text-xs font-bold text-dark-100 ">{{ __('text.email') }}</label>
      <x-input name=email type=email placeholder="{{ __('text.email_placeholder') }}" err=email/>
      <x-success name=email/>
      <x-error name=email/>
    </div>

    <div class="space-y-1">
      <label for="password" class="block text-xs font-bold text-dark-100">{{ __('text.password') }}</label>
      <x-input name=password type=password placeholder="{{ __('text.password_placeholder') }}" err=password/>
      <x-success name=password/>
      <x-error name=password/>
    </div>

    <div class="space-y-1 mb-4">
      <label for="password_confirmation" class="block text-xs font-bold text-dark-100">{{ __('text.repeat_password') }}</label>
      <x-input name=password_confirmation type=password placeholder="{{ __('text.rpt_password_placeholder') }}" err=password />
      <x-success name=password/>
      <x-error name=password/>
    </div>

      <div>
        <button type="submit" class=" h-14 flex w-full justify-center rounded-md bg-grn py-2 px-4 font-bold pt-4 text-white shadow-xs focus:outline-none focus:ring-2 ">
          {{__("text.sign_up")  }}
        </button>
      </div>
      <p class=" text-center text-dark-60">{{ __('text.already_account') }}
        <a href="{{ route('login.create', app()->getLocale()) }}" class="text-dark-100 font-black">{{ __('text.login') }}</a>
      </p>


  </form>
</div>
@endsection
