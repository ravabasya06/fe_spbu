<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Vehicle extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'vehicles';
    protected $primaryKey = 'vehicle_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;

    protected $fillable = [
        'spbu_id',
        'type_vehicle_id',
    ];

    protected function createdAt(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->format('d-m-Y h:m:s'),
        );
    }

    public function spbu()
    {
        return $this->belongsTo(Spbu::class, 'spbu_id', 'spbu_id');
    }

    public function typeVehicle()
    {
        return $this->belongsTo(TypeVehicle::class, 'type_vehicle_id', 'type_vehicle_id');
    }
}

