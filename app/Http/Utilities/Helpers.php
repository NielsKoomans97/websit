<?php

namespace App\Http\Utilities;

class Helpers
{
    public static function GetStylesheets(): array
    {
        $files = scandir('assets/css');

        return array_values(array_diff($files, ['.', '..']));
    }

    public static function GetScripts(): array
    {
        $files = scandir('assets/js');

        return array_values(array_diff($files, ['.', '..', 'app.js']));
    }
}
