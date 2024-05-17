<?php

namespace App\Services;

use App\Models\Kid;
use GuzzleHttp\Client;

class KidsService
{
    public function getKids()
    {
        return Kid::all();
    }
    public function getKid($id)
    {
        return Kid::find($id)->first();
    }
    public function addKid($data)
    {
        $last_index = Kid::max('index');
        $current_index = $last_index + 1;

        // Create a Guzzle client instance
        $client = new Client();

        // Make a POST request to the external API
        $response = $client->post('https://12c9-156-214-234-11.ngrok-free.app/Add', [
            'multipart' => [
                [
                    'name'     => 'image',
                    'contents' => fopen($data->image->getPathname(), 'r'), // Assuming $data->image is the image file
                ],
                [
                    'name'     => 'user_id',
                    'contents' => $current_index,
                ],
                [
                    'name'     =>'gender',
                    'contents' =>$data->gender,
                ],
            ],
            'verify' => false, // Disable SSL verification
        ]);

        // Get response body
        $responseBody = $response->getBody()->getContents();


        $responseData = json_decode($responseBody, true);

        $kid = Kid::create([
           'index'=>$current_index,
           'SSN'=>$data->SSN,
           'first_name'=>$data->first_name,
            'last_name'=>$data->last_name,
            'gender'=>$data->gender,
            'birthDate'=>$data->birthDate,
            'doctor_id'=>auth()->user()->id,
        ]);

        return $kid;
    }
    public function search($image)
    {

        // Create a Guzzle client instance
        $client = new Client();
        $response = $client->post('https://12c9-156-214-234-11.ngrok-free.app/search', [
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
        return $kid;
    }

    public function searchBySSN($SSN)
    {

        $kids = Kid::where('SSN', 'like', '%' . $SSN . '%')->get();
        // Calculate Levenshtein distance for each SSN
        foreach ($kids as $kid) {
            $kid->similarity = levenshtein($SSN, $kid->SSN);
        }
        return $kids->sortBy('similarity');
    }
}
