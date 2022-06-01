<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\XmlData;

class ReadXmlController extends Controller
{
    public function index(Request $req)
    {
        if($req->isMethod("POST")){

            XmlData::truncate();
            $xmlDataString = file_get_contents(public_path('spotify_data.xml'));
            $xmlObject = simplexml_load_string($xmlDataString);
                    
            $json = json_encode($xmlObject);
            $phpDataArray = json_decode($json, true); 
    
            // echo "<pre>";
            // print_r($phpDataArray);

            if(count($phpDataArray['row']) > 0){

                $spotifiescsv = array();
                
                foreach($phpDataArray['row'] as $index => $data){

                        $spotifiescsv[] = [
                            'Position' => $data['Position'],
                            'Track Name' => $data['TrackName'],
                            'Artist' => $data['Artist'],
                            'Streams' => $data['Streams'],
                            'Date' => \Carbon\Carbon::parse($data['Date'])
                    ];
                }

                XmlData::insert($spotifiescsv);
                

                return back()->with('success','Data saved successfully!');
            }
        }

        return view("xml-data");
    }
}