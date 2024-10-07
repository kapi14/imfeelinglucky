<?php

namespace App\Models;

use App\Services\PlayerGameService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class PlayerGame extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'player_id',
        'random_number',
        'winning_amount',
    ];

    protected static function booted()
    {
        static::creating(function (self $player_game) {
            $player_game->uuid = Str::uuid()->toString();
        });
    }

    // is_winner
    public function getIsWinnerAttribute(): bool
    {
        return PlayerGameService::IsWinner($this->random_number);
    }
}
