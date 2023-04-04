<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>企業詳細</title>

    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>

<body>

    @include('sales/boot')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-light-300 text-light-300 leading-tight">
                {{ __('企業詳細') }}
            </h2>
        </x-slot>
        <div class="container text-center mt-5">
            <table class="table table-bordered border border-secondary">
                <tr>
                    <div class="container row mt-3">
                        <td> 企業名：</td>
                        <th>{{ $companyProfile->company_name }}</th>
                    </div>
                </tr>
                <tr>
                    <div class="container row mt-3">

                        <td>電話番号:</td>
                        <th><a href="tel:{{ $companyProfile->phone_number }}">{{ $companyProfile->phone_number }}</a>
                        </th>
                    </div>
                </tr>
                <tr>
                    <div class="container row mt-3">
                        <td>メール：</td>
                        <th><a
                                href="mailto:{{ $companyProfile->contact_email }}">{{ $companyProfile->contact_email }}</a>
                        </th>
                    </div>
                    </td>
                </tr>
                <tr>
                    <div class="container row mt-3">
                        <th>住所：</th>
                        <td>{{ $companyProfile->address }}</td>
                    </div>
                </tr>
                <tr>
                    <div class="container row ">
                        <th>URL:</th>
                        <td><a href="/{{ $companyProfile->company_url }}" target="_blank">
                                {{ $companyProfile->company_url }}</a></th>
                    </div>
                </tr>
            </table>
            <form method="POST" action="{{ route('user_note.store') }}">
                @csrf

                <table class=" table table-secondary">
                    <input type="hidden" name="company_id" value="{{ $companyProfile->id }}">
                    <div class="form-group mt-5">
                        <tr class="table-secondary">
                            <h2>ユーザーノート</h2>
                        </tr>
                        <tr class="table-secondary">
                            <textarea class="form-control border border-secondary" name="note" id="exampleFormControlTextarea1" rows="4"
                                cols="50" style="resize: none;"></textarea>
                        </tr>
                    </div>
                </table>
                <div class="container mt-5"></div>
                <button type="submit" class="btn btn-outline-success btn-success">保存</button>
            </form>

            <div class="container">
                <div class="container mt-5">
                    @if (isset($usersNotes))
                        <table class="table table-striped">
                            <tr>
                                <th>作成日時</th>
                                <th>ノート</th>
                            </tr>
                            @forelse($usersNotes as $note)
                                <tr>
                                    <td scope="row">{{ $note->created_at->format('Y/m/d H:i:s') }}</td>
                                    <td scope="row">{{ $note->note }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">ユーザーノートがありません。</td>
                                </tr>
                            @endforelse
                        </table>
                    @else
                        <p>ユーザーノートがありません。</p>
                    @endif
                </div>
            </div>
            <div class="container mt-5">
                <a href="{{ route('download-pdf', ['company_id' => $companyProfile->id]) }}" type="submit"
                    class="btn btn-outline-success btn-success">企業詳細をPDFでダウンロード</a>
            </div>
            <div class="container mt-5"></div>
            <div id="map"></div>

            <script>
                let address = @json($address);

                function initMap() {
                    const map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 12,
                        center: {
                            lat: 35.6585769,
                            lng: 139.7454506
                        } // 東京タワーの座標をデフォルトに設定
                    });

                    const geocoder = new google.maps.Geocoder();
                    geocodeAddress(geocoder, map, address);
                }

                function geocodeAddress(geocoder, resultsMap, address) {
                    geocoder.geocode({
                        'address': address
                    }, function(results, status) {
                        if (status === 'OK') {
                            resultsMap.setCenter(results[0].geometry.location);
                            new google.maps.Marker({
                                map: resultsMap,
                                position: results[0].geometry.location
                            });
                        } else {
                            console.error('Geocode was not successful for the following reason: ' + status);
                        }
                    });
                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBwIdK_hUEf3du0qlUHRAmXGR2XRMddZ4&callback=initMap"
                asyncdefer></script>
            <div class="container mt-5"></div>
    </x-app-layout>
    @include('sales/footer1')
</body>

</html>
