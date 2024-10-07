<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerGameStoreRequest;
use App\Models\Player;
use App\Models\PlayerGame;
use App\Services\PlayerGameService;
use Illuminate\Http\Request;

class PlayerGameController extends Controller
{
    public function index(Player $player)
    {
        $games = $player->games()
            ->limit(3)
            ->latest()
            ->get();

        return view('players.games.index', compact('player', 'games'));
    }

    public function store(Request $request, Player $player)
    {
        $random = PlayerGameService::GenerateRandomNumber();
        $winning_amount = PlayerGameService::CalculateWinningAmount($random);

        $player_game = $player->games()->create([
            'random_number' => $random,
            'winning_amount' => $winning_amount,
        ]);

        return redirect()->route('players.game.show', [$player, $player_game]);
    }

    public function show(Player $player, PlayerGame $game)
    {
        return view('players.games.show', compact('player', 'game'));
    }
}
