
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-4">
        <div class="container">
            <a class="navbar-brand fw-bold" style="margin-left: -30px;" href="{{ route('/') }}"><img class="img-fluid" src="{{ asset('public/frontend/assets/image/FDTB Logo-01.svg') }}"
                    alt="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav menu ms-auto mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active" href="{{ route('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('practical.test') }}">Practical Test</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('theory.test') }}">Theory Test</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('adi') }}">ADI</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('faqs') }}">FAQ</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('blogs') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
