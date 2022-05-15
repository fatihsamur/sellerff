<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketplace extends Model
{
    use HasFactory;

    public $table = "service_marketplaces";

    public $guarded = [];

    public function order_items()
    {
        return $this->belongsTo(OrderItem::class);
    }
}
