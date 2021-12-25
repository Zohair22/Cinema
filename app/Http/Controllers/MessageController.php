<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request) : RedirectResponse
    {
        $attribute = $request->all();
        Message::create($attribute);
        return back()->with(['success' => 'Message Sent Successfully']);
    }
}
