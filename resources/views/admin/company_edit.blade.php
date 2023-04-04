<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>企業編集</title>
</head>

<body>
    @include('sales/boot')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-light-300 text-light-300 leading-tight">
                {{ __('企業編集') }}
            </h2>
        </x-slot>
        <div class="container mt-5">
            {{-- formで編集idも渡す --}}
            <form action="{{ route('company.update', ['id' => $companyProfile->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="company_name">企業名</label>
                    <input type="text" class="form-control" id="company_name" name="company_name"
                        value="{{ $companyProfile->company_name }}" required>
                </div>
                <div class="form-group">
                    <label for="company_url">URL</label>
                    <input type="text" class="form-control" id="company_url" name="company_url"
                        value="{{ $companyProfile->company_url }}" required>
                </div>
                <div class="form-group">
                    <label for="contact_email">メールアドレス</label>
                    <input type="text" class="form-control" id="contact_email" name="contact_email"
                        value="{{ $companyProfile->contact_email }}" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">電話番号</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                        value="{{ $companyProfile->phone_number }}" required>
                </div>
                <div class="form-group">
                    <label for="industry">業種</label>
                    <input type="text" class="form-control" id="industry" name="industry"
                        value="{{ $companyProfile->industry }}" required>
                </div>
                <div class="form-group">
                    <label for="address">住所</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required>{{ $companyProfile->address }}</textarea>
                </div>
                <div class="py-4"></div>
                <div class="text-center">
                    <button type="submit" class="btn btn-outline-success btn-success">更新</button>
                </div>
                <div class="py-4"></div>
            </form>

        </div>
    </x-app-layout>
    @include('sales/footer1')
</body>

</html>
