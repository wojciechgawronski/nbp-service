<div class="container mb-2">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('start_view') }}">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link  @if (Request::route()->getName() == 'start_view') active  @endif" aria-current="page" href="{{ route('start_view') }}">start</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (Request::route()->getName() == 'currencies.index') active  @endif" href="{{ route('currencies.index') }}">currencies</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>


