<?php

namespace App\Services;

use App\Models\Guardian;

class GuardiansService
{
    public function addGuardians($data,$kidID)
    {
        Guardian::create([
            'SSN_father'=>$data->SSN_father,
            'father_name'=>$data->father_name,
            'SSN_mother'=>$data->SSN_mother,
            'mother_name'=>$data->mother_name,
            'address'=>$data->address,
            'phone'=>$data->phone,
            'kid_id'=>$kidID,
        ]);

    }
}
