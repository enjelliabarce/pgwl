<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ApiController extends Controller
{
    //http://localhost:8080/geoserver/diy/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=diy%3Apendidikan1&maxFeatures=50&outputFormat=application%2Fjson

    public function fetchData()
    {
        // wfsURL = "http://localhost:8080/geoserver/diy/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=diy%3Apendidikan1&maxFeatures=50&outputFormat=application%2Fjson";
        $wfsUrl = "http://localhost:8080/geoserver/diy/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=diy%3Apendidikan1&maxFeatures=50&outputFormat=application%2Fjson";

        try {
            $response = Http::withoutVerifying()->get($wfsUrl);

            if ($response->successful()) {
                return $response->json();
            } else {
                return response()->json(['error' => 'Failed to fetch data from NASA FIRMS'], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Exception occurred: ' . $e->getMessage()], 500);
        }
    }
}
