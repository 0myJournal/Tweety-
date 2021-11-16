<x-master>

<div class=" flex justify-center mb-5">   
<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        
<div class="container mx-auto rounded-2xl py-4 px-10 bg-blue-400">
    <h1 class="text-4xl mb-3 text-white"> Register</h1>
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
                placeholder="Your name"
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
                placeholder="Your username"
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
            <label for="avatar" 
            class="text-white text-bold text-xl">
            {{ __('Avatar') }}</label>
        </div>
        <div class="bg-white border-gray-200 rounded-2xl flex p-2">
            
                <input id="avatar" 
                type="file" 
                name="avatar" 
                value=""
                onchange="getImage(this,'avatarImg')" 
                placeholder=""
                class="border-gray-200 rounded-2xl p-2" autofocus>

                @error('avatar')
                    <span class="text-red text-sm-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="flex-shrink-0">
                    <img 
                    width="40"
                    height="40"
                    src="storage/avatars/default.png" 
                    alt="" 
                    id="avatarImg"
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
                value="" 
                placeholder=""
                onchange="getImage(this,'bannerImg')"
                class="border-gray-200 rounded-2xl p-2" autofocus>

                @error('banner')
                    <span class="text-red text-sm-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="flex-shrink-0">
                    <img 
                    width="150"
                    height="150"
                    src="storage/banners/default.jpg" 
                    alt="default banner" 
                    id="bannerImg"
                    class="mr-2 rounded-lg">
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
                placeholder="Your email"
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
                <button type="submit" class="px-6 py-2 rounded-xl bg-blue-600 text-lg text-white">
                    Register
                </button>
                <p class="mb-5 mt-2">
                Already Have an account?
                </p>
                <a class="px-6 py-2 rounded-xl bg-blue-600 text-lg text-white" href="/login">
                    Log in
                </a>
            </div>
        </div>
    </div>
</div>
</x-master>
