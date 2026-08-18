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
        'VR_Id',
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
    
    public function getDisplayGalleryAttribute()
    {
        $d = $this->PR_Details;
        return collect([$d['Main Image'] ?? null, $d['Image 1'] ?? null, $d['Image 2'] ?? null, $d['Image 3'] ?? null])
            ->filter()
            ->map(fn($img) => asset('storage/uploads/products/' . $img))
            ->values();
    }

    public function getDisplayTitleAttribute()
    {
        $d = $this->PR_Details;
        return $d['Property Title'] ?? $d['Vehicle Title'] ?? $d['Title'] ?? 'Untitled';
    }

    public function getDisplayPriceAttribute()
    {
        $d = $this->PR_Details;
        return isset($d['Price']) ? 'AED ' . number_format((float) $d['Price']) : 'Price on Request';
    }

    public function getDisplayBadgeAttribute()
    {
        return $this->subcategory?->SC_Name ?? $this->category?->CT_Name ?? 'Product';
    }
}
