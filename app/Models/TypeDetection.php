<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDetection extends Model
{
    use HasFactory;

    protected $table = 'type_detections';
    protected $primaryKey = 'type_detection_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'type',
    ];

    public function detections()
    {
        return $this->hasMany(Detection::class, 'type_detection_id', 'type_detection_id');
    }
}
