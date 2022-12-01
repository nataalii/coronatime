@extends('admin-layout')
@section('slot')

<div class="w-1600px mx-auto mt-10 border-b border-border">
    <h1 class="text-2xl font-extrabold">Worldwide Statistics</h1>
    <div class="flex mt-10 space-x-20 ">
        <a href="{{ route('worldwide') }}" >Worldwide</a>
        <a href="" class="font-extrabold border-b-2 border-black pb-3">By country</a>
    </div>

</div>
@endsection