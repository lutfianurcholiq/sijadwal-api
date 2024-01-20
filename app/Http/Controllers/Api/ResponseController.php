<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    /**
     * success response method
     * @param $result
     * @param $message
     * @param $code
     * @return \Illuminate\Http\Response
     */
    public function sendResponse ($result, $message, $code) 
    {
        $response = [
            'status' => true,
            'message' => $message,
            'data' => $result
        ];

        return response()->json($response, $code);
    }

    /**
     * error response method
     * 
     * @return \Illuminate\Http\Response
     */
    public function sendErrorResponse($result, $message, $code)
    {
        if (!$result) {
            
            $response = [
                'status' => false,
                'message' => $message,
            ];
    
            return response()->json($response, $code);
        }

        $response = [
            'status' => false,
            'message' => $message,
            'error' => $result
        ];

        return response()->json($response, $code);
    }
}
