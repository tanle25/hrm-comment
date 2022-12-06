<?php

use Carbon\Carbon;

if(!function_exists('hrmFormatTime')){
     function hrmFormatTime($t)
    {
        # code...
        $time = Carbon::parse($t);
        $diff = $time->diff(Carbon::now());
        // dd($diff);
        if($diff->d > 7){
            return $time->format('H:i d-m-Y');
        }else{
            if($diff->d > 0){
                return "$diff->d ngày $diff->h giờ trước";
            }else{
                if($diff->h > 0){
                    return "$diff->h giờ $diff->i phút trước";
                }else{
                    return "$diff->i phút trước";
                }
            }
        }
    }
}
