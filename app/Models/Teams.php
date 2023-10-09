<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    protected $fillable = [
          'league_id',
          'name',
          'league'
    ];

    public function Leagues()
    {
        return $this->belongsTo(Leagues::class);
    }
    use HasFactory;
}
