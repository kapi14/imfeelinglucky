<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlayerIsNotExpiredMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $player = $request->route('player') ?? null;

        if ($player->is_expired) {
            return redirect()->back()->with('message', 'This player is expired! Please create new.');
        }

        return $next($request);
    }
}
