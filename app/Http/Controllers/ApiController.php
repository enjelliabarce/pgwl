<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //http://localhost:8080/geoserver/diy/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=diy%3Apendidikan1&maxFeatures=50&outputFormat=application%2Fjson

    public function fetcData()
    {
        wfsURL = "http://localhost:8080/geoserver/diy/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=diy%3Apendidikan1&maxFeatures=50&outputFormat=application%2Fjson";
        
    }
}
