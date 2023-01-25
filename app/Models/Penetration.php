<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penetration extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'date_penetration' => 'datetime',
    ];

    public function konsumen()
    {
        return $this->belongsTo(Konsumen::class);
    }
}
