<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_number',
        'home_team_id', 
        'away_team_id',
        'game_time',
        'game_date',
        'prediction',
        'description',
        'odd'
    ];
    public function Predictions()
    {
        return $this->hasMany(Predictions::class);
    }

    public function Teams()
    {
        return $this->hasMany(Teams::class);
    }
}
