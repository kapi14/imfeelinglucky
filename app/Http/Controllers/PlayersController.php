<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerStoreRequest;
use App\Models\Player;
use Str;

class PlayersController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('players.create');
    }

    public function store(PlayerStoreRequest $request)
    {
        $player = new Player();
        $player->fill($request->validated());
        $player->save();

        return redirect()->route('players.show', $player);
    }

    public function show(Player $player)
    {
        return view('players.show', compact('player'));
    }

    public function refresh(Player $player)
    {
        $player->uuid = Str::uuid()->toString();
        $player->save();

        return redirect()->route('players.show', $player)->with('message', 'Your URL is refreshed!');
    }

    public function delete(Player $player)
    {
        $player->delete();
        return redirect()->route('players.create')->with('message', 'Your Player is deleted! You can create new.');
    }


}
