@if (!empty($route))
    <a href="{{ $route }}" {{ $attributes }}>
        @if (!empty($icon))
            <i class="ti ti-{{ $icon }} me-2"></i>
        @endif
        {{ $slot }}
    </a>
@else
    <button {{ $attributes }}>
        @if (!empty($icon))
            <i class="ti ti-{{ $icon }} me-2"></i>
        @endif
        {{ $slot }}
    </button>
@endif
