<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'date_plantest' => 'datetime'
    ];


    public function konsumen()
    {
        return $this->belongsTo(Konsumen::class);
    }

    public function plantestable()
    {
        return $this->morphMany(PPlantest::class, 'plantestable');
    }
}
