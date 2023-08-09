<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $table = 'weather';

    protected $fillable =
    [
        'city_id', 'temp',
    ];

    public function cities()
    {
        return $this->hasOne(Cities::class, 'id', 'city_id');
    }
}
