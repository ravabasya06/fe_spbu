<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;



class Detection extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'detections';
    protected $primaryKey = 'detection_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;

    protected $fillable = [
        'spbu_id',
        'cctv_id',
        'type_detection_id',
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

    public function cctv()
    {
        return $this->belongsTo(Cctv::class, 'cctv_id', 'cctv_id');
    }

    public function typeDetection()
    {
        return $this->belongsTo(TypeDetection::class, 'type_detection_id', 'type_detection_id');
    }
}
