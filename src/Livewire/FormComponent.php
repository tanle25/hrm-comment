<?php

namespace Hrm\LaravelComment\Livewire;

use Hrm\LaravelComment\Models\Comment;
use Hrm\LaravelComment\Models\ReactComment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormComponent extends Component{

    public $content, $model, $amount = 5;
    public $comments, $showReplyForm = false;
    public $emotion, $reactComment, $replyTo=null;
    public $comment = null, $replyContent;
    protected $listeners = ['refresh' => 'refresh','hasMore'=>'hasMore'];

    public function mount($model)
    {
        # code...
        // dd($model);
        $this->content='';
        $this->model = $model;
        $this->comments = $model->comments->sortByDesc('created_at')->take($this->amount);
    }
    public function refresh()
    {
        # code...
        $this->model->refresh();
    }

    public function load()
    {
        # code...
        $this->amount +=5;
        $this->comments = $this->model->comments->sortByDesc('created_at')->take($this->amount);

    }
    public function submit()
    {

        // dd($this->content);
        $this->model->comments()->create([
            'user_id'=>Auth::user()->id,
            'content'=>$this->content
        ]);

        $this->model->refresh();
        $this->comments = $this->model->comments->sortByDesc('created_at')->take($this->amount);
        $this->content = '';
    }

    public function showReply($model)
    {
        # code...
        $this->replyTo = Comment::find($model);
        $this->showReplyForm = true;
    }

    public function reply()
    {
        # code...
        $this->replyTo->comments()->create([
            'user_id'=>Auth::user()->id,
            'content'=>$this->replyContent,
        ]);
        $this->replyContent = '';
        $this->model->refresh();
        $this->comments = $this->model->comments->sortByDesc('created_at')->take($this->amount);

    }
    public function reaction()
    {
        $emotion = $this->emotion;
        $comment= Comment::find($this->reactComment);
        if($comment->reacts()->where('user_id',Auth::user()->id)->where('react',$emotion)->first()){
            $comment->reacts()->where('user_id',Auth::user()->id)->where('react',$emotion)->first()->delete();
        }else{
            $comment->reacts()->updateOrCreate([
                'user_id'=>Auth::user()->id,
                'comment_id'=>$this->reactComment,
            ],[
                'react'=>$this->emotion
            ]);
        }

        $this->model->refresh();
        $this->comments = $this->model->comments->sortByDesc('created_at')->take($this->amount);
        $this->emit('reloadContent');
    }

    public function render()
    {
        # code...
        return view('vendor.hrm.comment.form-component');
    }



}
