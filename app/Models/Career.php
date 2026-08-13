<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $primaryKey = 'CR_Id';

    protected $fillable = [
        'CT_Id',
        'SC_Id',
        'Role_Id',
        'VR_Id',
        'CR_Name',
        'CR_Location',
        'CR_SalaryRange',
        'CR_Img',
        'CR_Type',
        'CR_Company',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'CT_Id', 'CT_Id');
    }

     public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'SC_Id', 'SC_Id');
    }

       public function applications()
    {
        return $this->hasMany(CareerApplication::class, 'CR_Id', 'CR_Id');
    }
}
