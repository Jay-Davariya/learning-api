<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected function successResponse($data,$message='Success',$status= 201){
        return response()->json(['message'=>$message,
        'data'=>$data],201);
    }

    protected function errorResponse($data,$message='Not Found',$status= 403){
        return response()->json(['message'=>$message,
        'data'=>$data],403);

    }

}