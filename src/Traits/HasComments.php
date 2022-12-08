<?php

namespace Hrm\LaravelComment\Traits;

use Hrm\LaravelComment\Models\Comment;

trait HasComments
{
    public function comments()
    {
        # code...
        return $this->morphMany(Comment::class, 'commentable');
    }
}
