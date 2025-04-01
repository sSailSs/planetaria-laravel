<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'size', 'distance', 'gravity', 'atmosphere', 'image', 'user_id'
    ];

        public function user()
    {
        return $this->belongsTo(User::class);
    }
}