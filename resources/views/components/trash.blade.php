@if (auth()->check())
    
    @if (curr_user()->is($tweet->user))
    <form action="/tweets/{{ $tweet->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">
        <svg viewBox="0 0 20 20"
        class="
        fill-current text-gray-500 hover:text-red-500
            mr-2 w-4
        ">
            <path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"/>
        </svg>
        </button>
    </form>
    @endif
    
@endif

