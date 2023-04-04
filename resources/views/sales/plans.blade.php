<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @include('sales/ajax')
    <title>プラン一覧</title>
</head>

<body>
    @include('sales/boot')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-light-300 text-light-300 leading-tight">
                {{ __('プラン作成') }}
            </h2>
        </x-slot>
        <div class="container mt-5">
            <table class="table table-striped">
                <tr>
                    <th>プラン名</th>
                    <th>説明</th>
                    <th>金額</th>
                    <th>操作</th>
                    <th>関連企業</th> <!-- 追加 -->
                </tr>
                @forelse ($plans as $plan)
                    <tr>
                        <td scope="row">{{ $plan->plan_name }}</td>
                        <td scope="row">{{ $plan->plan_description }}</td>
                        <td scope="row">{{ $plan->price }}</td>
                        <td>
                            <a href="{{ route('sales.edit_plan', $plan->id) }}" type="submit"
                                class="btn btn-online-warning btn-warning" role="button">編集</a>

                            <form action="{{ route('plans.destroy', $plan->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-danger"
                                    onclick="return confirm('本当に削除しますか？')">削除</button>
                            </form>
                        </td>
                        <td>
                            @foreach ($plan->companies as $company)
                                <p>{{ $company->company_name }}</p>
                            @endforeach
                        </td>
                    </tr>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">プランは現在未作成です。</td>
                    </tr>
                @endforelse
                <tr>
                    <td colspan="6" class="text-center">
                        <a href="{{ route('plans.create') }}" type="submit"
                            class="btn btn-outline-primary btn-primary">新規プラン作成</a>
                    </td>
            </table>

        </div>

        <div class="container mt-5">
            <table class="table table-striped">
                <tr>
                    <th class="table-active"></th>
                    <th>企業名</th>
                    <th>email</th>
                    <th>tel</th>
                    <th>業種</th>
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
                    </tr>
                @endforeach
            </table>
        </div>
</body>
</x-app-layout>
@include('sales/footer1')

</html>
