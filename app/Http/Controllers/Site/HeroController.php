<?php

namespace App\Http\Controllers\Site;

use App\Events\VoteAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\HeroRequest;
use App\Models\Country;
use App\Models\Hero;
use App\Traits\ImageUploadAble;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HeroController extends Controller
{

    use ImageUploadAble;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $country
     * @return Application|Factory|View|Response
     */
    public function create()
    {

        $data['countries'] = Country::all();
        return view('site.pages.hero.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param HeroRequest $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(HeroRequest $request)
    {
        try {

            $full_name = $request->first_name;
            if ($request->middle_name != null) {
                $full_name .= ' ' . $request->middle_name;
            }
            $full_name .= ' ' . $request->last_name;
            $hero = new Hero();
            $hero->first_name = $request->first_name;
            $hero->middle_name = $request->middle_name;
            $hero->last_name = $request->last_name;
            $hero->full_name = $full_name;
            $hero->slug = Str::slug($full_name);
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

            toast('Your Hero is added. Need Approval from Admin!', 'success');
            return redirect()->route('country.show', $hero->country->name);
        } catch (\Throwable $e) {
            alert()->error($e->getMessage());

        }
        return redirect()->back()->withInput($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return Response
     */
    public function show($slug)
    {
        $hero = Hero::where('slug', $slug)->first();

        return view('site.pages.hero.show', compact('hero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param HeroRequest $request
     * @param int $id
     * @return Response
     */
    public function update(HeroRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function vote(Request $request, $id)
    {
        $hero = Hero::findOrFail($id);

        $user_has_voted = DB::table('hero_user')->where('user_id', Auth::id())->first();

//        if ($hero->users->contains(Auth::id())) {
        if ($user_has_voted) {
            return response()->json(false);
        } else {
            $hero->votes++;
            $hero->save();

            $hero->users()->attach(Auth::id());

            broadcast(new VoteAction($id))->toOthers();

            return response()->json(true);
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function voteFromSelection(Request $request)
    {
        $hero = Hero::findOrFail($request->id);

        $user_has_voted = DB::table('hero_user')->where('user_id', Auth::id())->first();

//        if ($hero->users->contains(Auth::id())) {
        if ($user_has_voted) {
            toast('You can vote only once to any one hero.', 'warning');
            return redirect()->back();
        } else {
            $hero->votes++;
            $hero->save();

            $hero->users()->attach(Auth::id());

            return redirect()->route('index');
        }
    }
}
