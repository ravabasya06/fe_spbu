<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cctv extends Model
{
    use HasFactory;

    protected $table = 'cctvs';
    protected $primaryKey = 'cctv_id';

    protected $fillable = [
        'spbu_id',
        'cctv_number',
        'status',
        'man',
        'woman',
        'link',
    ];

    public function spbu()
    {
        return $this->belongsTo(Spbu::class, 'spbu_id', 'spbu_id');
    }

    public function detections()
    {
        return $this->hasMany(Detection::class, 'cctv_id', 'cctv_id');
    }
}
