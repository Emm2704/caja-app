<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name', 'customer_document', 'razon_social', 'nit', 'total'];

    public function details()
    {
        return $this->hasMany(SaleDetail::class);
    }
}
