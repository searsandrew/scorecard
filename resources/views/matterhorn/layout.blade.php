@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-sm-10">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <img src="{{ env('APP_BANNER', 'http://www.fillmurray.com/1000/200') }}" class="img-fluid rounded-top mb-3" alt="{{ env('APP_NAME') }}" />
                @yield('card')
            </div>
            <div class="col-md-3">
                @include('matterhorn.sidebar')
            </div>
        </div>
    </div>
@endsection