@component('components/master')

<div class="container mx-auto flex justify-center">
    <div class="row justify-content-center px-12 border border-grey-300 py-8 bg-gray-200 rounded-lg">
        <div class="col-md-8">

            <div class="font-bold text-lg mb-4">{{ __('Login') }}</div>


            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email address</label>
                    <input class="border border-gray-400 p-2 w-full" type="email" name="email" value="{{ old('email') }}" id="email" required />

                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">Password</label>
                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" value="{{ old('password') }}" id="password" required />

                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group row mb-6">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>


                <div>
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-2">Login</button>
                    
                    <a href="{{ route('password.request') }}" class="text-xs text-grey-400">{{ __('Forgot Your Password?') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endcomponent
