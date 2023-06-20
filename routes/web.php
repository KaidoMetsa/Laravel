<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    $posts = Post::all();

    ddd($posts);
    
    return view('posts', [
        'posts' => $posts
    ]);
});

Route::get('post/{post}', function ($slug) {
    $post = Post::find($slug);
    return view('post', [
        'post' => $post
    ]);
})->where('post', '[A-z_\-]+');



/*     $path = __DIR__ . "/../resources/posts/{$slug}.html";

    if (!file_exists($path)) {
        return redirect('/');
    }

    $post = cache()->remember("post.{$slug}", 360, function () use ($path) {
        var_dump('file_get_contents');
        return file_get_contents($path);
    });

    return view('post', [
        'post' => $post
    ]); */
