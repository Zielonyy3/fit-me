<?php

namespace App\Http\Livewire\Chats;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Musonza\Chat\Models\Conversation;

class Form extends Component
{
    protected $listeners = ['conversationSelected'];
    public ?int $conversationId;
    public string $message;

    public function conversationSelected(int $id)
    {
        $this->conversationId = $id;
    }

    public function markConversationAsRead()
    {
        $this->getConversation()->readAll(Auth::user());
        $this->emit('readConversation');
    }

    public function sendMessage()
    {
        $conversation = $this->getConversation();

        \Chat::message($this->message)
            ->from(Auth::user())
            ->to($conversation)
            ->send();
        $this->message = '';
        $this->emit('sentMessage');
    }


    public function render()
    {
        return view('livewire.chats.form');
    }

    private function getConversation(): Conversation
    {
        return \Chat::conversations()->getById($this->conversationId);

    }

}
