@extends('confirmation-layout')
@section('slot')

<img src="/images/icon-checked.svg" alt="" class="m-auto mt-64">
<h1 class="text-lg text-dark-100" >{{ __('text.confirm_account') }}</h1>
<div class=" flex w-full mt-24">
    <button type="submit" class=" h-14 flex w-96 m-auto justify-center content-center rounded-md bg-grn py-2 px-4 font-bold pt-4 text-white shadow-xs focus:outline-none focus:ring-2 ">
        <a href="{{ route('login.create') }}">{{__("text.signin")  }}</a>
    </button>
</div> 

@endsection