<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Introduction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'date_introduction' => 'datetime'
    ];

    public function konsumen()
    {
        return $this->belongsTo(Konsumen::class);
    }
}
