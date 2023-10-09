<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Predictions extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        "prediction",
        "created_at"
    ];

    public function Games()
    {
        return $this->hasMany(Games::class);
    }
}
