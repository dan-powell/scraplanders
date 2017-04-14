<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Ui\MessageRepository;

class MessageController extends Controller
{

    private $repo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MessageRepository $repo)
    {
        $this->repo = $repo;
    }


    public function index()
    {
        return view('message.index.messageIndex')->with([
            'messages' => $this->repo->all()
        ]);
    }

    public function show($id)
    {
        return view('message.show.messageShow')->with([
            'message' => $this->repo->get($id)
        ]);
    }

}
