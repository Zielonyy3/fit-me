<?php

namespace App\Http\Livewire\Chats;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Musonza\Chat\Models\Conversation;

class Messages extends Component
{
    protected $listeners = ['conversationSelected', 'sentMessage', 'readConversation' => '$refresh'];
    public ?int $conversationId;
    public bool $isWholeConversationLoaded = false;
    public int $currentPage = 1;

    private Conversation $conversation;
    private LengthAwarePaginator $messages;

    public function conversationSelected(int $id)
    {
        $this->conversationId = $id;
        $this->currentPage = 1;
        $this->isWholeConversationLoaded = false;
    }

    public function sentMessage()
    {
        $this->emit('updatedMessages');
    }

    public function incrementPage()
    {
        $this->currentPage++;
    }

    public function reload()
    {
        $this->conversation = \Chat::conversations()->getById($this->conversationId);
        $this->messages = $this->conversation->getMessages(Auth::user(), [
            'page' => 1,
            'perPage' => 30 * $this->currentPage,
            'sorting' => 'desc',
            'pageName' => 'conversation'
        ]);
        if($this->messages->total() <= $this->messages->perPage()){
            $this->isWholeConversationLoaded = true;
        }
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
