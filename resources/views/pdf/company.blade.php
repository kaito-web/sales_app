<!DOCTYPE html lang="ja">
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDF</title>
    <style>
        body {
            font-family: ipaexg;
        }
        #map {
        height: 400px;
        width: 100%;
    }
    </style>
</head>

<body>

    @include('sales/boot')
        <div class="container text-center">
            <h2 >企業詳細</h2>
        </div>
        
        <div class="container text-center">
        <img src="{{asset("img/a.jpg")}}" class="rounded" alt="Building a Sales Prospect List" width="100%" height="200px">
        </div>

    <table class="table table-bordered border border-secondary">
        <tr>
                <th>企業名：</th>
                <th>{{ $companyProfile->company_name }}</th>
        </tr>
        <tr>
                <th>電話番号:</th>
                <th><a href="tel:{{ $companyProfile->phone_number }}">{{ $companyProfile->phone_number }}</a></th>
        </tr>
        <tr>
                <th>メール：</th>
                <th><a href="mailto:{{ $companyProfile->contact_email }}">{{ $companyProfile->contact_email }}</a></th>
        </tr>
        <tr>
                <th>住所：</th>
                <th>{{ $companyProfile->address }}</th>
        </tr>
        <tr>
                <th>URL:</th>
                <th><a href="/{{ $companyProfile->company_url }}" target="_blank">{{ $companyProfile->company_url }}</a></th>
        </tr>
    </table>


    <div class="container text-center">
        <div class="container mt-5">
            @if (count($userNotes) > 0)
                <table class="table table-striped">
                    <tr>
                        <th>作成日時</th>
                        <th>ノート</th>
                    </tr>
                    @foreach ($userNotes as $note)
                        <tr>
                            <td scope="row">{{ $note->created_at->format('Y/m/d H:i:s') }}</td>
                            <td scope="row">{!! preg_replace("/|沈|切り|ガチャ|下劣|汚|うるさい|嫌|けんほろ|死|馬鹿|アホ|バカ|してくる|黙/",'XX',e($note->note)) !!}</td>
                        </tr>
                    @endforeach
                </table>
            @else
                <p>ユーザーノートがありません。</p>
            @endif
        </div>
    </div>
    <img src="{{ $staticMapUrl }}" alt="Company location map" width="100%" height="800">
    @include('sales/footer1')
</body>

</html>
