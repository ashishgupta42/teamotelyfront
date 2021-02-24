<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Session;

class CsvController extends Controller
{
    //

    public function teamotleycsv()
    {
    	# code...
    	return view('csv');
    }

    public function submitcsvform(Request $request)
    {
    	if ($request->has('submit')) {
            $data  = $request->all();
            $rules = ['csvdata' => 'required'];
            $customMessages = ['csvdata.required'  => 'Please enter csv data'];
            $validator = Validator::make($data, $rules, $customMessages);
            if(!$validator->fails()) {
                $hashedVal = Hash::make('AshishguptaTeamOtely434525');
            	$GetCsv = [
				    'Filter' => [
				        'hash_val' => $hashedVal,
				        'api_value' => $data['csvdata'],
				    ],
				];
                $client = new \GuzzleHttp\Client();
		        $apiCall = env('BASE_PATH_DB').'/api/teamotelycsv';        
		        $request1 = $client->post($apiCall,[
		        	'json' => $GetCsv,
				    'headers' => [
				        'Content-Type'     => 'application/json',
				        'Authorization'    => env('Auth_Key'),
				    ]
				]);
				echo $request1->getBody();exit;
				exit;
            }else{
                return redirect()->back()->withErrors($validator);
            }
        }else{
            return redirect()->back();
        }
    }
}
