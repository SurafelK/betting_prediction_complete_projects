<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leagues extends Model
{
    protected $fillable = [
        "name",
        "level",
        "country",
        "created_at"
    ];

    public function Teams()
    {
        return $this -> hasMany(Teams::class);
    }
    use HasFactory;
}
