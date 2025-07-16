<?php

namespace App\Http\Controllers;

abstract class APIController
{
    public function __construct()
    {
        // to do
    }

    public function successResponse($data = [], $message = null)
    {
        return response()->json(['data' => $data, 'message' => $message]);
    }

    public function failResponse($message = "Something went wrong.", $status = 403)
    {
        return response()->json(['message' => $message], $status);
    }
}
