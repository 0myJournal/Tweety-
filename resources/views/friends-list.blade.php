<div class="friendslist">
<div class="bg-blue-200 rounded-2xl p-4 border border-blue-400">
@if (auth()->check())
<div class="flex fill-current text-blue-400 hover:text-blue-500">
<svg
class="mr-2 h-9 text "
viewBox="0 0 20 20">
<path d="M7 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0 1c2.15 0 4.2.4 6.1 1.09L12 16h-1.25L10 20H4l-.75-4H2L.9 10.09A17.93 17.93 0 0 1 7 9zm8.31.17c1.32.18 2.59.48 3.8.92L18 16h-1.25L16 20h-3.96l.37-2h1.25l1.65-8.83zM13 0a4 4 0 1 1-1.33 7.76 5.96 5.96 0 0 0 0-7.52C12.1.1 12.53 0 13 0z"/>
</svg>
<h3 class=" font-bold text-xl mb-4 border-b border-gray-400">Following <br><br></h3> 
</div>
@else
<h3 class="font-bold text-xl mb-4 border-b border-gray-400">Hello stranger</h3> 
@endif
<ul >
    @if (auth()->check())
    @forelse(auth()->user()->follows as $friend)
        
        <li class="{{ $loop->last ? '' : 'mb-4 border-b border-gray-400' }}">
            <div class="flex ">
            <div class="mr-2 flex-shrink-0">
                <a href="{{ route('profile', $friend) }}">
                <img src="{{ $friend->getAvatar() }}"
                width="40"
                height="40" 
                alt=""
                class="rounded-full mr-2">
                </a>
            </div>
            <div>
                <a href="{{ route('profile', $friend) }}">
                    <p class="font-bold">{{ $friend->name }}</p>
                    <p class="text-sm text-gray-500 mb-2"> {{"@". $friend->username }}</p>  
                </a>
                
            </div>
        </div>
        </li>
        
    @empty
        <li> No friends yet</li>
    @endforelse
    @else
    <a href="/register"><li>- Make a new account</li></a>
    <a href="/login"><li>- Log in</li></a>
    @endif
</ul>
</div>
</div>