@if(auth()->check())
<form action="/tweets/{{ $tweet->id }}/like" 
    method="POST">
        @csrf
<button type="submit">
<svg viewBox="0 0 20 20"  
    class="
        {{ $tweet->isLikedBy(auth()->user()) ? 'fill-current text-blue-500 hover:text-gray-500' 
        : 'fill-current text-gray-500 hover:text-blue-500'  }}
        mr-2 w-4
    ">
    <path d="M11 0h1v3l3 7v8a2 2 0 0 1-2 2H5c-1.1 0-2.31-.84-2.7-1.88L0 12v-2a2 2 0 0 1 2-2h7V2a2 2 0 0 1 2-2zm6 10h3v10h-3V10z"/>
</svg> 
</button>
</form> 
@else
<svg viewBox="0 0 20 20"  
    class="
    'fill-current text-gray-500 hover:text-blue-500' 
        mr-2 w-4
    ">
    <path d="M11 0h1v3l3 7v8a2 2 0 0 1-2 2H5c-1.1 0-2.31-.84-2.7-1.88L0 12v-2a2 2 0 0 1 2-2h7V2a2 2 0 0 1 2-2zm6 10h3v10h-3V10z"/>
</svg>   
@endunless
