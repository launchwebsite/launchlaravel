<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table      = 'categories';
    protected $primaryKey = 'CT_Id';

    protected $fillable = [
        'CT_Name',
        'CT_Img',
    ];

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'CT_Id', 'CT_Id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'CT_Id', 'CT_Id');
    }
}
