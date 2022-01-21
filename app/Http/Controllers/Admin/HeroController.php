<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeroRequest;
use App\Models\Country;
use App\Models\Hero;
use App\Traits\ImageUploadAble;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HeroController extends Controller
{
    use ImageUploadAble;

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $data['heroes'] = Hero::orderBy('first_name')->where('is_verified', true)->get();
        return view('admin.hero.index', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function unverified()
    {
        $data['heroes'] = Hero::orderBy('first_name')->where('is_verified', false)->get();
        return view('admin.hero.unverified', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $data['countries'] = Country::all();
        return view('admin.hero.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param HeroRequest $request
     * @return RedirectResponse
     */
    public function store(HeroRequest $request)
    {

        $hero = new Hero();
        $hero->first_name = $request->first_name;
        $hero->middle_name = $request->middle_name;
        $hero->last_name = $request->last_name;
        $hero->slug = Str::slug($request->first_name . $request->last_name);
        $hero->profession = $request->profession;
        $hero->country_id = $request->country_id;
        $hero->identity = $request->identity;
        $hero->contribution = trim($request->contribution);

        $photo = $request->photo;

        if ($photo) {
            $fileName = md5(microtime()) . '.' . $photo->getClientOriginalExtension();
            $filePath = $photo->storeAs('heroes', $fileName, 'public');
            $hero->photo = '/storage/' . $filePath;
        }

        $hero->save();

        $hero->slug = $hero->slug . $hero->id;
        $hero->save();

        toast('Hero successfully created', 'success');

        return redirect()->route('admin.hero');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['hero'] = Hero::findOrFail($id);
        $data['countries'] = Country::all();
        return view('admin.hero.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param HeroRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(HeroRequest $request, $id)
    {
        $hero = Hero::findOrFail($id);
        $hero->first_name = $request->first_name;
        $hero->middle_name = $request->middle_name;
        $hero->last_name = $request->last_name;
        $hero->slug = Str::slug($request->first_name . $request->last_name);
        $hero->profession = $request->profession;
        $hero->country_id = $request->country_id;
        $hero->identity = $request->identity;
        $hero->contribution = trim($request->contribution);

        $photo = $request->photo;

        if ($photo instanceof UploadedFile) {

            if (Storage::exists('public/' . $hero->photo)) {
                Storage::delete('public/' . $hero->photo);
            }

            $fileName = md5(microtime()) . '.' . $photo->getClientOriginalExtension();
            $filePath = $photo->storeAs('heroes', $fileName, 'public');
            $hero->photo = '/storage/' . $filePath;
        }

        $hero->save();

        $hero->slug = $hero->slug . $hero->id;
        $hero->save();

        toast('Hero successfully created', 'success');

        return redirect()->route('admin.hero');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $hero = Hero::findOrFail($id);

        if (Storage::exists('public/' . $hero->photo)) {
            Storage::delete('public/' . $hero->photo);
        }

        $hero->delete();

        toast('Hero Deleted Successfully', 'success');
        return redirect()->route('admin.hero');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function verify($id)
    {
        $hero = Hero::findOrFail($id);
        $hero->is_verified = true;
        $hero->save();

        toast('Hero Verified Successfully', 'success');
        return redirect()->route('admin.hero.unverified');
    }
}
