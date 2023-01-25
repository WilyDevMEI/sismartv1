<?php

namespace App\Models;

use App\Models\SupplyProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supply extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // do = Delivery Order
    protected $casts = [
        'date_do' => 'datetime'
    ];
    public function konsumen()
    {
        return $this->belongsTo(Konsumen::class);
    }
    public function supplieable()
    {
        return $this->morphMany(SupplyProduct::class, 'supplieable');
    }
}
