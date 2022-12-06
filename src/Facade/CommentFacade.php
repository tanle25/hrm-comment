<?php

namespace Hrm\LaravelComment\Facade;

use Illuminate\Support\Facades\Facade;

class CommentFacade extends Facade{
    public static function getFacadeAccessor(){
        return 'hrm-comment';
    }
}
