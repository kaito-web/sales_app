<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @include('sales/ajax')
    <title>企業一覧</title>
</head>

<body>
    @include('sales/boot')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-light-300 text-light-300 leading-tight">
                {{ __('管理者用企業一覧') }}
            </h2>
        </x-slot>
        <div class="container mt-5">
            <table class="table table-striped">
                <tr>
                    <th class="table-active"></th>
                    <th>企業名</th>
                    <th>email</th>
                    <th>tel</th>
                    <th>業種</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach ($c_profiles as $c_profile)
                    <tr>
                        <td class="table-active">
                            <div>
                                <button class="like-btn" data-id="{{ $c_profile->id }}">★</button>
                            </div>
                        </td>
                        <td scope="row">{{ $c_profile->company_name }}</td>
                        <td scope="row">{{ $c_profile->contact_email }}</td>
                        <td scope="row">{{ $c_profile->phone_number }}</td>
                        <td scope="row">{{ $c_profile->industry }}</td>
                        <td scope="row"><a href="{{ route('company', [$c_profile->id]) }}" type="submit"
                                class="btn btn-outline-success btn-success">詳細</a></td>
                        <td scope="row"><a href="{{ route('company.edit', [$c_profile->id]) }}" type="submit"
                                class="btn btn-outline-warning btn-warning">編集</a></td>
                        <td scope="row">
                            <form action="{{ route('company_list.destroy', [$c_profile->id]) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-danger"
                                    onclick="return confirm('本当に削除しますか？')">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="8" class="text-center">
                        <div class="mb-3">
                            <a href="{{ route('company.create') }}" class="btn btn-primary">新規作成</a>
                        </div>
                    </td>
                </tr>
                <div class="container my-4">
                    <div class="d-flex justify-content-center">
                        {{ $c_profiles->links('pagination::custom') }}
                    </div>
                </div>
            </table>
            <div class="container my-4">
                <div class="d-flex justify-content-center">
                    {{ $c_profiles->links('pagination::custom') }}
                </div>
            </div>
        </div>
</body>
</x-app-layout>
@include('sales/footer1')

</html>
