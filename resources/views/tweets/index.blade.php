
<x-app>
    {{-- {{ dd(get_defined_vars()['__data']) }}: --}}
    @include('publish-tweet-panel')
    @if($notification!="")
    <x-notfication :n="$notification">
    </x-notfication>
    @endif
   @include('timeline')
</x-app>