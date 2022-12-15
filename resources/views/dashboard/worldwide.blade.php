@extends('admin-layout')
@section('slot')
 
<div class="lg:w-1600px mx-auto">
   <div class="lg:w-1600px mx-auto mt-5 ml-3 lg:mt-10 border-b border-border">
       <h1 class="text-xl lg:text-2xl font-extrabold">{{ __('text.world_statistics') }}</h1>
       <div class="flex mt-6 lg:mt-10 space-x-20 ">
           <a href="" class="font-extrabold border-b-2 border-black pb-3">{{ __('text.worldwide') }}</a>
           <a href="{{ route('by-country', app()->getLocale()) }}">{{ __('text.by_country') }}</a>
       </div>
   </div>
   <div class="flex flex-wrap justify-between m-6 lg:mt-10 lg:mx-0">
       <div class="m-auto my-3 lg:m-0 w-350px lg:w-500px lg:h-72 h-48 bg-primary-card flex flex-col justify-center content-center rounded-xl ">
           <div class="m-auto text-center space-y-5">
               <img src="{{ asset('images/statistics/new.svg') }}" alt="new cases image" class=" m-auto">
               <p class="font-medium">{{ __('text.new_cases') }}</p>
               <h1 class=" font-extrabold text-2xl lg:text-5xl text-brand-primary">{{ number_format($worldwideData->sum('confirmed')) }}</h1>
           </div>
       </div>
       <div class=" w-40 lg:w-500px h-48 lg:h-72 bg-secondary-card flex flex-col justify-center content-center rounded-xl ">
           <div class="m-auto text-center space-y-5">
               <img src="{{ asset('images/statistics/recovered.svg') }}" alt="new cases image" class=" m-auto">
               <p class="font-medium text-sm lg:text-base">{{ __('text.recovered') }}</p>
               <h1 class=" font-extrabold text-2xl lg:text-5xl text-system-success">{{ number_format($worldwideData->sum('recovered')) }}</h1>
           </div>
       </div>
       <div class="w-40 lg:w-500px h-48 lg:h-72 bg-tertiary-card flex flex-col justify-center content-center rounded-xl ">
           <div class="m-auto text-center space-y-5">
               <img src="{{ asset('images/statistics/death.svg') }}" alt="new cases image" class=" m-auto">
               <p class="font-medium text-sm lg:text-base">{{ __('text.deaths') }}</p>
               <h1 class=" font-extrabold text-2xl lg:text-5xl text-brand-tertiary">{{ number_format($worldwideData->sum('deaths') )}}</h1>
           </div>
 
       </div>
   </div>
 
</div>
 
@endsection
