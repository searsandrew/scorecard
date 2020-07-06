@extends('matterhorn.layout')

@section('card')
    <div class="card rounded-0">
        <div class="card-header rounded-0 bg-primary text-white">
            Create a Scorecard
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('boardgame.store') }}" >
                @csrf
                <div class="form-row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="name">Boardgame Name<span class="text-danger">*</span> <i class="fas fa-info-circle text-info" style="font-size: 0.85rem; line-height: 1rem;" data-toggle="tooltip" data-placement="top" title="Please use the boardgame's complete name. Refer to the game's entry on Board Game Geek for assistance."></i></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" aria-describedby="nameHelp">
                            @error('name')
                                <span class="text-danger"><i class="fas fa-skull-crossbones"></i> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="ref">BGG Item ID<span class="text-danger">*</span> <i class="fas fa-info-circle text-info" style="font-size: 0.85rem; line-height: 1rem;" data-toggle="tooltip" data-placement="top" title="Board Game Geek Item ID's can be found at the very bottom of the 'Community Stats'."></i></label>
                            <input type="text" class="form-control @error('ref_id') is-invalid @enderror" id="ref" name="ref_id" value="{{ old('ref_id') }}" aria-describedby="refHelp">
                            @error('ref_id')
                                <span class="text-danger"><i class="fas fa-skull-crossbones"></i> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="scorecard">Scorecard JSON<span class="text-danger">*</span></label>
                            <textarea class="form-control @error('scorecard') is-invalid @enderror" id="scorecard" name="scorecard" rows="20" aria-describedby="scorecardHelp">{{ old('scorecard') }}</textarea>
                            @error('scorecard')
                                <span class="text-danger"><i class="fas fa-skull-crossbones"></i> {{ $message }}</span>
                            @enderror
                            <small id="scorecardHelp" class="form-text text-muted">Refer to the <a href="#">Scorecard Building Guide</a> for instructions on creating a Scorecard.</small>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-success rounded-pill">Add Scorecard</a>
            </form>
        </div>
    </div>
@endsection