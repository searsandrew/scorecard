@extends('matterhorn.layout')

@section('card')
    <div class="card rounded-0">
        <div class="card-header rounded-0 bg-primary text-white">
            Boardgames
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <p class="card-text">Click on a boardgame below to view a scorecard for the game. You can also do 'ad-hoc' scoring using this scorecard outside of a game.</p>
                    <p class="card-text">To play a game using this scorecard, please <a href="#">Setup a game</a>.
                </div>
                @if(Auth::user()->can('create boardgames'))
                    <div class="col-4">
                        <a href="{{ route('boardgame.create') }}" class="btn btn-block btn-outline-success rounded-pill">Create a Scorecard</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="list-group list-group-flush">
            @if(count($boardgames) != 0)
                @foreach($boardgames as $boardgame)
                    <a class="list-group-item" href="{{ route('boardgame.show', $boardgame->id) }}">{{ $boardgame->name }}</a>
                @endforeach
            @else 
                <em class="list-group-item text-muted">No scorecards are available</em>
            @endif
        </div>
    </div>
@endsection