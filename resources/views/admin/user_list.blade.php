<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>管理者用ユーザー一覧</title>
</head>

<body>
    @include('sales/boot')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-light-300 text-light-300 leading-tight">
                {{ __('管理者用ユーザー一覧') }}
            </h2>
        </x-slot>
        <div class="container mt-5">
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>氏名</th>
                    <th>email</th>
                    <th>管理者権限</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td scope="row">{{ $user->id }}</td>
                        <td scope="row">{{ $user->name }}</td>
                        <td scope="row">{{ $user->email }}</td>
                        <td scope="row">{{ $user->role }}</td>
                        <td scope="row"><a href="{{ route('user.edit', [$user->id]) }}" type="submit"
                                class="btn btn-outline-warning btn-warning">編集</a></td>
                        <td scope="row">
                            <form action="{{ route('user.destroy', [$user->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-danger"
                                    onclick="return confirm('本当に削除しますか？')">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="7" class="text-center">
                        <div class="mb-3">
                            <a href="{{ route('admin.user_create') }}" class="btn btn-primary">新規作成</a>
                        </div>
                    </td>
                </tr>
                <div class="container my-4">
                    <div class="d-flex justify-content-center">
                        {{ $users->links('pagination::custom') }}
                    </div>
                </div>
            </table>
            <div class="container my-4">
                <div class="d-flex justify-content-center">
                    {{ $users->links('pagination::custom') }}
                </div>
            </div>
        </div>
</body>
</x-app-layout>
@include('sales/footer1')

</html>
