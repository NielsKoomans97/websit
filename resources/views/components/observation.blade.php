<div class="observation @if ($size[0] > $size[1]) wide @else long @endif">
    <img src="{{ $observation['image_path'] }}">
    <div class="observation-content">
        <div class="col d-flex flex-column justify-content-between h-100">
            <div class="row m-4">
                <h4>{{ $observation['title'] }}</h4>
                <p>{{ substr($observation['content'], 0, 150) }}</p>
            </div>
            <div class="row d-flex flex-row flex-nowrap justify-content-between align-items-center m-4">
                <small class="auto-width"><b><i class="bi bi-clock-history mt-1 me-2"></i>{{ $observation['created_at']->format('D d M h:m') }}</b></small>
                <a class="auto-width primary" href="{{ route('observations.show', $observation['id']) }}"><span>{{  __('common.More') }}</span><i class="bi bi-chevron-right ms-2"></i></a>
            </div>
        </div>
    </div>
</div>
