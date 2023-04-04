<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 text-gray-400">
        {{ __('これはアプリケーションの安全な領域です。パスワードをご確認の上、お進みください。') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('パスワード')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('確認') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
