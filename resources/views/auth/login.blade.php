<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <div class="relative">
                <x-text-input id="password" class="block pr-10 mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

                <!-- Show Password Checkbox -->
                <div class="block mt-4">
                    <div class="inline-flex items-center justify-between w-full">
                        <!-- Remember Me Checkbox -->
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>

                        <!-- Show Password Checkbox -->
                        <div class="inline-flex items-center">
                            <input id="toggle-password" type="checkbox" class="form-checkbox h-5 w-5 dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" style="margin-left: 5px; width: 15px; height: 15px; border-radius: .25rem; border-color: rgb(55, 65, 81);" onclick="togglePassword()">
                            <label for="toggle-password" class="ml-2 text-sm" style="color: rgb(156, 163, 175)">&nbsp;&nbsp;Show Password</label>
                        </div>
                    </div>
                </div>

                <!-- JavaScript for toggling password visibility -->
                <script>
                    function togglePassword() {
                        var passwordField = document.getElementById("password");
                        if (passwordField.type === "password") {
                            passwordField.type = "text";
                        } else {
                            passwordField.type = "password";
                        }
                    }
                </script>
            </div>

            <!-- Forgot Password Link -->
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <!-- Sign Up Link -->
            <div class="flex items-center justify-center mt-4">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Don't have an account yet? 
                    <a href="{{ route('register') }}" class="font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300">
                        Sign up now
                    </a>
                </p>
            </div>

            <!-- Log In Button -->
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>
