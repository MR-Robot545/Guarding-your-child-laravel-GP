<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kid;
use App\Trait\ApiResponseTrait;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class KidController extends Controller
{
    //
    use ApiResponseTrait;
    public function search(Request $request)
    {

        // Create a Guzzle client instance
        $client = new Client();

        // Get the file from the request
        $image = $request->file('image');
        try {

            $response = $client->post('https://3922-156-214-44-171.ngrok-free.app/search', [
                'multipart' => [
                    [
                        'name'     => 'image',
                        'contents' => fopen($image->getPathname(), 'r'),
                    ],
                ],
                'verify' => false, // Disable SSL verification
            ]);



            $responseBody = $response->getBody()->getContents();
            $responseData = json_decode($responseBody, true);


            $index = $responseData['index'];
            $kid = Kid::where('index',$index)->with('guardian')->get();
            return $this->apiResponse($kid,"Search Done Successfully",200);
        } catch (\Exception $e) {
            // Handle any exceptions, for example, return an error response
            return response($e->getMessage(),404,["ok"]);

        }
    }
}
