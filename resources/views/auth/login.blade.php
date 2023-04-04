
@include('sales/header1')
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-5" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('パスワード')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded bg-gray-100 border-gray-300 border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 focus:ring-indigo-600 focus:ring-offset-white" name="remember">
                <span class="ml-2 text-sm text-gray-600 text-gray-400">{{ __(' ログインしたままにする') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 text-gray-400 hover:text-gray-900 hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 focus:ring-offset-white" href="{{ route('password.request') }}">
                    {{ __('パスワードをお忘れの方はコチラから') }}
                </a>
            @endif

            <button class="ml-3 text-white bg-blue-600 hover:bg-blue-700 focus:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none focus:ring-blue-800">
                {{ __('ログイン') }}
            </button>
        </div>
    </form>
</x-guest-layout>
@include('sales/footer1')

