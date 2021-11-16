<x-app>
    <h1 class="font-bold text-4xl mb-6 ml-10"> Edit Profile</h1>
    <form action="{{ $user->path() }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        
<div class="container mx-auto rounded-2xl py-4 px-10 bg-blue-400">
    <div>
        <div>
            <label for="name" 
            class="text-white text-bold text-xl">
            {{ __('Name') }}</label>
        </div>
        <div>
                <input id="name" 
                type="text" 
                name="name" 
                value="{{ $user->name}}" 
                placeholder="{{ $user->name }}"
                class="w-full border-gray-200 rounded-2xl p-2" autofocus>

                @error('name')
                    <span class="text-red text-sm-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    <div>
        <div>
            <label for="username" 
            class="text-white text-bold text-xl">
            {{ __('Username') }}</label>
        </div>
        <div>
                <input id="username" 
                type="text" 
                name="username" 
                value="{{ $user->username}}" 
                placeholder="{{ $user->username }}"
                class="w-full border-gray-200 rounded-2xl p-2" autofocus>

                @error('username')
                    <span class="text-red text-sm-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    <div>
        <div>
            <label for="bio" 
            class="text-white text-bold text-xl">
            {{ __('Bio') }}</label>
        </div>
        <div>
                <textarea id="text" 
                name="bio" 
                class="w-full border-gray-200 rounded-2xl p-2">{{ $user->bio}}</textarea>
                @error('bio')
                    <span class="text-red text-sm-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    <div>
        <div>
            <label for="avatar" 
            class="text-white text-bold text-xl">
            {{ __('Avatar') }}</label>
        </div>
        <div class="bg-white border-gray-200 rounded-2xl flex p-2">
            
                <input id="avatar" 
                type="file" 
                name="avatar" 
                value="{{ $user->avatar}}" 
                placeholder="{{ $user->avatar }}"
                onchange="getImage(this,'avatarImg')"
                class="border-gray-200 rounded-2xl p-2" autofocus>

                @error('avatar')
                    <span class="text-red text-sm-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="flex-shrink-0">
                    <img 
                    id="avatarImg"
                    width="40"
                    height="40"
                    src="{{$user->getAvatar()}}" 
                    alt="" 
                    class="rounded-full mr-2">
                </div>

        </div>
    </div>
    <div>
        <div>
            <label for="banner" 
            class="text-white text-bold text-xl">
            {{ __('Banner') }}</label>
        </div>
        <div class="bg-white border-gray-200 rounded-2xl flex p-2">
            
                <input id="banner" 
                type="file" 
                name="banner" 
                value="{{ $user->banner}}" 
                placeholder="{{ $user->banner }}"
                onchange="getImage(this,'bannerImg')"
                class="border-gray-200 rounded-2xl p-2" autofocus>

                @error('banner')
                    <span class="text-red text-sm-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="flex-shrink-0">
                    <img 
                    id="bannerImg"
                    width="150"
                    height="150"
                    src="{{$user->getBanner()}}" 
                    alt="" 
                    class="rounded-lg">
                </div>

        </div>
    </div>
    <div>
        <div>
            <label for="email" 
            class="text-white text-bold text-xl">
            {{ __('Email') }}</label>
        </div>
        <div>
                <input id="email" 
                type="email" 
                name="email" 
                value="{{ $user->email}}" 
                placeholder="{{ $user->email }}"
                class="w-full border-gray-200 rounded-2xl p-2" autofocus>

                @error('email')
                    <span class="text-red text-sm-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    
    <div>
        <div>
            <label for="password" 
            class="text-white text-bold text-xl">
            {{ __('Password') }}</label>
        </div>
        <div>
                <input id="password" 
                type="password" 
                name="password" 
                class="w-full border-gray-200 rounded-2xl p-2" autofocus required>

                @error('password')
                    <span class="text-red text-sm-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    <div>
        <div>
            <label for="password_confirmation"
            class="text-white text-bold text-xl">
            {{ __('Confirm Password') }}</label>
        </div>
        <div>
                <input id="password_confirmation" 
                type="password" 
                name="password_confirmation" 
                class="w-full border-gray-200 rounded-2xl p-2" autofocus required>

                @error('confirmPassword')
                    <span class="text-red text-sm-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
        <div>
            <div class="col-md-6 offset-md-4 mt-5">
                <button type="submit" class="hover:bg-blue-700 px-6 py-2 mr-2 rounded bg-blue-600 text-lg text-white">
                    Edit Profile
                </button>
                <a href="{{ $user->path() }}" class="hover:underline text-white">Cancel</a>
            </div>
        </div>
    </div>
</x-app>