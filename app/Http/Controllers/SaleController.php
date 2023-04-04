<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\CompanyProfile;
use App\Models\Users;
use App\Models\Likes;
use App\Models\users_notes;
use App\Models\PlanProfiles;
use Illuminate\Pagination\Paginator;

class SaleController extends Controller
{
    public function open()
    {
        $c_profiles = CompanyProfile::leftJoin('likes', 'company_profiles.id', '=', 'likes.company_id')
                                     ->select('company_profiles.id', 'company_profiles.company_name', 'company_profiles.contact_email', 'company_profiles.phone_number', 'company_profiles.industry', DB::raw('COUNT(likes.id) as likes_count'))
                                     ->groupBy('company_profiles.id', 'company_profiles.company_name', 'company_profiles.contact_email', 'company_profiles.phone_number', 'company_profiles.industry')
                                     ->get();                             
        $c_profiles = CompanyProfile ::orderBy('created_at', 'desc')->paginate(20);

        $likedCompanyIds = [];
        if (Auth::user() !== null) {
            $likedCompanyIds = Auth::user()->likes->pluck('company_id')->toArray();
        }

       

        return view('sales/open', compact('c_profiles', 'likedCompanyIds'));
    }



    public function like(Request $request)
    {
        $likes = Likes::firstOrCreate([
            'user_id' => Auth::id(),
            'company_id' => $request->company_id,
        ]);

        // いいねの数を取得
        $likes_count = Likes::where('company_id', $request->company_id)->count();

        // JSONレスポンスを返す
        return response()->json(['likes_count' => $likes_count]);
    }
    public function dislike(Request $request)
    {
        Likes::where([
            'user_id' => Auth::id(),
            'company_id' => $request->company_id,
        ])->delete();

        // いいねの数を取得
        $likes_count = Likes::where('company_id', $request->company_id)->count();

        // JSONレスポンスを返す
        return response()->json(['likes_count' => $likes_count]);
    }


public function favorite()
{
    $likedCompanyIds = [];
    if (Auth::user() !== null) {
        $likedCompanyIds = Auth::user()->likes->pluck('company_id')->toArray();
    }

    $c_profiles = CompanyProfile::leftJoin('likes', 'company_profiles.id', '=', 'likes.company_id')
                                 ->whereIn('company_profiles.id', $likedCompanyIds)
                                 ->select('company_profiles.id', 'company_profiles.company_name', 'company_profiles.contact_email', 'company_profiles.phone_number', 'company_profiles.industry', DB::raw('COUNT(likes.id) as likes_count'))
                                 ->groupBy('company_profiles.id', 'company_profiles.company_name', 'company_profiles.contact_email', 'company_profiles.phone_number', 'company_profiles.industry')
                                 ->get();
    
    $c_profiles = CompanyProfile ::orderBy('created_at', 'desc')->paginate(20);

    return view('sales/like', compact('c_profiles', 'likedCompanyIds'));
}

public function show($id)
{
    $companyProfile = CompanyProfile::findOrFail($id);
    $userNote = users_notes::where('company_id', $id)->first() ?? new users_notes(['note' => '記載はありません']);
    
    $usersNotes = users_notes::where('company_id', $id)->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

    $address = $companyProfile->address;
    
    return view('sales/company', compact('companyProfile', 'userNote', 'usersNotes','address'));
}




}