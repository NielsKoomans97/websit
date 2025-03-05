<?php

namespace App\Livewire\Controls;

use Livewire\Component;

class ChartView extends Component
{
    public string $parameter;

    public array $currentStep;

    public array $steps;

    public array $options;

    public function mount()
    {
        $this->options = trans('parameters');
    }

    public function updateSteps()
    {
        $this->steps = [];

        $localDirectory = $this->buildPathString([
            'assets',
            'images',
            'charts',
            $this->parameter,
        ]);

        if (! is_dir($localDirectory)) {
            mkdir($localDirectory, 0777, true);
        }

        for ($i = 0; $i <= 60; $i++) {
            $localFile = $this->buildPathString([
                $localDirectory,
                "h43_{$this->parameter}_0{$this->fixInt($i)}00.png",
            ]);
            $externalFile = "https://dev.weercijfers.nl/static/harmonie/benelux/h43_{$this->parameter}{$this->fixInt($i)}00.png";

            if (file_put_contents($localFile, file_get_contents($externalFile))) {
                $externalFile = str_replace('\\', '/', $localFile);
                $this->steps[$i] = $externalFile;
            }
        }
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

    public function fixInt(int $value): string
    {
        if ($value < 10) {
            return '0'.$value;
        } else {
            return $value;
        }
    }

    public function render()
    {
        return view('livewire.controls.chart-view');
    }
}
