@extends('matterhorn.layout')

@section('card')
    <div class="card rounded-0">
        <div class="card-header rounded-0 bg-primary text-white">
            {{ $boardgame->name }}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col order-md-2 justify-content-center">
                    <figure class="figure">
                        <img src="{{ $bgg['image'] }}" class="figure-img img-fluid rounded" alt="{{ $boardgame->name }} thumbnail">
                        <figcaption class="figure-caption text-center">
                            <i class="fas fa-users"></i> {{ $bgg['minplayers'] }}-{{ $bgg['maxplayers'] }} players &nbsp; <i class="fas fa-clock"></i> {{ $bgg['playingtime'] }}min
                        </figcaption>
                    </figure>
                    <a href="https://boardgamegeek.com/boardgame/{{ $boardgame->ref_id }}" class="btn btn-sm btn-block btn-outline-secondary rounded-pill mb-2" style="font-size: 0.75rem;">View on Board Game Geek</a>
                    <div class="form-row">
                        @if(Auth::user()->can('edit boardgames') || Auth::user()->id === $boardgame->user_id)
                            <div class="col">
                                <a href="{{ route('boardgame.edit', $boardgame->id) }}" class="btn btn-sm btn-block btn-outline-info rounded-pill" style="font-size: 0.75rem;">Edit</a>
                            </div>
                        @endif
                        @if(Auth::user()->can('delete boardgames'))
                            <div class="col">
                                <a onclick="event.preventDefault();
                                    document.getElementById('trash-form').submit();" 
                                    class="btn btn-sm btn-block btn-outline-danger rounded-pill text-danger"
                                    style="font-size: 0.75rem;">
                                    Delete
                                </a>
                            </div>
                            <form id="trash-form" action="{{ route('boardgame.destroy', $boardgame->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        @endif
                    </div>
                </div>
                <div class="col-md-8 order-md-1">
                    {!! $bgg['description'] !!}
                </div>
            </div>
        </div>
    </div>
@endsection