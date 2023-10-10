<?php

declare(strict_types=1);

namespace App\Http\Controllers;


use App\Http\Controllers\Controller as ControllersController;
use App\Models\Message;
use DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageController extends ControllersController
{
    public static function index()
    {
        $messages = Message::all(); 

        return view('index', compact('messages'));
    }

    public function getMessage(Request $request, string $id)
    {

        $message = Message::findOrFail($id);

        return view('edit', compact('message'));
    }

    public function createMessage(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'required|string',
                'content' => 'required|string',
            ]
        );

        Message::create(
            [
                'title' => $request->title,
                'content' => $request->content,
                'date' => date('Y-m-d H:i:s'),

            ]
        );
        
        return redirect('/home')->with('success', 'Message created successfully!');
    }

    public function updateMessage(Request $request, string $id)
    {
        $message = Message::findOrFail($id);


        if ($request->has('title')) {
            $message->title = $request->input('title');
        }
        
        if ($request->has('content')) {
            $message->content = $request->input('content');
        }
        
        $message->date = now(); 
    

        $message->save();


        return redirect('/home')->with('success', 'Message created successfully!');
    }

    public function removeMessage(Request $request, string $id)
    {
        $message = Message::findOrFail($id);

        $message->delete();

        return redirect('/home')->with('success', 'Message created successfully!');
    }

    public function removeAllMessages(Request $request): JsonResponse
    {
        $messages = Message::all();


        foreach($messages as $message) {
            $message->delete();
        }



        return response()->json(
            [
              'status' => '200',
              'message' => 'success'
            ],
            200
          );
    }
}
