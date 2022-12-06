<?php

namespace Hrm\LaravelComment\Livewire;

use Hrm\LaravelComment\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReplyComponent extends Component
{
    public $comment, $content, $showForm = false;
    public $amount = 0, $comments, $replyTo = null;

    protected $listeners = ['showComment' => 'load','showForm'=>'showReplyForm','reloadContent'=>'reloadReact'];


    public function mount(Comment $comment)
    {
        # code...
        $this->comment = $comment;
        $this->comments = $comment->comments->take($this->amount);

    }



    public function load()
    {
        # code...
        $this->amount += 5;
        $this->comments = $this->comment->comments->take($this->amount);

    }

    public function showReplyForm($comment_id)
    {
        # code...
        $this->replyTo = Comment::find($comment_id);
        $this->showForm =true;
    }

    public function submit()
    {
        # code...
        $this->replyTo->comments()->create([
            'user_id'=>Auth::user()->id,
            'content'=>$this->content,
        ]);
        $this->comment->refresh();
        $this->comments = $this->comment->comments->sortByDesc('created_at')->take($this->amount);
        $this->content = '';
    }

    public function reloadReact()
    {
        # code...
        $this->comment->refresh();
    }

    public function render()
    {
        # code...
        return view('vendor.hrm.comment.reply-component');
    }
}
