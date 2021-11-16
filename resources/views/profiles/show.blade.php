
<x-app>

<header class="mb-6">
    <div style="max-height:300px; max-height:1000px;">
    <img src="{{ $user->getBanner() }}"
    class="border-b 400 rounded-xl mb-3 " style="z-index: -1;width:1000px; max-height:300px;">
</div>
<div class="flex justify-between mb-6 items-center">
    <div>
       <h2 class="font-bold text-2xl mb-2 " style="max-width: 200px"> {{ $user->name }}</h2>
       <p class="text-sm text-gray-500">{{"@". $user->username }}</p>
       <p class="text-sm text-gray-800 italic">Joined: {{ $user->created_at->diffForHumans() }}</p>
    </div>

    @auth
    <div class="flex">
        @can('edit', $user)
            <a href="{{ $user->path('edit') }}" class="
                flex hover:bg-gray-300 bg-gray-100 rounded-full border border-gray-200 py-2 px-4 text-black text-xs">
            <x-edit-pencil>
            </x-edit-pencil>
            Edit Profile
            </a>
        @endcan
            <x-follow-btn :user="$user">
            </x-follow-btn>
    </div>
    @endauth
</div>
<p class="text-sm">
    {{ $user->bio }}
</p>

<img
    src="{{$user->getAvatar()}}" 
    alt="" 
    height="130"
    width="130"
    class="rounded-full absolute" style="z-index: 0; margin-top: -225px;left: calc(45%)">

</header>
<div class="mb-10">
@if ($notification =="follow")
<div class="">
    <x-notification-follow :user="$user" n="Followed">
    </x-notification-follow>

</div>
@else
@if($notification =="unfollow")
<div class="">
    <x-notification-follow :user="$user" n="Unfollowed">
    </x-notification-follow>
</div> 
@endif
@endif
</div>
    @include('timeline', ['tweets' => $tweets])
</x-app>