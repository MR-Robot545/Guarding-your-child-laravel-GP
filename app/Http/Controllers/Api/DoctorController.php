<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddKidRequest;
use App\Http\Requests\UpdateKidRequest;
use App\Models\Kid;
use App\Services\GuardiansService;
use App\Services\KidsService;
use App\Trait\ApiResponseTrait;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    use ApiResponseTrait;

    public $kidService;
    public $guardianService;

    public function __construct(KidsService $kidService,GuardiansService $guardianService)
    {
        $this->kidService=$kidService;
        $this->guardianService=$guardianService;
    }

    public function get($id)
    {
        return $this->kidService->getKid($id);
    }

    public function allKids()
    {
        $kids =$this->kidService->getKids() ;
        return $this->apiResponse($kids,"Get All Kids Successfully",200);
    }

    public function addKid(AddKidRequest $addKidRequest)
    {

        $kid = $this->kidService->addKid($addKidRequest);
        $this->guardianService->addGuardians($addKidRequest,$kid->id);

        // Fetch the kid with its guardian
        $kidWithGuardian = Kid::with('guardian')->find($kid->id);


        if ($kidWithGuardian) {
            return $this->apiResponse($kidWithGuardian, 'Kid added successfully with guardian', 201);
        } else {
            return $this->apiResponse(null, 'There were some errors', 500);
        }
    }

    public function updateKid(UpdateKidRequest $updateKidRequest,$kid)
    {


        $message = $this->kidService->updateKid($updateKidRequest,$kid);

        $this->guardianService->updateGuardians($updateKidRequest,$kid);


        // Fetch the kid with its guardian
        $kidWithGuardian = Kid::with('guardian')->find($kid);


        if ($kidWithGuardian) {
            return $this->apiResponse($kidWithGuardian, $message, 201);
        } else {
            return $this->apiResponse(null, 'There were some errors', 500);
        }
    }

    public function search(Request $request)
    {
        $SSN = $request->SSN;
        $kids = $this->kidService->searchBySSN($SSN);
        return $this->apiResponse($kids,"Search Done Successfully",200);
    }
}
