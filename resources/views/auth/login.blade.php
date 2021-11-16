<x-master>
<div class=" flex justify-center mt-10">
    <div class="py-4 px-10 bg-blue-300 rounded-2xl">
        <div>
            <div>
                <div class="text-white font-bold text-xl mb-4">{{ __('Login') }}</div>

                <div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <label 
                            for="email"
                            class="text-white text-lg">{{ __('E-Mail Address') }}</label>

                            <div class="mt-1">
                                <input id="email" type="email" 
                                class="w-full border-gray-400 rounded-xl p-2" 
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password" class="text-white text-lg">{{ __('Password') }}</label>

                            <div class="mt-1">
                                <input id="password" type="password" 
                                class="w-full border-gray-400 rounded-xl p-2"  name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            
                        <div class="mt-2">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div>
                            <div class="mb-2">
                                <br>
                                <button type="submit" class=" mb-5 px-6 py-1 rounded bg-blue-600 text-sm text-white">
                                    {{ __('Login') }}
                                </button>
                                <br>

                                @if (Route::has('password.request'))
                                    <a class="px-6 py-1.5 rounded bg-blue-600 text-sm text-white" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <br>
                                <br>
                                    <a class="px-6 py-1.5 rounded bg-blue-600 text-sm text-white" href="/register">
                                        Make new account
                                    </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-master>