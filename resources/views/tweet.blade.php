
<div class="flex p-4 border border-gray-300 rounded-xl mb-3 bg-blue-50">
    <div class="mr-2 flex-shrink-0 mt-2">
        <a href="{{$tweet->user->path() }}">
            <img 
            width="40"
            height="40"
            src="{{$tweet->user->getAvatar()}}" 
            alt="" 
            class="rounded-full mr-2">
        </a>
    </div>
    
    <div>
        <div>
        
    
        <a href="{{ $tweet->user->path() }}">
            <p class="font-bold">{{ $tweet->user->name }}</p> 
            
            <p class="text-sm text-gray-500 mb-2">{{"@".$tweet->user->username}}</p>
        </a>
        
        </div>
        <p class="text-lg mb-1" style="
        -ms-word-break: break-all;
        word-break: break-all;">
       {!! $tweet->bodyWithMentions() !!}
        </p>
        @if ($tweet->image != null)
        <div 
        class="max-w-sm mt-5 mb-1 flex items-center">
        <div class="imgGrey">
        <img
        src="{{ $tweet->getImage() }}" alt="" style="
        "
        class="rounded-2xl overflow-hidden">
        </div>
        </div>
        
        @endif
        

        <x-like-buttons :tweet="$tweet">
        </x-like-buttons>
       
        <p class=" text-sm text-gray-500 mt-3 mb-1"> {{ $tweet->created_at->diffForHumans() }} </p>
        
        
    </div>   
    
    <div class="ml-auto float-right">
        <x-trash :tweet='$tweet'>
        </x-trash>
    </div>
   
</div>