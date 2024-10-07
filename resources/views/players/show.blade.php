@php use App\Models\Player; @endphp
@extends('layouts.app', ['title' => 'Player: '.$player->username.' from '.$player->created_at->format('M d, Y')])

@section('content')
    <a href="{{ route('players.create') }}"><small><- Create new</small></a>
    <h1>Game for <strong>{{ $player->username }}</strong></h1>
    <p class="lead">
        Created: {{ $player->created_at->format('M d, Y H:i:s') }}
        |
        @if(!$player->is_expired)
            <small title="{{ $player->created_at->addDays(Player::$ValidForDays)->format('Y-m-d H:i:s') }}">Valid for: {{ $player->created_at->addDays(Player::$ValidForDays)->diffForHumans() }}</small>
        @else
            <span class="badge bg-danger">Expired</span>
        @endif
    </p>

    @if (session('message'))
        <div class="alert alert-success">
            {!! session('message') !!}
        </div>
    @endif




    @if(!$player->is_expired)
        <form action="{{ route('players.game.store', $player) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary btn-lg">
                Imfeelinglucky
            </button>
        </form>
    @else
        <button type="button" disabled class="btn btn-primary btn-lg">
            Imfeelinglucky
        </button>
        <p class="lead">This player is expired. Please create new</p>
    @endif

    <hr>
    <div class="row">
        <div class="col-12 col-md-auto mb-2">
            <a href="{{ route('players.game.index', $player) }}" class="btn btn-secondary">History</a>
        </div>
        @if(!$player->is_expired)
            <div class="col-12 col-md-auto ms-auto mb-2">
                <form action="{{ route('players.refresh', $player) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-warning">
                        Refresh URL
                    </button>
                </form>
            </div>
            <div class="col-12 col-md-auto mb-2">
                <form action="{{ route('players.delete', $player) }}"
                      method="POST"
                      onsubmit="return confirm('Do you want to deactivate your link? It can\'t be reverted. ');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Deactivate
                    </button>
                </form>
            </div>
        @endif
    </div>

@endsection
