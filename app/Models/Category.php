<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{

    use HasFactory;
    protected $primaryKey = 'CT_Id';

    protected $fillable = [
        'CT_Name',
        'CT_Img',
    ];
}
