<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'VR_Id',
        'PR_Id',
        'merchant_reference_id',
        'geidea_session_id',
        'geidea_order_id',
        'amount',
        'currency',
        'status',
        'raw_response',
        'paid_at',
    ];

    protected $casts = [
        'raw_response' => 'array',
        'paid_at' => 'datetime',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'VR_Id', 'VR_Id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'PR_Id', 'PR_Id');
    }
}
