<?php
namespace App\Http\Traits;

trait ResponseTrait{
    public function responseMessage($status= true, $error=null, $message = null){
        return [
            'response' => [
                'status' =>$status,
                'erros' =>$error,
                'message' => $message,
                'class' =>$status?'success':'danger'
            ]
        ];
    }
}