<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>ユーザ-作成</title>
</head>

<body>
    @include('sales/boot')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-light-300 text-light-300 leading-tight">
                {{ __('ユーザ-作成') }}
            </h2>
        </x-slot>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container mt-5">
            <form action="{{ route('user.store') }}" method="POST"　enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="user_id">ID</label>
                    <p></p>
                </div>
                <div class="form-group">
                    <label for="name">氏名</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="text" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">パスワード確認</label>
                    <input type="text" class="form-control" id="password_confirmation" name="password_confirmation"
                        required>
                </div>
                <div class="form-group">
                    <label for="role">権限</label>
                    <select class="form-control" name="role" id="role">
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
                <div class="py-4"></div>
                <div class="text-center">
                    <button type="submit" class="btn btn-outline-primary btn-primary">作成</button>
                </div>
                <div class="py-4"></div>
            </form>
        </div>
    </x-app-layout>
    @include('sales/footer1')
</body>

</html>
