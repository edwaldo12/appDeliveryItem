<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;
    protected $table = "goods";
    public function incoming_goods()
    {
        return $this->hasMany(IncomingGood::class, "good_id");
    }
    public function pre_orders()
    {
        return $this->hasMany(PreOrder::class, "good_id");
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, "supplier_id");
    }
}
