<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Post;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $category = Category::get();
        View::share('category', $category);

        $product = Product::get();
        View::share('product', $product);

        $product_limit = Product::limit(3)->get();
        View::share('product_limit', $product_limit);
        
        $banner = Banner::get();
        View::share('banner', $banner);

        $post = Post::get();
        View::share('post', $post);
    }
}
