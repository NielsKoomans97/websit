<div class="model-viewer">
    <div class="card">
        <div class="card-header">
            <h6 class="fw-bolder m-0">Weermodel bekijken</h6>
        </div>
        <div class="card-body p-3">
            <div class="frames">
                @foreach ($steps as $key => $value)
                    <div class="frame" @if ($key == $step) selected @endif>
                        <img src="{{ $value }}">
                    </div>
                @endforeach
            </div>

            <select class="parameters w-100 mt-3 mb-3 p-2" wire:model="parameter" wire:change="getSteps">
                @foreach ($options as $groupKey => $optionGroup)
                    <optgroup label="{{ $groupKey }}">
                        @foreach ($optionGroup as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>

            <div class="col d-flex flex-nowrap control-group">
                <button wire:click="setPlayState" id="play-button" class="primary"><i
                        class="bi bi-play m-0" wire:ignore></i></button>
                <input type="range" class="step w-100 ms-2" max="{{ $max }}" wire:model="step"
                    wire:change="updateStep($event.target.value)">

            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const playButton = document.querySelector('#play-button');
            const playButtonIcon = playButton.querySelector('.bi');
            const slider = document.querySelector('input[type="range"]');
            const frames = document.querySelectorAll('.frame');

            let stepIndex = slider.value;
            let paused = true;

            Livewire.on('stepChanged', (event) => {
                frames.forEach(frame => {
                    frame.removeAttribute('selected');
                });

                if (frames[event.step]) {
                    frames[event.step].setAttribute('selected', '');
                }
            });

            Livewire.on('playStateChanged', (event) => {
                paused = event.paused;

                if (paused == false) {
                    console.log(playButtonIcon.classList);

                    playButtonIcon.classList.remove('bi-play')
                    playButtonIcon.classList.add('bi-pause');
                } else {
                    playButtonIcon.classList.remove('bi-pause')
                    playButtonIcon.classList.add('bi-play');
                }
            });

            setInterval(() => {
                if (paused === false) {
                    if (stepIndex < (frames.length - 1)) {
                        stepIndex = stepIndex + 1;
                    } else {
                        stepIndex = 0;
                    }

                    Livewire.dispatch('updateStep', {
                        value: stepIndex
                    });
                }
            }, 250);
        });
    </script>
@endpush
