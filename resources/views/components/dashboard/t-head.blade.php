@props(['name'])

<th
    class="px-5 py-3 bg-border text-left text-dark-100 text-sm font-semibold tracking-wider relative">
    <div class="flex">
        {{ $name }}
        <div class="mt-1 ml-2">
            <img src="{{ asset('images/arrows/up.svg') }}" alt="arrow" >
            <img src="{{ asset('images/arrows/down.svg') }}" alt="arrow" class="mt-2px">
        </div>
       
    </div>

</th>