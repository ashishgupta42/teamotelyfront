<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function teamotleyApi(Request $request)
    {
    	# code...
    	$books = array(
				    array(
				        "name",
				        "short_name",
				        "age",
				        "school"
				    ),
				    array(
				        "test test",
				        "test",
				        "1",
				        "KMD"
				    ),
				    array(
				        "test test 1",
				        "test 2",
				        "2",
				        "KMD"
				    ),
				    array(
				        "test test 2",
				        "test 3",
				        "3",
				        "KMD 3"
				    )
				);
    	$GetOrder = [
		    'Filter' => [
		        'access_key' => 'accessKeyVki478',
		        'api_value' => $books,
		    ],
		];
    	$client = new \GuzzleHttp\Client();
        $apiCall = env('BASE_PATH_DB').'/api/teamotelycall';
        $request1 = $client->post($apiCall,[
        	'json' => $GetOrder,
		    'headers' => [
		        'Content-Type'     => 'application/json',
		        'Authorization'    => env('Auth_Key'),
		    ]
		]); 
		echo $request1->getBody();exit;
		exit;		
    }
}
