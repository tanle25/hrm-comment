<?php

namespace Hrm\LaravelComment\Models;

use App\Models\User;
use Hrm\LaravelComment\Traits\HasComment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory, HasComment;
    protected $guarded = ['id'];

    public function commentable()
    {
        # code...
        return $this->morphTo();
    }


    public function author()
    {
        # code...
        return $this->hasOne(User::class,'id','user_id');
    }

    public function reacts()
    {
        # code...
        return $this->hasMany(ReactComment::class);
    }
}
