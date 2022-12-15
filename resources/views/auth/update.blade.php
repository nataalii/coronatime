@extends('confirmation-layout')
@section('slot')

<img src="/images/icon-checked.svg" alt="" class="m-auto mt-64">
<h1 class=" w-340px text-lg text-dark-100" >{{ __('text.password_updated') }}</h1>
<div class=" flex lg:w-full mt-24">
    <button type="submit" class="fixed lg:static w-340px bottom-10 lg:mt-5 h-14 flex lg:w-full justify-center rounded-md bg-grn py-2 px-4 font-bold pt-4 text-white shadow-xs focus:outline-none focus:ring-2 ">
        <a href="{{ route('login.create', app()->getLocale()) }}">{{__("text.sign_in")  }}</a>
    </button>
</div> 


@endsection