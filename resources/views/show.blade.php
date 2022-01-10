@extends('layouts.app')

@section('content')
</header>
    <!-- about -->
    <section class="about" id="about">
        <div class="container">
            <div class="about-content">
                <div>
                    <img src="{{ $character->thumbnail->path }}.{{ $character->thumbnail->extension }}" alt="">
                </div>
                <div class="about-text">
                    <div class="title">
                        <h2>{{ $character->name }}</h2>
                        {{-- <p>art & design is my passion</p> --}}
                    </div>
                    <p>{{ $character->description }}</p>

                    <h2 style="font-weight: bold">Series</h2>
                    <ul>
                        @if (count($character->series->items) > 0)
                            @foreach ($character->series->items as $serie)
                                <li>{{ $serie->name }}</li>
                            @endforeach
                        @else
                            <li>No series found under this character!</li>
                        @endif
                    </ul>
                </div>
            </div>
            <br>
            <hr>
            <div class="about-box">
                <div class="box1">
                    <div class="content">
                        <h2 style="font-weight: bold">Comics</h2>
                        <ul>
                            @if (count($character->comics->items) > 0)
                                @foreach ($character->comics->items as $comic)
                                    <li>{{ $comic->name }}</li>
                                @endforeach
                            @else
                                <li>No Comics found under this character!</li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="box2">
                    <h2 style="font-weight: bold">Stories</h2>
                    <ul>
                        @if (count($character->stories->items) > 0)
                            @foreach ($character->stories->items as $story)
                                <li>{{ $story->name }}</li>
                            @endforeach
                        @else
                            <li>No Stories found under this character!</li>
                        @endif
                    </ul>
                </div>
                <div class="box3">
                    <h2 style="font-weight: bold">Events</h2>
                    <ul>
                        @if (count($character->events->items) > 0)
                            @foreach ($character->events->items as $event)
                                <li>{{ $event->name }}</li>
                            @endforeach
                        @else
                            <li>No Events found under this character!</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end of about -->
@endsection
