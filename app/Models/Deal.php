<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = [
        'date_deal' => 'datetime'
    ];

    public function konsumen()
    {
        return $this->belongsTo(Konsumen::class);
    }

    public function dealable()
    {
        return $this->morphMany(DealProduct::class, 'dealable');
    }
}
