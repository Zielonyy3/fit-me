<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ChatController extends Controller
{

    public function index(Request $request): View
    {
        $directConversations= \Chat::conversations()
            ->setParticipant(Auth::user())
            ->isDirect()
            ->get()
            ->pluck('conversation');
        return view('admin.chats.index', [
            'directConversations' => $directConversations,
        ]);
    }

}
