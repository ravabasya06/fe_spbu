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
    public $timestamps = false;

    protected $fillable = [
        'name',
        'road',
        'city',
        'province',
        'island',
    ];

    public function dispensers()
    {
        return $this->hasMany(Dispenser::class, 'spbu_id', 'spbu_id');
    }

    public function detections()
    {
        return $this->hasMany(Detection::class, 'spbu_id', 'spbu_id');
    }
}