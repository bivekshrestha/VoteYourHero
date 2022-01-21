<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $data['posts'] = Post::paginate(8);
        $data['meta'] = Page::where('slug', 'team')->first();
        return view('site.pages.post.index', $data);
    }

    /**
     * @param $slug
     * @return Application|Factory|View
     */
    public function show($slug)
    {
        $data['post'] = Post::where('slug', $slug)->first();

        return view('site.pages.post.show', $data);
    }
}
