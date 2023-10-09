<!-- update.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Update Game</h1>

        <form action="{{ route('games.update', ['id' => $game->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="odd">Odd:</label>
                <input type="text" name="odd" id="odd" value="{{ $game->odd }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="home_team">Home Team:</label>
                <input type="text" name="home_team" id="home_team" value="{{ $game->home_team }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="away_team">Away Team:</label>
                <input type="text" name="away_team" id="away_team" value="{{ $game->away_team }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="prediction">Prediction:</label>
                <input type="text" name="prediction" id="prediction" value="{{ $game->prediction }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="game_time">Game Time:</label>
                <input type="text" name="game_time" id="game_time" value="{{ $game->game_time }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="game_date">Game Date:</label>
                <input type="text" name="game_date" id="game_date" value="{{ $game->game_date }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection