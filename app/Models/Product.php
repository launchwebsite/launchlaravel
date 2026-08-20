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
            ->filter(fn($img) => file_exists(public_path('storage/uploads/products/' . $img)))
            ->map(fn($img) => asset('storage/uploads/products/' . $img))
            ->values();
    }

    public function getDisplayTitleAttribute()
    {
        $d = $this->PR_Details;
        $title = $d['Property Title'] ?? $d['Vehicle Title'] ?? $d['Title'] ?? $d['Main Title'] ?? null;
        
        if (!$title) {
            if (isset($d['Brand']) || isset($d['Model'])) {
                $title = trim(($d['Brand'] ?? '') . ' ' . ($d['Model'] ?? ''));
            } elseif (isset($d['Bed Type'])) {
                $title = $d['Bed Type'];
            } elseif (isset($d['Sofa Type'])) {
                $title = $d['Sofa Type'];
            } elseif (isset($d['Table Type'])) {
                $title = $d['Table Type'];
            } elseif (isset($d['Wardrobe Type'])) {
                $title = $d['Wardrobe Type'];
            }
        }

        return $title ?: 'Ad #' . $this->PR_Id;
    }

    public function getDisplayLocationAttribute()
    {
        $d = $this->PR_Details;
        return $d['City'] ?? $d['Location'] ?? $d['Area'] ?? 'UAE';
    }

    public function getDisplayPriceAttribute()
    {
        $d = $this->PR_Details;
        $priceStr = $d['Price'] ?? null;
        if (empty($priceStr)) {
            return 'Price on Request';
        }
        
        $priceNum = (float) preg_replace('/[^0-9.]/', '', $priceStr);
        return $priceNum > 0 ? 'AED ' . number_format($priceNum) : 'Price on Request';
    }

    public function getDisplayBadgeAttribute()
    {
        return $this->subcategory?->SC_Name ?? $this->category?->CT_Name ?? 'Product';
    }
}
