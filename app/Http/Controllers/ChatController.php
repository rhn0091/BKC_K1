<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function show(User $konselor)
    {
        $messages = Message::where(function ($query) use ($konselor) {
            $query->where('user_id', auth()->id())
                  ->where('konselor_id', $konselor->id);
        })->orWhere(function ($query) use ($konselor) {
            $query->where('user_id', $konselor->id)
                  ->where('konselor_id', auth()->id());
        })->orderBy('created_at')->get();

        return view('chat', compact('konselor', 'messages'));
    }

    public function store(Request $request, User $konselor)
    {
        $request->validate([
            'message' => 'required',
        ]);

        Message::create([
            'user_id' => auth()->id(),
            'konselor_id' => $konselor->id,
            'message' => $request->message,
        ]);

        return redirect()->route('chat', $konselor->id);
    }
}
