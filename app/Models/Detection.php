<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detection extends Model
{
    use HasFactory;

    protected $table = 'detections';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'spbu_id',
        'cctv_id',
        'type_detection_id',
    ];

    public function spbu()
    {
        return $this->belongsTo(Spbu::class, 'spbu_id', 'spbu_id');
    }

    public function cctv()
    {
        return $this->belongsTo(Cctv::class, 'cctv_id', 'cctv_id');
    }

    public function typeDetection()
    {
        return $this->belongsTo(TypeDetection::class, 'type_detection_id', 'type_detection_id');
    }
}
