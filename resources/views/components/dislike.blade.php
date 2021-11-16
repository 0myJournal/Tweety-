@if(auth()->check())
<form action="/tweets/{{ $tweet->id }}/dislike" 
    method="POST">
        @csrf
        @method('DELETE')
<button type="submit">
<svg 
viewBox="0 0 20 20"  
    class="
          mr-2 w-4
          {{ $tweet->isDislikedBy(auth()->user()) ? 'fill-current text-red-500 hover:text-gray-500' 
          : 'fill-current text-gray-500 hover:text-red-500'  }}
          mr-2 w-4
    ">
<path d="M11 20a2 2 0 0 1-2-2v-6H2a2 2 0 0 1-2-2V8l2.3-6.12A3.11 3.11 0 0 1 5 0h8a2 2 0 0 1 2 2v8l-3 7v3h-1zm6-10V0h3v10h-3z"/></svg>
</button>
</form> 
@else
<svg 
viewBox="0 0 20 20"  
    class="
          mr-2 w-4
          {{ $tweet->isDislikedBy(auth()->user()) ? 'fill-current text-red-500 hover:text-gray-500' 
          : 'fill-current text-gray-500 hover:text-red-500'  }}
          mr-2 w-4
    ">
<path d="M11 20a2 2 0 0 1-2-2v-6H2a2 2 0 0 1-2-2V8l2.3-6.12A3.11 3.11 0 0 1 5 0h8a2 2 0 0 1 2 2v8l-3 7v3h-1zm6-10V0h3v10h-3z"/></svg>
@endif