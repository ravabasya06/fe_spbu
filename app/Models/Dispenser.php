<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispenser extends Model
{
    use HasFactory;

    protected $table = 'dispensers';
    protected $primaryKey = 'dispenser_id';

    protected $fillable = [
        'spbu_id',
        'dispenser_number',
        'type_dispenser_id',
        'queue',
    ];

    public function spbu()
    {
        return $this->belongsTo(Spbu::class, 'spbu_id', 'spbu_id');
    }

    public function typeDispenser()
    {
        return $this->belongsTo(TypeDispenser::class, 'type_dispenser_id', 'type_dispenser_id');
    }
}

