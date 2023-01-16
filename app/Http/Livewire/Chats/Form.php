<?php

namespace App\Http\Livewire\Chats;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Form extends Component
{
    protected $listeners = ['conversationSelected'];
    public int $conversationId;
    public string $message;

    public function conversationSelected(int $id)
    {
        $this->conversationId = $id;
    }

    public function sendMessage()
    {
        $conversation = \Chat::conversations()->getById($this->conversationId);

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


}
