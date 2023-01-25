<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function relationship()
    {
        return $this->hasMany(Relationship::class);
    }

    public function mapping()
    {
        return $this->hasMany(Mapping::class);
    }

    public function introduction()
    {
        return $this->hasMany(Introduction::class);
    }
    public function plantest()
    {
        return $this->hasMany(Plantest::class);
    }
    public function quotation()
    {
        return $this->hasMany(Quotation::class);
    }
    public function maintenance()
    {
        return $this->hasMany(Maintenance::class);
    }
}
