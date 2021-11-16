<div class="">
    @forelse ($tweets as $tweet)
        @include('tweet')
    @empty
    <p class="p-4">No tweets yet</p>
    @endforelse 
    
    {{ $tweets->links() }}
</div>