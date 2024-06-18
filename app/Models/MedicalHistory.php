<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'specialNeeds',
        'chronicConditions',
        'bloodType',
        'previousSurgeries',
        'allergies',
        'kid_id',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function kid()
    {
        return $this->belongsTo(Kid::class,'kid_id');
    }
}
