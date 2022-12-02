@extends('admin-layout')
@section('slot')

<div class="w-1600px mx-auto">
    <div class="w-1600px mx-auto mt-10 border-b border-border">
        <h1 class="text-2xl font-extrabold">Worldwide Statistics</h1>
        <div class="flex mt-10 space-x-20 ">
            <a href="{{ route('worldwide') }}" >Worldwide</a>
            <a href="" class="font-extrabold border-b-2 border-black pb-3">By country</a>
        </div>
    </div>
    
    <div class="mt-9">
        <input type="text" name="search" placeholder="{{ __('Search by country') }}" class="pl-14 py-3 w-60 rounded-lg border-dark-20"> 
        <img src="{{ asset('images/search-icon.svg') }}" alt="Search icon" class="-mt-9 ml-6 w-5">
    </div>
    <div class="bg-white py-14 rounded-md w-full">
        <div class=" flex items-center justify-between pb-6">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal h-full">
                    <thead class="h-14">
                        <tr>
                            <x-dashboard.t-head name=Location/>
                            <x-dashboard.t-head name="New cases"/>
                            <x-dashboard.t-head name="Deaths"/>
                            <x-dashboard.t-head name=Recovered/>
                        </tr>
                    </thead>
                    <tbody class=" overflow-y-auto h-96">
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
