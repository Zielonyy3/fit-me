<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChatController extends Controller
{

    public function index(Request $request): View
    {
        return view('admin.chats.index');
    }

}
