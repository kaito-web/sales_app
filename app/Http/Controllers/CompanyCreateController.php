<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Sales;
use App\Models\CompanyProfile;
use App\Models\Users;
use App\Models\Likes;
use App\Models\users_notes;

class CompanyCreateController extends Controller
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

        return view('admin.company_list', compact('c_profiles', 'likedCompanyIds'));
    }

    public function create()
    {
        return view('admin/company_create');
    }


    public function edit()
    {
        $companyProfile = CompanyProfile::find(request('id'));

        return view('admin.company_edit', compact('companyProfile'));
    }


    public function store(Request $request)
    {
        $request->validate([
                'company_name' =>'required|max:255',
                'contact_email' =>'required|email|max:255',
                'phone_number' =>'required|max:255',
                'industry' =>'required|max:255',
                'address' =>'required|max:255',
                'company_url' =>'required|url|max:255',
        ]);

        $companyProfile = new CompanyProfile();
        $companyProfile->company_name = $request->company_name;
        $companyProfile->contact_email = $request->contact_email;
        $companyProfile->phone_number = $request->phone_number;
        $companyProfile->industry = $request->industry;
        $companyProfile->address = $request->address;
        $companyProfile->company_url = $request->company_url;
        $companyProfile->save();

        return redirect('admin/company_list');
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'company_name' =>'required|max:255',
        //     'contact_email' =>'required|email|max:255',
        //     'phone_number' =>'required|max:255',
        //     'industry' =>'required|max:255',
        //     'address' =>'required|max:255',
        //     'company_url' =>'required|url|max:255',
        // ]);

        $companyProfile = CompanyProfile::findOrFail($id);
        $companyProfile->id = $request->id;
        $companyProfile->company_name = $request->company_name;
        $companyProfile->contact_email = $request->contact_email;
        $companyProfile->phone_number = $request->phone_number;
        $companyProfile->industry = $request->industry;
        $companyProfile->address = $request->address;
        $companyProfile->company_url = $request->company_url;
        $companyProfile->update();
       
        return redirect('admin/company_list');
    }

    // 削除
    public function destroy($id)
    {
        $company = CompanyProfile::findOrFail($id);
        $company->delete();
        return redirect()->route('admin.company_list')->with('success', 'プランが削除されました。');
    }
}
