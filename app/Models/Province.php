<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function islands()
    {
        return $this->belongsTo(Island::class, 'island_id', 'island_id');
    }

    public function spbus()
    {
        return $this->hasMany(Spbu::class, 'province_id', 'province_id');
    }
}
