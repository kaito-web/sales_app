<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @include('sales/ajax')
    <title>お気に入り一覧</title>
</head>

<body>
    @include('sales/boot')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-light-300 text-light-300 leading-tight">
                {{ __('お気に入り一覧') }}
            </h2>
        </x-slot>
        <div class="container mt-5">
            <table class="table table-striped">
                <tr>
                    <th class="table-active"></th>
                    <th>企業名</th>
                    <th class="d-none d-md-table-cell">email</th>
                    <th class="d-none d-md-table-cell">tel</th>
                    <th class="d-none d-md-table-cell">業種</th>
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
                        <td scope="row" class="d-none d-md-table-cell"><a
                                href="mailto:{{ $c_profile->contact_email }}">{{ $c_profile->contact_email }}</a></td>
                        <td scope="row" class="d-none d-md-table-cell"><a
                                href="tel:{{ $c_profile->phone_number }}">{{ $c_profile->phone_number }}</a></td>
                        <td scope="row" class="d-none d-md-table-cell">{{ $c_profile->industry }}</td>
                        <td scope="row"><a href="{{ route('company', [$c_profile->id]) }}" type="submit"
                                class="btn btn-outline-success btn-success">詳細</a></td>
                    </tr>
                @endforeach
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
