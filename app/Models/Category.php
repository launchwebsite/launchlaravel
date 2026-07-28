<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'CT_Id';

    protected $fillable = [
        'CT_Name',
        'CT_Img',
    ];
}
