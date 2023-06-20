<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class post
{   


    Public static function all ()

    {
        return File::files(resource_path("posts"));

    }
    public static function find($slug)
    {    
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }

        return cache()->remember("post.{$slug}", 360, fn() => file_get_contents($path));
    }
}
