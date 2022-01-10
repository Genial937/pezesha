@extends('layouts.app')

@section('content')
</header>
    <div class="container pt-4 m-5" id="app">
        <h2>@{{ progress }}</h2>
        <hr>
        <h4>@{{ progressTitle }}</h4>
        <hr>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" :aria-valuenow="progressPercentage"
                aria-valuemin="0" aria-valuemax="100" style="`width: ${progressPercentage}%;`">@{{ progressPercentage }}%</div>
        </div>
    </div>
@endsection
