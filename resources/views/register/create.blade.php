@extends('login-layout')
@section('content')

<div class="mt-20">
  <h2 class=" text-2xl lg:text-3xl font-black tracking-tight text-gray-900">{{ __('text.welcome_to') }}</h2>
  <h3 class=" text-base lg:text-xl text-dark-60 mt-4">{{ __('text.required_info') }}</h3>
</div>
<div class="mt-8">
  <form  method="POST" action="{{ route('register.store', app()->getLocale()) }}" class="space-y-7 sm:w-340px lg:w-400px">
    @csrf
    <div class="space-y-1" id='username-div'>
      <label for="username" class="block text-xs font-bold text-dark-100">{{ __('text.username') }}</label>
      <x-input name=username type=text placeholder="{{ __('text.username_placeholder') }}" err=username/>
      <div class="relative" id="username-success" style="visibility: hidden">
        <img src="/images/success.svg" alt="success" class=" absolute right-4 -mt-10">
      </div> 
      <x-success name=username/>
      <x-error name=username/> 

      
    </div>
    <div id="email-div">
      <label for="email" class="block text-xs font-bold text-dark-100 ">{{ __('text.email') }}</label>
      <x-input name=email type=email placeholder="{{ __('text.email_placeholder') }}" err=email/>
      <div class="relative" id="email-success" style="visibility: hidden">
        <img src="/images/success.svg" alt="success" class=" absolute right-4 -mt-10">
      </div> 
      <x-success name=email/>
      <x-error name=email/>
    </div>

    <div class="space-y-1" id="password-div">
      <label for="password" class="block text-xs font-bold text-dark-100">{{ __('text.password') }}</label>
      <x-input name=password type=password placeholder="{{ __('text.password_placeholder') }}" err=password/>
      <div class="relative" id="password-success" style="visibility: hidden">
        <img src="/images/success.svg" alt="success" class=" absolute right-4 -mt-10">
      </div> 
      <x-success name=password/>
      <x-error name=password/>
    </div>

    <div class="space-y-1 mb-4" id="password-confirmation-div">
      <label for="password_confirmation" class="block text-xs font-bold text-dark-100">{{ __('text.repeat_password') }}</label>
      <x-input name=password_confirmation type=password placeholder="{{ __('text.rpt_password_placeholder') }}" err=password />
      <div class="relative" id="password-confirmation-success" style="visibility: hidden">
        <img src="/images/success.svg" alt="success" class=" absolute right-4 -mt-10">
      </div> 
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

<script>
  let usernameInput = document.getElementById('username');
  let emailInput = document.getElementById('email');
  let passwordInput = document.getElementById('password');
  let passwordConfirmationInput = document.getElementById('password_confirmation');
  let regex = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/
  let usernameIcon = document.getElementById('username-success')
  let emailIcon = document.getElementById('email-success')
  let passwordIcon = document.getElementById('password-success')
  let passwordConfirmationIcon = document.getElementById('password-confirmation-success')


  function checkName(){
    if(usernameInput.value.length >= 3){
      usernameInput.style.borderColor = '#249E2C'
      usernameIcon.style.visibility = 'visible';
    } else {
      usernameInput.style.borderColor = '#E6E6E7'
      usernameIcon.style.visibility = 'hidden';
    }

    if(regex.test(emailInput.value)){
      emailInput.style.borderColor = '#249E2C'
      emailIcon.style.visibility = 'visible';

    } else {
      emailInput.style.borderColor = '#E6E6E7'
      emailIcon.style.visibility = 'hidden';

    }

    if(passwordInput.value.length >= 3){
      passwordInput.style.borderColor = '#249E2C'
      passwordIcon.style.visibility = 'visible';
    } else {
      passwordInput.style.borderColor = '#E6E6E7'
      passwordIcon.style.visibility = 'hidden';

    }

    if(passwordConfirmationInput.value.length >= 3 && passwordConfirmationInput.value == passwordInput.value){
      passwordConfirmationInput.style.borderColor = '#249E2C'
      passwordConfirmationIcon.style.visibility = 'visible';
    } else {
      passwordConfirmationInput.style.borderColor = '#E6E6E7'
      passwordConfirmationIcon.style.visibility = 'hidden';
    }
  }
</script>
@endsection
