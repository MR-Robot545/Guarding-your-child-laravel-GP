<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    protected $fillable = [
        'SSN_father',
        'father_name',
        'SSN_mother',
        'mother_name',
        'address',
        'phone',
        'kid_id',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function kid()
    {
        return $this->belongsTo(Kid::class,'kid_id');
    }
}
