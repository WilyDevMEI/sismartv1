<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealProduct extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function dealable()
    {
        return $this->morphTo();
    }
}
