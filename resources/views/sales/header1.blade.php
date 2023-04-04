<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップページ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="bg-gray-500" x-data="{ open: false }">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('img/new-logo.png') }}" class="w-auto h-12"></a>
                <div class="hidden lg:flex">
                    <ul class="flex space-x-6 items-center">
                        <li class="nav-item">
                            <a class="nav-link text-white font-semibold" href="/">ホーム</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white font-semibold" href="login">ログイン</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white font-semibold" href="register">新規登録</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white font-semibold"
                                href="{{ route('password.email') }}">※パスワードを忘れたとき</a>
                        </li>
                    </ul>
                </div>
                <!-- Hamburger -->
                <button class="navbar-toggler lg:hidden text-white" type="button" @click="open = !open">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="inline-flex"
                            d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
            <div class="lg:hidden" x-show="open" x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90">
                <ul class="py-3">
                    <li class="nav-item">
                        <a class="nav-link block text-white font-semibold" href="/">ホーム</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link block text-white font-semibold" href="login">ログイン</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link block text-white font-semibold" href="register">新規登録</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link block text-white font-semibold"
                            href="{{ route('password.email') }}">※パスワードを忘れたとき</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>
