<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $documentTitle ?? 'Untitled document' }}</title>

    @php
        use App\Http\Utilities\Helpers;
        $stylesheets = Helpers::GetStylesheets();
    @endphp

    @foreach ($stylesheets as $stylesheet)
        <link rel="stylesheet" href="{{ asset("assets/css/{$stylesheet}") }}">
    @endforeach
</head>
