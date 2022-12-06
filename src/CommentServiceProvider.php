<?php

namespace Hrm\LaravelComment;

use Hrm\LaravelComment\Facade\Comment;
use Hrm\LaravelComment\Livewire\FormComponent;
use Hrm\LaravelComment\Livewire\ReplyComponent;
use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        Livewire::component('form-component', FormComponent::class);
        Livewire::component('reply-component', ReplyComponent::class);
    }

    public function register()
    {
        $this->app->bind('hrm-comment', function(){
            return new Comment();
        });
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
        $this->publishes([__DIR__.'/Views'=>resource_path('views/vendor/hrm/comment','view')],'views');
        $this->publishes([__DIR__.'/Emotions'=>storage_path('app/public/emotions','emotions')],'emotions');
        $this->publishes([__DIR__.'/Config'=>config_path()],'config');
        // $this->publishes([__DIR__.'/Public/js'=>public_path('js','js')],'public');
        $this->publishes([__DIR__.'/Public/images'=>public_path('images','image')],'public');
    }
}
