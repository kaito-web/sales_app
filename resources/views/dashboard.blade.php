<x-app-layout>
    <script>
        function redirectTo(url) {
            window.location.href = url;
        }
    </script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black">
            {{ __('マイページ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    {{ __('ログインしています') }}
                </div>
                <section>
                    <div class="text-center">
                        <button onclick="redirectTo('{{ route('sale.open') }}')"
                            class="text-white bg-blue-600 hover:bg-blue-700 focus:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none focus:ring-blue-800">企業一覧</button>

                        <button onclick="redirectTo('{{ route('sale.like') }}')"
                            class="text-white bg-blue-600 hover:bg-blue-700 focus:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none focus:ring-blue-800">お気に入り</button>

                        <button onclick="redirectTo('{{ route('plans.index') }}')"
                            class="text-white bg-blue-600 hover:bg-blue-700 focus:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none focus:ring-blue-800">プラン登録</button>

                        @auth
                            @if (auth()->user()->role === 'admin')
                                {{-- roleカラムがadminのユーザだけ実行される処理 --}}
                                <button onclick="redirectTo('{{ route('admin.company_list') }}')"
                                    class="text-white bg-blue-600 hover:bg-blue-700 focus:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none focus:ring-blue-800">企業編集一覧</button>
                                <button onclick="redirectTo('{{ route('admin.user_list') }}')"
                                    class="text-white bg-blue-600 hover:bg-blue-700 focus:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none focus:ring-blue-800">ユーザ編集削除</button>
                            @endif
                        @endauth
                    </div>
                    <div class="text-center">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="text-white bg-blue-600 hover:bg-blue-700 focus:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none focus:ring-blue-800">ログアウト</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="py-12"></div>
    <div class="py-12"></div>
    <div class="py-12"></div>
    <div class="py-12"></div>
    @include('sales/footer1')
</x-app-layout>
