<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Post;
use App\Traits\ImageUploadAble;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;

class PostController extends Controller
{
    use ImageUploadAble;

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $data['posts'] = Post::all();
        return view('admin.post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $post = Post::create($request->except('image', '_token'));

        if ($request->has('image')) {
            if ($request->image instanceof UploadedFile) {
                $path = $this->uploadImage($request->image, 'posts/', 1000, 400);
                $data = new Image(['path' => $path]);
                $post->image()->save($data);
            }
        }
        toast('Post Added', 'success');
        return redirect()->route('admin.post');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Application|Factory|View|Response
     */
    public function show($id)
    {
        $data['post'] = Post::findOrFail($id);
        return view('admin.post.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View|Response
     */
    public function edit($id)
    {
        $data['post'] = Post::findOrFail($id);
        return view('admin.post.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->except('image', '_token'));

        if ($request->hasFile('image')) {
            if ($request->image instanceof UploadedFile) {
                $this->deleteImage($post->image->path);
                $post->image()->delete();

                $path = $this->uploadImage($request->image, 'posts/', 1000, 400);
                $data = new Image(['path' => $path]);
                $post->image()->save($data);
            }
        }

        toast('Post Updated', 'success');
        return redirect()->route('admin.post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->image) {
            $this->deleteImage($post->image->path);
            $post->image()->delete();
        }

        $post->delete();

        toast('Post Deleted', 'success');
        return redirect()->route('admin.post');
    }
}
