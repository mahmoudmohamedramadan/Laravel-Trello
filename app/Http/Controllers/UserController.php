<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\TrelloNotification;

class UserController extends Controller
{
    public function notifyUserViaTrello(Request $request)
    {
        $dataCard = $request->validate([
            'name' => 'required|max:25|min:5',
            'description' => 'max:255',
            'top' => '',
            'date' => 'required',
        ]);

        $dataCard["top"] = $request->exists("top") ? true : false;

        auth()->user()->notify(new TrelloNotification($dataCard));

        return back()->with(["success" => "card saved successfully"]);
    }
}
