@extends('confirmation-layout')
@section('slot')

<div class=" mt-10 lg:mt-44">
    <div>
        <h2 class=" font-black text-xl lg:text-3xl tracking-tight text-gray-900">{{ __('text.reset_password') }}</h2>
     </div>
     <div>
     <form method="POST" action="{{ route('password.update', app()->getLocale()) }}" class=" space-y-10 w-340px lg:w-400px text-left">
       @csrf
       <input type="hidden" name="token" value="{{ $token }}">
       <div class="hidden">
          <label for="email" class="block text-xs font-bold text-dark-100">{{ __('text.email') }}</label>
          <div>
            <input id="email" name="email" type="email" value="{{ $email}}" />
          </div>
       </div>

       <div class="space-y-1">
            <label for="password" class="block text-xs font-bold text-dark-100">{{ __('text.new_password') }}</label>
            <x-input name=password type="password" placeholder="{{ __('text.new_password_placeholder') }}" err=password/>
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
            <button type="submit" class=" mt-72 mb-6 lg:mt-5 h-14 flex w-full justify-center rounded-md bg-grn py-2 px-4 font-bold pt-4 text-white shadow-xs focus:outline-none focus:ring-2 ">
              {{__("text.save_changes")  }}
            </button>
          </div>
      </form>  
</div>


@endsection