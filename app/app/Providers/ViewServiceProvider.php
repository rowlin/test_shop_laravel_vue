<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('common.footer', function($view) {
            $view->with(['tags' => \App\Models\Tag::all()->toArray() , 'posts' => \App\Models\Post::orderBy('updated_at' , 'DESC')->take(6)->get('name', 'id')->toArray()]);
        });
    }
}
