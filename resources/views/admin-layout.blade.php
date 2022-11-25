<form method="POST" action="{{ route('logout') }}"
    class="font-semibold text-blue-50 ml-6">
       @csrf
       <button type="submit">{{ __('logout') }}</button>
   </form>