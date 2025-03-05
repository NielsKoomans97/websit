<?php

use App\Tasks\UpdateCharts;
use Illuminate\Support\Facades\Schedule;

Schedule::call(function () {
    new UpdateCharts;
})->hourlyAt(10);
