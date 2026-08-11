<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'PR_Id';

    protected $fillable = [
        'CT_Id',
        'SC_Id',
        'PR_Details',
        'Role_Id',
        'VR_Id'
    ];

    protected $casts = [
        'PR_Details' => 'array',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'VR_Id', 'VR_Id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'CT_Id', 'CT_Id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'SC_Id', 'SC_Id');
    }
}
