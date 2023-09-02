<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'city',
    ];

    public function forecasts() {
        return $this->hasMany(Forecasts::class, 'city_id', 'id')
            ->orderBy('date_forecast');
    }

    public function today_forecast() {
        return $this->hasOne(Forecasts::class, 'city_id', 'id')
            ->whereDate('date_forecast', '2023-09-21');
    }
}
