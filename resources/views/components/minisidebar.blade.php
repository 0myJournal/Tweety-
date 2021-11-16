<div id="minisidebar" class="minisidebar">
    <div class=" border border-blue-200 rounded-lg p-3 bg-blue-50">
    <ul>
        <li class="border-b border-gray-400 mb-1">
            <a href=/tweets class="font-bold text-lg mb-4  flex hover:text-blue-500 fill-current text-gray-500">
            <x-homeicon>
            </x-homeicon>
                Home
            </a>
        </li>
        <li class="border-b border-gray-400 mb-1">
            <a href="/explore" class="font-bold text-lg mb-4  flex hover:text-blue-500 fill-current text-gray-500">
                <x-exploreicon>
                </x-exploreicon>
                Explore
            </a>
        </li>
        @if(auth()->check())
        <li class="border-b border-gray-400 mb-1">
            <a href="/notifications" class="font-bold text-lg mb-4  flex hover:text-blue-500 fill-current text-gray-500">
                <x-notificationicon>
                </x-notificationicon>
                Notifications
            </a>
        </li>
        
        <li class="border-b border-gray-400 mb-1">
            <a href=" {{ route('profile', auth()->user() ) }}" class="font-bold text-lg mb-4  flex hover:text-blue-500 fill-current text-gray-500">
            <x-usericon>
            </x-usericon>
                Profile
            </a>
        </li>
    
        <li>
        <a class="font-bold text-lg mb-4  flex hover:text-blue-500 fill-current text-gray-500" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            <x-logout-icon>
            </x-logout-icon>
            {{ __('Logout') }}
        </a>
    
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </li>
        @endif
    </ul>
    </div>
</div>