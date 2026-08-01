<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $primaryKey = 'LS_Id';

    protected $fillable = [
        'VR_Id', 'CT_Id', 'SC_Id', 'LS_Title', 'LS_Price',
        'LS_City', 'LS_Country', 'LS_Attributes', 'LS_Status',
    ];

    protected $casts = [
        'LS_Attributes' => 'array',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'VR_Id', 'VR_Id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'CT_Id', 'CT_Id');
    }
}
