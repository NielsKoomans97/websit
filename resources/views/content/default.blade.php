<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Untitled Document' }}</title>

    @php
        function removeValuesFromArray(array $array, array $valuesToRemove): array
        {
            return array_values(array_diff($array, $valuesToRemove));
        }

        $cssFiles = scandir('css');
        $cssFiles = removeValuesFromArray($cssFiles, ['.', '..', '...', 'fonts', 'fonts/']);

        $jsFiles = scandir('js');
        $jsFiles = removeValuesFromArray($jsFiles, ['.', '..', '...', 'app.js']);

    @endphp

    @foreach ($cssFiles as $path)
        <link rel="stylesheet" href="css/{{ $path }}">
    @endforeach

    <link rel="stylesheet" href="css/app.css">

    @livewireStyles

    @stack('css')
</head>

<body>
    <div class="content">
        <header>
            <div class="container login-container">
                <div class="row justify-content-between">
                    <div class="d-flex justify-content-start align-items-center nav-bar">
                        <a href="{{ route('observations.index') }}">
                            <img src="img/logo.png">
                        </a>
                        <a class="primary nav-button ms-4" href="{{ route('webcam') }}"><i
                                class="bi bi-camera-reels me-2"></i>{{ __('common.Webcam') }}</a>
                        <a class="primary nav-button" href="{{ route('observations.index') }}"><i
                                class="bi bi-camera2 me-2"></i>{{ __('common.Observations') }}</a>
                        <a class="primary nav-button" href="{{ route('weathermodel') }}"><i class="bi bi-graph-up-arrow me-2"></i>
                        {{ __('common.Weathermodel') }}</a>

                    </div>
                    @if (!Auth::check())
                        <a class="primary login-button"
                            href="{{ route('login') }}"><span>{{ __('common.Login') }}</span><i
                                class="bi bi-shield-lock ms-2"></i></a>
                    @else
                        <div class="d-flex flex-row justify-content-center align-items-center">
                            <label class="username me-3">Ingelogd als <b>{{ Auth::user()->name }}</b></label>
                            <form action="{{ route('logout') }}" method="post" id="logout-form">@csrf</form>
                            <button class="primary login-button"
                                onclick="document.querySelector('#logout-form').submit();"></span>{{ __('common.Logout') }}</span><i
                                    class="ti ti-logout ms-2"></i></button>
                        </div>
                    @endif
                </div>
            </div>
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            <script src="js/app.js" type="module"></script>

            @foreach ($jsFiles as $path)
                @if (is_dir('/js/' . $path))
                    @php
                        $subDir = scandir($path);
                        $subDir = removeValuesFromArray($subDir, ['.', '..', '...']);
                    @endphp

                    @foreach ($subDir as $subPath)
                        @if (str_ends_with($subPath, '.js'))
                            <script src="js/{{ $path }}/{{ $subPath }}"></script>
                        @endif
                    @endforeach
                @else
                    @if (str_ends_with($path, '.js'))
                        <script src="js/{{ $path }}"></script>
                    @endif
                @endif
            @endforeach

            @livewireScripts
            @stack('scripts')
        </footer>
    </div>

</body>

</html>
