<?php

namespace Hrm\LaravelComment\Facade;

use Hrm\LaravelComment\Models\Comment as ModelsComment;

class Comment{

    public function script()
    {
        # code...
        return view('vendor.hrm.comment.script');
    }
}
