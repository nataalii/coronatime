@extends('admin-layout')
@section('slot')

<div class="w-1600px mx-auto">
    <div class=" mt-10 border-b border-border">
        <h1 class="text-2xl font-extrabold">Worldwide Statistics</h1>
        <div class="flex mt-10 space-x-20 ">
            <a href="" class="font-extrabold border-b-2 border-black pb-3">Worldwide</a>
            <a href="{{ route('by-country') }}">By country</a>
        </div>
    </div>
    
    <div class="flex justify-between mt-10">
        <div class=" w-500px h-72 bg-primary-card flex flex-col justify-center content-center rounded-xl ">
            <div class="m-auto text-center space-y-5">
                <img src="{{ asset('images/statistics/new.svg') }}" alt="new cases image" class=" m-auto">
                <p class="font-medium">New cases</p>
                <h1 class=" font-extrabold text-5xl text-brand-primary">{{ number_format($worldwideData->sum('confirmed')) }}</h1>
            </div>
        </div>
        <div class=" w-500px h-72 bg-secondary-card flex flex-col justify-center content-center rounded-xl ">
            <div class="m-auto text-center space-y-5">
                <img src="{{ asset('images/statistics/recovered.svg') }}" alt="new cases image" class=" m-auto">
                <p class="font-medium">Recovered</p>
                <h1 class=" font-extrabold text-5xl text-system-success">{{ number_format($worldwideData->sum('recovered')) }}</h1>
            </div>
        </div>
        <div class=" w-500px h-72 bg-tertiary-card flex flex-col justify-center content-center rounded-xl ">
            <div class="m-auto text-center space-y-5">
                <img src="{{ asset('images/statistics/death.svg') }}" alt="new cases image" class=" m-auto">
                <p class="font-medium">Death</p>
                <h1 class=" font-extrabold text-5xl text-brand-tertiary">{{ number_format($worldwideData->sum('deaths') )}}</h1>
            </div>

        </div>
    </div>

    <div class="bg-gradient-to-tl from-gradient-third via-gradient-second to-gradient-first w-full h-64 mt-20 rounded-lg">
        <div class="flex flex-col justify-center content-center text-center space-y-5 p-10">
            <h2 class="font-black text-2xl">Get notified first</h2>
            <h3>Get personalised notifications via email</h3>
            <div class=" m-auto relative">
                <img src="{{ asset('images/search-icon.svg') }}" alt="search icon" class="absolute top-6 left-6">
                <input type="text" placeholder="Enter your email" class=" w-450px border-none rounded-full p-5 pl-16  ">
                <button class="border-none bg-grn p-3 rounded-full text-white w-28 font-black absolute top-2 right-3">{{ __('SEND') }}</button>
            </div>
        </div>


    </div>
</div>

@endsection