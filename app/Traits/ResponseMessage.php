<?php

namespace App\Traits;

trait ResponseMessage {

    public function errors($statusCode, $errors){
        if($statusCode == 403){
            $name = 'forbidden';
        }
        else if($statusCode == 404){
            $name = 'not found';
        }
        else if($statusCode == 422){
            $name = 'unprocessable entity' ;
        }
        else if($statusCode == 401){
            $name = 'unauthorized';
        }
        else if($statusCode == 500){
            $name = 'Server ResponseMessage';
        }

        return response()->json([
            "message" => $statusCode . " " .$name,
            "errors" => $errors
        ], $statusCode);
    }

    public function success($data=null , $msg=null){
        $types = [
            'a' => 'تمت الاضافة بنجاح' ,
            'u' => 'تم التحديث بنجاح' ,
            'd' => 'تم الحذف بنجاح' ,
        ] ;
        if (isset($msg)){
            if (isset($types[$msg])){
                $msg = $types[$msg] ;
            }
        }
        return response()->json(['data' => $data , 'message' =>$msg ], 200);
    }

}
