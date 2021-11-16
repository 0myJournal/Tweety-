
@unless (auth()->user()->is($user))  
<form action="/profiles/{{ $user->username }}/follow" method="post">
    @csrf
    <button onclick="notifyFollow(this)" type="submit" class="hover:bg-blue-600 bg-blue-500 rounded-full shadow py-2 px-4 ml-2 text-white text-xs">
    {{ auth()->user()->isFollowing($user) ? 'Unfollow ' : 'Follow '}} 
    </button>
</form>
@endunless