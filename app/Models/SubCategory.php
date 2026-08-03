<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table      = 'sub_categories';
    protected $primaryKey = 'SC_Id';

    protected $fillable = [
        'CT_Id',
        'SC_Name',
        'SC_Img',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'CT_Id', 'CT_Id');
    }
}
