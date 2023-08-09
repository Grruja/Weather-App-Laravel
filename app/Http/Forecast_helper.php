<?php

namespace App\Http;

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
        if ($weather == 'sunny')
        {
            $icon = 'fa-sun';
        }
        elseif ($weather == 'rainy')
        {
            $icon = 'fa-cloud-rain';
        }
        elseif ($weather == 'cloudy')
        {
            $icon = 'fa-cloud-sun';
        }
        else
        {
            $icon = 'fa-snowflake';
        }

        return $icon;
    }
}
