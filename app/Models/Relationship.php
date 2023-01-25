<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'date_start' => 'datetime',
        'date_end' => 'datetime',
    ];

    public function konsumen()
    {
        return $this->belongsTo(Konsumen::class);
    }
}
