<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function selldetails()
    {
        return $this->hasMany(SellDetail::class,'order_id');
    }
}
