  <!-- header -->
  <header>
      <nav class="navbar bg-dark navbar-dark navbar-expand-md">
          <div class="container">
              <a href="{{ route('index') }}" class="navbar-brand">PEZESHA</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav nav m-auto">
                      <li> <a href="{{ route('index') }}">Characters</a></li>
                      <li>
                          <a href="{{ route('csv.index') }}">CSV Upload</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
     
  <!-- end of header -->
