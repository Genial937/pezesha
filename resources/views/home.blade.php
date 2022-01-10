@extends('layouts.app')

@section('content')
<div class="banner">
  <div class="container">
      <h1 class="banner-title">
          <span>Pezesha.</span> Interview Test.
      </h1>
      <p>Characters fetched from Marvel API. When you click view more you see the details of that particular
          character.</p>
  </div>
</div>
</header>
    <!-- blog -->
    <section class = "blog" id = "blog">
        <div class = "container">
          <div class = "title">
            <h2>All Characters</h2>
            <p>All characters fetched and paginated to 6 per page</p>
          </div>
          <div class = "blog-content">
            <!-- item -->
           @foreach ($characters as $character)
           <div class = "blog-item">
              <div class = "blog-img">
                <img src = "{{ $character->thumbnail->path }}.{{ $character->thumbnail->extension }}"  alt = "">
                <span><i class = "far fa-heart"></i></span>
              </div>
              <div class = "blog-text">
                <span>{{ date('M d, Y', strtotime($character->modified)) }}</span>
                <h2>{{ $character->name }}</h2>
                <p>{{ $character->description }}</p>
                <a href = "single/character/{{ $character->id }}">View More</a>
              </div>
            </div>
           @endforeach
            <!-- end of item -->
            
          </div>
          {{ $characters->links() }}
        </div>
      </section>
      <!-- end of blog -->
@endsection