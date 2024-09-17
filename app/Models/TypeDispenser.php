<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDispenser extends Model
{
    use HasFactory;

    protected $table = 'type_dispensers';
    protected $primaryKey = 'type_dispenser_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'type',
    ];

    public function detections()
    {
        return $this->hasMany(Dispenser::class, 'type_dispenser_id', 'type_dispenser_id');
    }
}
