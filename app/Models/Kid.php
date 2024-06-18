<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kid extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'index',
        'SSN',
        'first_name',
        'last_name',
        'gender',
        'birthDate',
        'doctor_id',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function guardian()
    {
        return $this->hasOne(Guardian::class,'kid_id');
    }

    public function medicalHistory()
    {
        return $this->hasOne(MedicalHistory::class,'kid_id');
    }
}
