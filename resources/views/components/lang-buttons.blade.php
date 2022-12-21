@props(['english', 'georgian'])
<script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>
<div x-data="{show: false}" @click.away="show =false" class="relative">
    <button @click="show = ! show" class="text-black focus:ring-4 focus:outline-none font-medium rounded-lg text-sm  text-center inline-flex items-center h-5" type="button">
        {{ app()->getLocale()=='en' ? __('text.english')  : __('text.georgian') }}
        <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
    </button>
   
    <div x-show="show" class="absolute z-10 w-332 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 " style="display: none">
        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
        <li>
            <a href="{{ $english }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('text.english') }}</a>
        </li>
        <li>
            <a href="{{ $georgian }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('text.georgian') }}</a>
        </li>
        </ul>
    </div>    
</div>
