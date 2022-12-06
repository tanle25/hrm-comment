<?php

namespace Hrm\LaravelComment;

use Hrm\LaravelComment\Facade\Comment;
use Hrm\LaravelComment\Livewire\FormComponent;
use Hrm\LaravelComment\Livewire\ReplyComponent;
use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

// include_once('hrm_time_helper.php');
class CommentServiceProvider extends ServiceProvider{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        Livewire::component('form-component', FormComponent::class);
        Livewire::component('reply-component', ReplyComponent::class);
        // if (File::exists(__DIR__ . '\hrm_time_helper.php')) {
        //     require __DIR__ . '\hrm_time_helper.php';
        // }

    }

    public function register()
    {
        $this->app->bind('hrm-comment', function(){
            return new Comment();
        });
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
        $this->publishes([__DIR__.'/Views'=>resource_path('views/vendor/hrm/comment','view')],'comments');
        $this->publishes([__DIR__.'/Emotions'=>storage_path('app/public/emotions','emotions')],'comments');
        $this->publishes([__DIR__.'/Config'=>config_path()],'comments');
        // $this->publishes([__DIR__.'/Public/js'=>public_path('js','js')],'public');
        $this->publishes([__DIR__.'/Public/images'=>public_path('images','image')],'comments');
        $this->publishes([__DIR__.'/Helper'=>app_path('Helper','helper')],'comments');
    }
}
