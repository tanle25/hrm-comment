<?php

namespace Hrm\LaravelComment\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Hrm\LaravelComment\Traits\HasComments;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, HasComments;
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
