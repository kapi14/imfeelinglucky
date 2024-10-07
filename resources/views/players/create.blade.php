@extends('layouts.app', ['title' => 'Register'])

@section('content')
    <h1 class="mb-4">Register</h1>
    @if (session('message'))
        <div class="alert alert-success">
            {!! session('message') !!}
        </div>
    @endif
    {{----}}
    <form action="{{ route('players.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="" value="{{ old('username') }}">
                <label>Username *</label>
            </div>
            @error('username')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <div class="form-floating">
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="" value="{{ old('phone') }}">
                <label>Phone *</label>
            </div>
            @error('phone')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary btn-lg">Register</button>
        </div>
    </form>
@endsection
