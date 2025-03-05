<!DOCTYPE html>
<html lang="en">    
@include('layouts.partials.head')

<body>
    @include('layouts.partials.header')
    <x-body.content>
        @yield('content')
    </x-body.content>
    @include('layouts.partials.footer')
</body>

</html>
