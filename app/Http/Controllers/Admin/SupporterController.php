<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Supporter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SupporterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $data['supporters'] = Supporter::all();
        return view('admin.supporter.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $data['countries'] = Country::select('id', 'name')->get();
        return view('admin.supporter.create', $data);
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
            'name' => 'required|min:2',
            'type' => 'required',
            'country_id' => 'required',
        ]);

        Supporter::create($request->all());

        toast('Supporter Created Successfully', 'success');
        return redirect()->route('admin.supporter');
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
        $data['supporter'] = Supporter::findOrFail($id);
        $data['countries'] = Country::select('id', 'name')->get();

        return view('admin.supporter.create', $data);
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
        $supporter = Supporter::findOrFail($id);

        $supporter->update($request->all());

        toast('Supporter Updates Successfully', 'success');
        return redirect()->route('admin.supporter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $supporter = Supporter::findOrFail($id);

        $supporter->delete();

        toast('Supporter Deleted Successfully', 'success');
        return redirect()->route('admin.supporter');
    }
}
