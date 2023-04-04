<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\PlanProfiles;
use Illuminate\Support\Facades\Auth;
use App\Models\CompanyProfile;

class PlansController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        $plans = PlanProfiles::all();

        $company_plan_ids = DB::table('company_plan')->pluck('company_id')->unique()->toArray();
        $c_profiles = CompanyProfile::whereIn('id', $company_plan_ids)->get();

        $likedCompanyIds = [];
        if (Auth::user() !== null) {
            $likedCompanyIds = Auth::user()->likes->pluck('company_id')->toArray();
        }

        return view('sales/plans', compact('plans', 'likedCompanyIds', 'c_profiles'));
    }
    // プランの編集
public function edit($id)
{
    $user_id = Auth::id();

    $c_profiles = CompanyProfile::all();
    // $c_profiles = CompanyProfile::orderBy('created_at', 'desc')->paginate(20);

    $likedCompanyIds = [];
    if (Auth::user() !== null) {
        $likedCompanyIds = Auth::user()->likes->pluck('company_id')->toArray();
    }

    $selectedCompanyIds = session('selectedCompanyIds', []);

    $plan = PlanProfiles::findOrFail($id);
    
    return view('sales/edit_plan', compact('plan', 'likedCompanyIds', 'id', 'c_profiles'));
}



// アップデートを行う
public function update(Request $request, $id)
{
    $plan = PlanProfiles::findOrFail($id);
    $plan->update($request->only(['plan_name', 'plan_description', 'price']));

    // 関連企業のデータを更新
    $company_ids = $request->input('company_id', []);
    $plan->company_profiles()->sync($company_ids);

    return redirect()->route('plans.index')->with('success', 'プランが更新されました。');
}

    // プランの削除を行い会社一覧から削除
    public function destroy($id)
    {
        $plan = PlanProfiles::findOrFail($id);

        $plan->companies()->detach();

        $plan->delete();

        return redirect()->route('plans.index')->with('success', 'プランが正常に削除されました');
    }
// プランの表示
    public function create()
    {
        $user_id = Auth::id();

        $plans = PlanProfiles::all();

        $plan_company_ids = $plans->pluck('company_id')->toArray();

        $c_profiles = CompanyProfile::all();
        // $c_profiles = CompanyProfile::orderBy('created_at', 'desc')->paginate(20);
        // $selectedCompanyIds = session('selectedCompanyIds', []);
       

        $likedCompanyIds = [];
        if (Auth::user() !== null) {
            $likedCompanyIds = Auth::user()->likes->pluck('company_id')->toArray();
        }

        return view('sales/PlanCreate', compact('plans', 'likedCompanyIds', 'c_profiles'));
    }

    // プランの登録
    public function store(Request $request)
    {
        try {
            $user_id = Auth::id();

            $validated = $request->validate([
                'plan_name' => 'required|max:255',
                'plan_description' => 'required',
                'price' => 'required|numeric|min:0|max:2147483647',
                'company_id' => 'required|array',
                'company_id.*' => 'integer',
            ]);


            $plan = new PlanProfiles();
            $plan->plan_name = $validated['plan_name'];
            $plan->plan_description = $validated['plan_description'];
            $plan->price = $validated['price'];
            $plan->user_id = $user_id;
            $plan->save();

            $plan->companies()->sync($validated['company_id']);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => '保存に失敗しました: ' . $e->getMessage()]);
        }


            return redirect()->route('plans.index')->with('success', 'プランが正常に作成されました');
    }
    // function paginationAjax(Request $request)
    // {
    //     if($request->ajax())
    //     {
    //         $c_profiles = CompanyProfile::paginate(20);

    //     }
    // }
    // public function ajax(Request $request){
    //     $request->session()->put('id',$request['selectedCompanyIds']);
    //     $id = $request->session()->get('id');

    //     return $id;
        
    // }

}
