<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeVehicle extends Model
{
    use HasFactory;

    protected $table = 'type_vehicles';
    protected $primaryKey = 'type_vehicle_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'type',
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'type_vehicle_id', 'type_vehicle_id');
    }
}
