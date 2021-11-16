<div id="mini" class="minifriendslist" style="z-index: 3;" noselect>
<div class=" bg-blue-200 rounded-b-2xl p-4 border border-blue-400" >
    @if (auth()->check())
    <h3 class="text-blue-400 hover:text-blue-500 font-bold text-xl " >Following <br><br></h3> 
    
    @else
    <h3 class="font-bold text-xl ">Hello stranger</h3> 
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