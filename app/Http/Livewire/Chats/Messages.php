<?php

namespace App\Http\Livewire\Chats;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Musonza\Chat\Models\Conversation;

class Messages extends Component
{
    protected $listeners = ['conversationSelected', 'sentMessage'];
    public int $conversationId;

    private Conversation $conversation;
    private LengthAwarePaginator $messages;

    public function conversationSelected(int $id)
    {
        $this->conversationId = $id;
    }
    public function sentMessage()
    {
        $this->emit('updatedMessages');
    }

    public function reload()
    {
        $this->conversation = \Chat::conversations()->getById($this->conversationId);
        $this->messages = $this->conversation->getMessages(Auth::user(), [
            'page' => 1,
            'perPage' => 30,
            'sorting' => 'desc',
            'pageName' => 'conversation'
        ]);
    }


    public function render()
    {
        $this->reload();
        return view('livewire.chats.messages', [
            'conversation' => $this->conversation,
            'messages' => $this->messages->reverse(),
        ]);
    }


}
