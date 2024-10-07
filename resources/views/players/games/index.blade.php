@php use Illuminate\Support\Number; @endphp
@extends('layouts.app', ['title' => 'History for '.$player->username])

@section('content')
    <a href="{{ route('players.show', $player) }}">
        <- Back
    </a>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Date</th>
            <th>Number</th>
            <th>Winning Amount</th>
        </tr>
        </thead>
        <tbody>
        @foreach($games as $game)
            <tr>
                <td>{{ $game->created_at->diffForHumans() }}</td>
                <td>{{ $game->random_number }}</td>
                <td>{{ Number::currency($game->winning_amount) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
