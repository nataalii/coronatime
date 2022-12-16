@props(['name','column'])


<th
    class="px-1 lg:px-5 py-3 bg-border text-left text-dark-100 text-sm font-semibold tracking-wider relative">
    <div class="flex">
        
        @php
            $query = request()->query();
		    $query['sort'] = $column;
		    $query['language'] = app()->getLocale();
            $direction = $query['sort_direction'] ?? '';
            $query['sort_direction'] = $direction == 'desc' ? 'asc' : 'desc' ;
        @endphp

        <a href="{{ route("by-country",  $query) }}">{{ $name }}
        
        </a>
           <div class="mt-1 ml-2 w-3">
                <img src="{{ (request()->query('sort_direction') == 'asc' && request()->query('sort') == $column) ? asset('images/arrows/up-black.png') : asset('images/arrows/up.svg') }}" alt="arrow">
                <img src="{{  (request()->query('sort_direction') == 'desc'&& request()->query('sort') == $column) ? asset('images/arrows/down-black.svg') : asset('images/arrows/down.svg') }}" alt="arrow"class=" mt-2px">
           </div>
    </div>

</th>