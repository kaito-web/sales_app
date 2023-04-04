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
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;




class UserCreateController extends Controller
{
    public function open()
    {
        $users = User::all();
        $users = User::orderBy('created_at', 'desc')->paginate(20);

        return view('admin/user_list', compact('users'));
    }

    public function create()
    {
        return view('admin/user_create');
    }

    // USER VIEW
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed'],
            'role' => ['required', 'in:user,admin'], // ロール
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=> $request->role,
        ]);

        return redirect()->route('admin.user_list');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.user_list')->with('success', 'ユーザーが正常に作成されました');
    }

    // 編集のview
    public function edit()
    {
        $user = User::find(request('id'));

        return view('admin/user_edit', compact('user'));
    }

    // 編集のアップデート
    public function update(Request $request, User $user, $id)
{
    $targetUser = User::findOrFail($id);

    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($targetUser->id)],
        'role' => ['required', 'in:user,admin'],
    ]);

    $targetUser->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'role' => $request->input('role'),
    ]);

    return redirect()->route('admin.user_list')->with('success', 'ユーザーが正常に更新されました');
}

}
