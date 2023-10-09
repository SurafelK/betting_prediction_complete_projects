<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $fillable = [
        "name",
        "created_at"
    ];

    public function Division()
    {
        return $this->hasMany(divisions::class);
    }

    use HasFactory;
}
