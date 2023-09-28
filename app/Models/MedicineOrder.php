<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineOrder extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name', 'customer_address', 'phone', 'total_price'];

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'order_product')->withPivot('quantity');
    }

}
