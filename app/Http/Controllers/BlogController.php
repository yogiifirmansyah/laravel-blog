<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::filter(request(['search', 'category', 'author']))->latest();

        return view(
            'blogs',
            [
                'title' => 'Blog Page',
                'blogs' => $blogs->paginate(9)->withQueryString()
            ]
        );
    }

    public function show(Blog $blog)
    {
        return view('blog', [
            'title' => $blog->title,
            'blog' => $blog
        ]);
    }
}
