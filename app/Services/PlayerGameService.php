<?php

namespace App\Services;

class PlayerGameService
{
    public static function GenerateRandomNumber(): int
    {
        return rand(1, 1000);
    }

    public static function CalculateWinningAmount(int $number): float
    {

        // if lose then winning amount is 0
        if (!self::IsWinner($number)) {
            return 0;
        }

        return match (true) {
            $number > 900 => $number * 0.7,
            $number > 600 => $number * 0.5,
            $number > 300 => $number * 0.3,
            $number <= 300 => $number * 0.1,
        };
    }

    public static function IsWinner(int $number)
    {
        // if number is odd, this is lose
        return $number % 2 == 0;
    }
}
