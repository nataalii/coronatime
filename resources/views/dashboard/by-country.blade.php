@extends('admin-layout')
@section('slot')

<div class="lg:w-1600px mx-auto">
    <div class="lg:w-1600px mx-auto mt-5 ml-3 lg:mt-10 border-b border-border">
        <h1 class="text-xl lg:text-2xl font-extrabold">{{ __('text.world_statistics') }}</h1>
        <div class="flex mt-6 lg:mt-10 space-x-20 ">
            <a href="{{ route('worldwide', app()->getLocale()) }}" >{{ __('text.worldwide') }}</a>
            <a href="" class="font-extrabold border-b-2 border-black pb-3">{{ __('text.by_country') }}</a>
        </div>
    </div>
    
    <form class="mt-4 lg:mt-9 -ml-4 lg:ml-0"  action="{{ url(app()->getLocale().'/statistics/by-country') }}">
        <input type="text" name="query" value="{{ request('query') }}" placeholder="{{ __('text.search') }}" class=" pl-14 py-3 w-60 rounded-lg lg:border-dark-20 border-transparent"> 
        <img src="{{ asset('images/search-icon.svg') }}" alt="Search icon" class="-mt-9 ml-6 w-5">
    </form>
    <div class="bg-white py-5 lg:py-10 rounded-md w-full">
        <div class=" flex items-center justify-between pb-6">
            <div class="inline-block min-w-full shadow rounded-lg overflow-y-scroll max-h-550px">
                <table class="min-w-full ">
                    <thead class="h-14">
                        <tr class="sticky top-0 ">
                            <x-dashboard.t-head column="name->{{ app()->getLocale() }}" name="{{ __('text.location') }}"/>
                            <x-dashboard.t-head column="confirmed" name="{{ __('text.new_cases') }}"/>
                            <x-dashboard.t-head column="deaths" name="{{ __('text.deaths') }}"/>
                            <x-dashboard.t-head column="recovered" name="{{ __('text.recovered') }}"/>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <x-dashboard.t-body name="{{ __('text.worldwide') }}" />
                            <x-dashboard.t-body name="{{ $countries->sum('confirmed') }}" />
                            <x-dashboard.t-body name="{{ $countries->sum('deaths') }}" />
                            <x-dashboard.t-body name="{{ $countries->sum('recovered') }}" />
                        </tr>
                        @foreach ($countries as $country )
                        <tr>
                            <x-dashboard.t-body name="{{ json_decode($country->name, true)[app()->getLocale()] }}"/>
                            <x-dashboard.t-body name="{{ $country->confirmed }}"/>
                            <x-dashboard.t-body name="{{ $country->deaths }}"/>
                            <x-dashboard.t-body name="{{ $country->recovered }}"/>
                        </tr>	                                
                        @endforeach				
                    </tbody>
                </table>
                        
            </div>
        </div>
    </div>

</div>

@endsection
