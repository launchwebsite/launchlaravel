<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
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
    ];
}
