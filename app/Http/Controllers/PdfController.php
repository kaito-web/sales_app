<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\SaleController;
use App\Models\CompanyProfile;
use App\Models\users_notes;
use Illuminate\Support\Facades\Auth;
use SnappyImage;
use PDF;

class PdfController extends Controller
{
    public function downloadPdf(PDF $pdf, $id)
    {
        // CompanyProfileモデルを使用して、データベースから会社プロフィールを取得します
        $companyProfile = CompanyProfile::findOrFail($id);

        $usersNotes = users_notes::where('company_id', $id)->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        // $addressにデータを渡す
        $address = $companyProfile->address;

        // Geocoding API のリクエストを作成
        $geocodingUrl = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($address) . "&key=AIzaSyCBwIdK_hUEf3du0qlUHRAmXGR2XRMddZ4&callback=initMap" . config('services.google-map.key');

        // リクエストを送信して結果を取得
        $geocodingResponse = json_decode(file_get_contents($geocodingUrl), true);

        // 緯度と経度を取得
        if (isset($geocodingResponse['results'][0])) {
            $latitude = $geocodingResponse['results'][0]['geometry']['location']['lat'];
            $longitude = $geocodingResponse['results'][0]['geometry']['location']['lng'];
        } else {
            // 東京タワーの緯度経度を使用
            $latitude = 35.6585800;
            $longitude = 139.7454330;
        }

        // Google Static Maps API のURLを生成
        $staticMapUrl = "https://maps.googleapis.com/maps/api/staticmap?center=" . $latitude . "," . $longitude . "&zoom=16&size=600x300&maptype=roadmap&markers=color:red%7C" . $latitude . "," . $longitude . "&key=AIzaSyCBwIdK_hUEf3du0qlUHRAmXGR2XRMddZ4&callback=initMap" . config('services.google-map.key');


        // $companyProfileをビューに渡すために$data配列に追加します
        $data = ['title' => 'PDFテスト', 'companyProfile' => $companyProfile, 'userNotes' => $usersNotes, 'staticMapUrl'=> $staticMapUrl];

        // PDFインスタンスを生成
        $pdf = PDF::loadView('pdf/company', $data);

        // ダンプして内容を確認

        return $pdf->download('text.pdf');
    }
    public function view()
    {
        return view('pdf/company');
    }
}
