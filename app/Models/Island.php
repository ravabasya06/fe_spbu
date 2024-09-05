<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Island extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function provinces()
    {
        return $this->hasMany(Province::class, 'island_id', 'island_id');
    }
    
    public function spbus()
    {
        return $this->hasMany(Spbu::class, 'island_id', 'island_id');
    }
}
