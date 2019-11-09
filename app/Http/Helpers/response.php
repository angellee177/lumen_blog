<?php 

namespace App\Http\Helpers;

class response {
    public static function result($status ='', $data = '', $message = '')
    {
        return {
            'status'->status;
            'message'->$message;
            'data'->$data;
        }
    }
}