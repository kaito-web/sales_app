<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 text-gray-400">
        {{ __('サインアップありがとうございます！登録する前に、私たちがメールで送信したリンクをクリックして、メールアドレスを確認してください。もしメールを受け取らなかった場合、喜んで別のメールをお送りします。') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 text-green-400">
            {{ __('登録時に入力されたEメールアドレスに新しい認証リンクが送信されました。') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('検証用メールの再送信') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 text-gray-400 hover:text-gray-900 hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 focus:ring-offset-gray-800">
                {{ __('ログアウト') }}
            </button>
        </form>
    </div>
</x-guest-layout>
