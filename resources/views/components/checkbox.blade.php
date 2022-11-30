<div>
    <input id="remember_me" type="checkbox" name="remember_me" class="w-5 h-5 rounded border-dark-20 checked:bg-system-success "> 
    <label for="remember_me" class="ml-2 text-sm font-medium text-dark-100">{{ __('text.remember') }}</label>
  </div>
  <span>
    <a href="{{ route('password.request') }}" class=" text-brand-primary text-sm font-bold">{{ __('text.forgot') }}</a>
</span>