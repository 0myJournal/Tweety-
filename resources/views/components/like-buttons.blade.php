<div class="flex items-center mt-2 mb-1">
    <div class=" ">
        <x-like :tweet="$tweet">
        </x-like>
    </div>
    <a href="#" class=" text-sm text-gray-500 hover:text-gray-700 mr-3">
        {{ $tweet->likes ?:0 }}
    </a>
    <div class="ml-2">
        <x-dislike :tweet="$tweet">
        </x-dislike>
    </div>
    <a href="#" class=" text-sm text-gray-500 hover:text-gray-700">
        {{ $tweet->dislikes ?:0 }}
    </a>
    
</div>