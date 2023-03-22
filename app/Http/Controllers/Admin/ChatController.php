<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ChatController extends Controller
{

    public function index(int $selectedId = null): View
    {
        $directConversations = \Chat::conversations()
            ->setParticipant(Auth::user())
            ->isDirect()
            ->get()
            ->pluck('conversation');
        $selectedConversationId = null;
        if($selectedId) {
            $selectedConversationId = $selectedId;
        }elseif($directConversations->count()) {
            $selectedConversationId =  $directConversations->first()->getKey();
        }
        return view('admin.chats.index', [
            'directConversations' => $directConversations,
            'conversationId' => $selectedConversationId,
        ]);
    }

    public function store(User $user)
    {
        $participants = [\Auth::user(), $user];
        $common = \Chat::conversations()->between($participants[0], $participants[1]);
        if (is_null($common) && \Auth::user()->getKey() !== $user) {
            \Chat::createConversation($participants)->makePrivate();
            $conversation = \Chat::createConversation($participants)->makeDirect();
            return redirect()->route('chats.index', $conversation->getKey());
        } elseif (!is_null($common)) {
            return redirect()->route('chats.index', $common->getKey());
        }
        return back()->with('error_message', __t('common.you_cannot_chat_with_yourself', 'You cannot chat with yourself'));

    }

}
