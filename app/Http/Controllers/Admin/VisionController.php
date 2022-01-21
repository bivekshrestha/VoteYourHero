<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vision;
use Illuminate\Http\Request;

class VisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $data['visions'] = Vision::all();
        return view('admin.vision.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('admin.vision.create');
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
            'position' => 'required'
        ]);

        Vision::create($request->all());

        toast('Vision Created Successfully', 'success');
        return redirect()->route('admin.vision');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function edit($id)
    {
        $data['vision'] = Vision::findOrFail($id);

        return view('admin.vision.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'position' => 'required'
        ]);

        $vision = Vision::findOrFail($id);

        $vision->update($request->all());

        toast('Vision Updated Successfully', 'success');
        return redirect()->route('admin.vision');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $vision = Vision::findOrFail($id);

        $vision->delete();

        toast('Vision Deleted Successfully', 'success');
        return redirect()->route('admin.vision');
    }
}
