<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>プラン作成</title>
</head>

<body>
    @include('sales/boot')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-light-300 text-light-300 leading-tight">
                {{ __('プラン作成') }}
            </h2>
        </x-slot>
        <div class="container">
            <form action="{{ route('plans.store') }}" method="POST">
                @csrf
                <table class="table">
                    <div class="form-group">
                        <tr>
                            <th>
                                <label for="plan_name">プラン名</label>
                            </th>
                            <td>
                                <input type="text" class="form-control" id="plan_name" name="plan_name" required>
                            </td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <th>
                                <label for="plan_description">説明</label>
                            </th>
                            <td>
                                <textarea class="form-control" id="plan_description" name="plan_description" rows="3" required></textarea>
                            </td>
                        </tr>
                    </div>
                    <div class="py-12"></div>
                    <div class="form-group">
                        </tr>
                        <th>
                            <label for="price">金額</label>
                        </th>
                        <td>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </td>
                        </tr>
                    </div>
                    <div class="py-4"></div>
        </div>
        </table>
        <div class="container text-center">
            <label>企業</label>
        </div>
        <div class="container-sm">
            <div class="form-group">
                <div class="company-container" id="c_company_table">
                    @foreach ($c_profiles as $company_profile)
                        <div class="form-check fc" id="{{ $company_profile->id }}">
                            <input type="checkbox" class="form-check-input" name="company_id[]"
                                value="{{ $company_profile->id }}" id="company_{{ $company_profile->id }}">
                            <label class="form-check-label"
                                for="company_{{ $company_profile->id }}">{{ $company_profile->company_name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="container my-4">
                    {{-- <div class="d-flex justify-content-center">
                        {{ $c_profiles->links('pagination::custom') }}
                    </div> --}}
                </div>
                <div class="py-4"></div>
                <div class="text-center">
                    <button type="submit" class="btn btn-outline-primary btn-primary">作成</button>
                </div>
                </form>
                <div class="py-4"></div>
    </x-app-layout>
    @include('sales/footer1')
    @include('d_js')
</body>

</html>
