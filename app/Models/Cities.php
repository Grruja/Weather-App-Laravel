<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'city',
    ];

    public function forecasts()
    {
        return $this->hasMany(Forecasts::class, 'city_id', 'id')
            ->orderBy('date_forecast');
    }
}
