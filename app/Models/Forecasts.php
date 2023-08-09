<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forecasts extends Model
{
    protected $table = 'forecasts';

    protected $fillable = [
        'city_id', 'temp', 'date_forecast', 'weather_type', 'probability',
    ];

    const WEATHERS = ['sunny', 'rainy', 'snowy', 'cloudy',];

    public function cities()
    {
        return $this->hasOne(Cities::class, 'id', 'city_id');
    }
}
