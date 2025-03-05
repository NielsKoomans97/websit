<x-body.section class="navigation">
    <x-body.container>
        <x-body.row class="justify-content-between p-3">
            <x-body.column class="d-flex align-items-center">
                <img class="logo me-5" alt="logo" src="{{ asset('assets/images/logo.png') }}">
                <nav>
                    @foreach ($routes as $route)
                        <x-controls.button class="p-3" :route="route($route['name'])"
                            :icon="__('routeicons.' . $route['name'])">{{ __('routes.' . $route['name']) }}</x-controls.button>
                    @endforeach
                </nav>
            </x-body.column>
            <x-body.column class="d-flex align-items-center flex-grow-0">
                <x-controls.button class="login-button p-3" :route="route('login')"
                    icon="lock">{{ __('common.Login') }}</x-controls.button>
            </x-body.column>
        </x-body.row>
    </x-body.container>
</x-body.section>
