<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
    *@SWG\Swagger(
    *  basePath="/api",
    *  @SWG\Info(
    *    title="Week-13-Assignment",
    *    version="1.0.0"
    *    )
    * )
    */
    public function sendResponse($result, $message)
    {
      $response = [
        'success' => true,
        'message' => $message,
        'data' => $result

      ];

      return response()->json($response, 200);
    }

    public function sendError($error, $errorMessage = [], $code)
    {
      $response = [
        'success' => false,
        'message' => $error
      ];

      if(!empty($errorMessage))
      {
        $response['data'] = $errorMessage;
      }

      return response()->json($response, $code);
    }
}
