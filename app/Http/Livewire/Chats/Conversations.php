<?php

namespace App\Http\Livewire\Chats;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Conversations extends Component
{
    protected $listeners = ['conversationSelected', 'readConversation' => '$refresh'];
    public ?int $conversationId;

    private Collection $directConversations;

    public function conversationSelected(int $id)
    {
        $this->conversationId = $id;
    }

    public function reload()
    {
        $this->directConversations = \Chat::conversations()->setParticipant(Auth::user())->isDirect()->get()->pluck('conversation');
        if (empty($this->conversationId) && $this->directConversations->count()) {
            $this->conversationId = $this->directConversations->first()->getKey();
            $this->emit('conversationSelected', $this->conversationId);
        }
    }


    public function render()
    {
        $this->reload();
        return view('livewire.chats.conversations', [
            'directConversations' => $this->directConversations,
        ]);
    }


}
