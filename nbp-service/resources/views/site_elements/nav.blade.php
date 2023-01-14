<div class="container mb-2">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('start_view') }}">
                <div class="d-none d-lg-block"><?php echo str_replace(' ', '_', config('app.name')) ?></div>
                <?php
                    $words = explode(" ", config('app.name'));
                    $akronim = '';
                    foreach ($words as $w) {
                        $akronim .= mb_substr($w, 0, 1).'_';
                    }
                    $akronim = rtrim($akronim, "_");
                    echo "<div class=\"d-block d-lg-none\">{$akronim}</div>";
                ?>
            </a>
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
                    <li class="nav-item">
                        <a class="nav-link @if (Request::route()->getName() == 'web.currencies.deleteAll') active  @endif" href="{{ route('web.currencies.deleteAll') }}">delete all</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (Request::route()->getName() == 'web.currencies.runWGawService') active  @endif" href="{{ route('web.currencies.runWGawService') }}">Run service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('api.currencies.index') }}">api</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('telescope') }}">telescope</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('web.dark_theme') }}">
                            @if (session('isDarkTheme'))<i class="far fa-sun small"></i>@else<i class="far fa-moon small"></i>@endif
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>


