<?php

namespace App\Tasks;

class UpdateCharts
{
    public function __invoke()
    {
        $options = trans('parameters');

        foreach ($options as $groupKey => $groupValue) {
            foreach ($groupValue as $optionKey => $optionValue) {

            }
        }
    }
}
