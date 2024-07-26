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
}