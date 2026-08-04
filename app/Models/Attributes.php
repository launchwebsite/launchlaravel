<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    use HasFactory;
    protected $primaryKey = 'AT_Id';

    protected $fillable = [
        'CT_Id',
        'SC_Id',
        'AT_Inputs',
        'AT_Structure',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'CT_Id', 'CT_Id');
    }

     public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'SC_Id', 'SC_Id');
    }
}
