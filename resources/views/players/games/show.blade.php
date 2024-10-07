@php use Illuminate\Support\Number; @endphp
@extends('layouts.app', ['title' => ''])

@section('content')
    <a href="{{ route('players.show', $player) }}">
        <- Back
    </a>


    <div class="text-center">

        <h3>{{ $game->random_number }}</h3>
        @if($game->is_winner)
            <h1 class="text-success">
                Win
            </h1>
        @else
            <h1 class="text-dnager">
                Lose
            </h1>
        @endif

        <p class="lead">
            Winning Amount: <strong>{{ Number::currency($game->winning_amount) }}</strong>
        </p>
    </div>

@endsection
