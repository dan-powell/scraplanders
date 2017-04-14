<?php namespace App\Repositories\Ui;

use App\Models\Ui\Message;

class MessageRepository
{

    // Get all if owned by user
    public function all()
    {
        return auth()->user()->messages()->get();
    }

    // Get specific if owned by user
    public function get($id)
    {
        return Message::findOrFail($id);
    }

    // Get any, regardless of ownership
    public function getAny($id)
    {
        return Message::withoutGlobalScopes()->findOrFail($id);
    }

    public function allAny()
    {
        return Message::withoutGlobalScopes()->get();
    }

}
