<?php

namespace App\Http;

use function Nette\Utils\match;

class Forecast_helper
{
    public static function get_color_by_temp($temp)
    {
        if ($temp <= 0)
        {
            $color = 'text-primary';
        }
        elseif ($temp > 0 && $temp <= 15)
        {
            $color = 'text-success';
        }
        elseif ($temp > 15 && $temp <= 25)
        {
            $color = 'text-warning';
        }
        else
        {
            $color = 'text-danger';
        }

        return $color;
    }

    public static function get_icon_by_weather($weather)
    {
        return match($weather) {
            'rainy' => 'fa-cloud-rain',
            'snowy' => 'fa-snowflake',
            'sunny' => 'fa-sun',
            'cloudy' => 'fa-cloud-sun',
            default => 'fa-sun',
        };
    }
}
