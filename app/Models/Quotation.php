<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'date_quotation' => 'datetime'
    ];

    public function konsumen()
    {
        return $this->belongsTo(Konsumen::class);
    }

    public function quotationable()
    {
        return $this->morphMany(QuotationProduct::class, 'quotationable');
    }
}
