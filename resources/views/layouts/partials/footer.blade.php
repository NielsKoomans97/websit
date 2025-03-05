<footer>
    @php
        use App\Http\Utilities\Helpers;
        $scripts = Helpers::GetScripts();
    @endphp

    @foreach ($scripts as $script)
        <script src="{{ asset("public/assets/js/{$script}") }}" defer></script>
    @endforeach

    <script src="{{ asset('assets/js/app.js') }}" type="module"></script>
</footer>
