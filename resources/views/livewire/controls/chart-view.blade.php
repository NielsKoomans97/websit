<div class="chart-view">
    <div class="frames">
        @if (isset($steps))
            @foreach ($steps as $key => $value)
                <div class="frame" @if ($key == $step) selected @endif>
                    <img src="{{ $value }}">
                </div>
            @endforeach
        @endif
    </div>

    <select class="parameters w-100 mt-3 mb-3 p-2" wire:model="parameter" wire:change="updateSteps">
        @foreach ($options as $groupKey => $optionGroup)
            <optgroup label="{{ $groupKey }}">
                @foreach ($optionGroup as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </optgroup>
        @endforeach
    </select>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
         
        });
    </script>
@endpush
