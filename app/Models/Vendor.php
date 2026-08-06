<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendor extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'VR_Id';

    protected $fillable = [
        'VR_Name',
        'VR_Email_1',
        'VR_Email_2',
        'VR_Phone',
        'VR_Password',
        'VR_Type',
        'VR_Status',
        'CT_Id',
    ];

    protected $casts = [
        'VR_Status' => 'integer',
    ];

    public function getAuthPassword()
    {
        return $this->VR_Password;
    }

    public function getAuthIdentifierName()
    {
        return 'VR_Id';
    }

     public function category()
    {
        return $this->belongsTo(Category::class, 'CT_Id', 'CT_Id');
    }
}
