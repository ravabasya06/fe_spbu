<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Spbu extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'spbus';
    protected $primaryKey = 'spbu_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'road',
        'city',
        'province_id',
        'island_id',
        'latitude',
        'longitude',
    ];

    public function islands()
    {
        return $this->belongsTo(Island::class, 'island_id', 'island_id');
    }

    public function provinces()
    {
        return $this->belongsTo(Province::class, 'province_id', 'province_id');
    }

    public function dispensers()
    {
        return $this->hasMany(Dispenser::class, 'spbu_id', 'spbu_id');
    }

    public function detections()
    {
        return $this->hasMany(Detection::class, 'spbu_id', 'spbu_id');
    }

    public function cctvs()
    {
        return $this->hasMany(Cctv::class, 'spbu_id', 'spbu_id');
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'spbu_id', 'spbu_id');
    }
}