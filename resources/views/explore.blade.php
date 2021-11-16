<x-app>
 <h1 class="font-bold text-4xl mb-6"> Explore Page </h1>
 <div>
     @foreach ($users as $user)
     <div class="flex p-4 rounded-xl border gray-400 mb-3 bg-blue-100">
        <a href="{{ $user->path() }}" class="flex-shrink-0">
         <img 
         src="{{"storage/". $user->avatar }}" 
         alt="{{ $user->username."'s avatar" }}"
         class="mr-4 w-20 h-20 rounded-full mr-2"
         >
        </a>
        
         <div>
            
            <h5 class="font-bold">{{ $user->name }}</h5>
            <a href="{{ $user->path() }}"><p class="text-sm text-gray-500 mb-1">{{"@".$user->username}}</p></a>
            <div class="text-sm" >
                @if ($user->latestTweet())
                <p class="text-sm">
                Tweeted: </p><p class="italic" style="
                -ms-word-break: break-all;
                word-break: break-all; ">{{$user->latestTweet()->body}}</p>
                <p class="text-sm text-gray-500">
                {{ $user->latestTweet()->created_at->diffForHumans() }}
                </p>
                @else
                No Tweets yet!
                @endif
                
            </div> 
            
        </div>
        <div class=" ml-auto float-right" style="order: 2;">
            <x-follow-btn :user="$user">
            </x-follow-btn> 
        </div>
     </div>
     
     @endforeach
 </div>
</x-app>