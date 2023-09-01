<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_cities extends Model
{
    protected $table = 'user_cities';

    protected $fillable = [
        'city_id', 'user_id',
    ];

    public function cities() {
        return $this->hasOne(Cities::class, 'id', 'city_id');
    }

    public function users() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
