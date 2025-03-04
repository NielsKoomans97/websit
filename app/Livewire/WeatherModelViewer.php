<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class WeatherModelViewer extends Component
{

    public int $step = 0;
    public int $max = 60;
    public string $parameter = "simradar_0";
    public array $steps = [];
    public bool $paused = true;
    public array $options = [];

    protected $listeners = [
        'updateStep',
        'stepChanged',
        'playStateChanged'
    ];

    public function mount()
    {
        $this->options = trans('parameters');
        $this->getSteps();
    }

    public function updated($propertyName)
    {
        $this->getSteps();
    }
    public function getSteps()
    {
        $storagePath = storage_path($this->buildPathString([
            'img',
            'weather_images',
            "{$this->parameter}"
        ]));

        if (!file_exists($storagePath)) {
            mkdir($storagePath, 0777, true);
        }

        $this->steps = [];

        for ($i = 0; $i < 61; $i++) {
            $imageUrl = "https://dev.weercijfers.nl/static/harmonie/benelux/h43_{$this->parameter}{$this->fixInt($i)}00.png";
            $externalPath = asset("img/weather_images/{$this->parameter}/h43_{$this->parameter}{$this->fixInt($i)}00.png");
            $localPath = $this->buildPathString([
                $storagePath,
                "h43_{$this->parameter}{$this->fixInt($i)}00.png"
            ]);

            if (!file_exists($localPath)) {
                $image = Http::get($imageUrl);

                dd($externalPath);

                if ($image->successful()) {
                    file_put_contents($localPath, $image->body());
                }
            }

            $this->steps[] = $externalPath;
        }

        $this->step = 0;
    }

    public function buildPathString(array $pathParts): string
    {
        $result = '';

        for ($i = 0; $i < count($pathParts); $i++) {
            $result .= $pathParts[$i];

            if ($i < (count($pathParts) - 1)) {
                $result .= DIRECTORY_SEPARATOR;
            }
        }

        return $result;
    }

    public function updateStep(mixed $value)
    {
        $this->step = intval($value);

        $this->dispatch('stepChanged', step: $this->step);
    }

    public function fixInt(int $value): string
    {
        if ($value < 10) {
            return '0' . $value;
        } else {
            return $value;
        }
    }

    public function setPlayState()
    {
        if ($this->paused == true) {
            $this->paused = false;
        } else {
            $this->paused = true;
        }

        $this->dispatch('playStateChanged', paused: $this->paused);
    }

    public function render()
    {
        return view('livewire.weather-model-viewer');
    }
}
