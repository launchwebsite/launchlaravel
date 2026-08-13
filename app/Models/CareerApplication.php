<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerApplication extends Model
{
    use HasFactory;

    protected $primaryKey = 'CA_Id';

    protected $fillable = [
        'CR_Id',
        'CA_Name',
        'CA_Email',
        'CA_Phone',
        'CA_JobType',
        'CA_Resume',
    ];

    public function career()
    {
        return $this->belongsTo(Career::class, 'CR_Id', 'CR_Id');
    }
}
