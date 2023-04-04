<?php

namespace App\Http\Controllers;

use App\Models\users_notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserNoteController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_id' => 'required|integer',
            'note' => 'required|string',
        ]);

        $usersNote = new users_notes([
            'user_id' => Auth::id(),
            'company_id' => $request->input('company_id'),
            'note' => $request->input('note'),
        ]);

        $usersNote->save();

        // 保存後にリダイレクトするなど、適切な処理を行ってください。
        return redirect()->back();
    }

    public function index($company_id)
    {
        $usersNotes = users_notes::where('company_id', $company_id)
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user_notes.index', ['usersNotes' => $usersNotes]);
    }
}
