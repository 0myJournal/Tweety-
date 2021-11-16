<x-app>
    <div class="bg-blue-200 rounded p-4">
    <div class="flex">
    <h1 class=" text-3xl font-bold mb-2"> New Followers </h1> 
    </div>
    @foreach ($notifications as $notification)
    @if ($notification->type == "App\Notifications\FollowRecieved" && $notification->read_at != "")
    <?php
    
    $user = App\Models\User::find($notification->data['userFollowed']['id'])
    ?>
       <div class="flex p-4 rounded-xl border gray-400 mb-3 bg-blue-100">
        <a href="{{ $user->path() }}" class="flex-shrink-0">
         <img 
         src="{{"/storage/". $user->avatar }}" 
         alt="{{ $user->username."'s avatar" }}"
         class="mr-4 w-20 h-20 rounded-full "
         >
        </a>
        
         <div>
            
            <h5 class="">{{ $user->name }} started following you!</h5>
            <a href="{{ $user->path() }}"><p class="text-sm text-gray-500 mb-1">{{"@".$user->username}}</p></a>
            {{ $notification->created_at->diffForHumans() }}
        </div>
        <div class=" ml-auto float-right" style="order: 2;">
            <x-follow-btn :user="$user">
            </x-follow-btn> 
        </div>
     </div>
    @endif
    @endforeach

    <h1 class=" text-3xl font-bold mb-2"> New Likes </h1> 
    @forelse ($notifications as $notification)
    @if ($notification->type == "App\Notifications\LikeRecieved" && $notification->read_at != "")
    <?php
    $user = App\Models\User::find($notification->data['liker']['id'])
    ?>
           <div class="flex p-4 rounded-xl border gray-400 mb-3 bg-blue-100">
            <a href="{{ $user->path() }}" class="flex-shrink-0">
             <img 
             src="{{"/storage/". $user->avatar }}" 
             alt="{{ $user->username."'s avatar" }}"
             class="mr-4 w-20 h-20 rounded-full "
             >
            </a>
            
             <div>
                <?php $tweet = App\Models\Tweet::find($notification->data['tweet']['id']); ?>
                <h5 class="">{{ $user->name }} liked <a class="underline" href="/tweets/{{ $tweet->id }}">your tweet!</a></h5>
                <a href="{{ $user->path() }}"><p class="text-sm text-gray-500 mb-1">{{"@".$user->username}}</p></a>
                {{ $notification->created_at->diffForHumans() }}
            </div>
            <div class=" ml-auto float-right" style="order: 2;">
                <x-follow-btn :user="$user">
                </x-follow-btn> 
            </div>
         </div>
    @endif
    @empty
    @endforelse

    <h1 class=" text-3xl font-bold mb-2"> New Mentions </h1> 
    @forelse ($notifications as $notification)
    @if ($notification->type == "App\Notifications\Mention")
        <?php
    $user = App\Models\User::find($notification->data['mentioner']['id'])
    ?>
           <div class="flex p-4 rounded-xl border gray-400 mb-3 bg-blue-100">
            <a href="{{ $user->path() }}" class="flex-shrink-0">
             <img 
             src="{{"/storage/". $user->avatar }}" 
             alt="{{ $user->username."'s avatar" }}"
             class="mr-4 w-20 h-20 rounded-full "
             >
            </a>
            
             <div>
                <?php $tweet = App\Models\Tweet::find($notification->data['tweet']['id']); ?>
                <h5 class="">{{ $user->name }} mentioned you in <a class="underline" href="/tweets/{{ $tweet->id }}">a tweet!</a> </h5>
                <a href="{{ $user->path() }}"><p class="text-sm text-gray-500 mb-1">{{"@".$user->username}}</p></a>
                {{ $notification->created_at->diffForHumans() }}
            </div>
            <div class=" ml-auto float-right" style="order: 2;">
                <x-follow-btn :user="$user">
                </x-follow-btn> 
            </div>
         </div>
    @endif
    @empty
    @endforelse
    </div>
</x-app>