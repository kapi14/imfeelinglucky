<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class Player extends Model
{
    use SoftDeletes;

    // 7 days plus valid for player to play
    public static $ValidForDays = 7;

    protected static function booted()
    {
        static::creating(function (self $player) {
            $player->uuid = Str::uuid()->toString();
        });
    }

    protected $fillable = [
        'username',
        'phone',
    ];

    public function games()
    {
        return $this->hasMany(PlayerGame::class);
    }


    // is_expired
    public function getIsExpiredAttribute()
    {
        return $this->created_at->addDays(self::$ValidForDays)->isPast();
    }
}
