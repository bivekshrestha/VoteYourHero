<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Hero;
use App\Models\Page;
use App\Models\Setting;
use App\Models\Team;
use App\Models\Vision;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PagesController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $un = Country::with('heroes')
            ->with('sponsors')
            ->with('producers')
            ->orderBy('name')
            ->take(20)->get();

        $un = $un->each(function ($country) {
            $country->topHeroes = $country->heroes->take(3);
            unset($country->heroes);
        });

        $all = Country::with('heroes')
            ->with('sponsors')
            ->with('producers')
            ->orderBy('name')
            ->get();

        $all = $all->each(function ($country) {
            $country->topHeroes = $country->heroes->take(20);
            unset($country->heroes);
        });

        $countries['un'] = $un;
        $countries['all'] = $all;

        $data['countries'] = $countries;
        $data['meta'] = Page::where('slug', 'home')->first();
        return view('site.pages.home.index', $data);
    }

    /**
     * @return Application|Factory|View
     */
    public function vote()
    {
        $data['heroes'] = Hero::where('is_verified', 1)->get();
        $data['meta'] = Page::where('slug', 'vote')->first();
        return view('site.pages.vote', $data);
    }

    /**
     * @return Application|Factory|View
     */
    public function team()
    {
        $data['teams'] = Team::all()->groupBy('type');
        $data['meta'] = Page::where('slug', 'team')->first();
        return view('site.pages.team', $data);
    }

    /**
     * @return Application|Factory|View
     */
    public function vision()
    {
        $data['visions'] = Vision::orderBy('position')->get();
        $data['meta'] = Page::where('slug', 'vision')->first();
        return view('site.pages.vision', $data);
    }

    /**
     * @return Application|Factory|View
     */
    public function contact()
    {
        $data['meta'] = Page::where('slug', 'contact')->first();
        return view('site.pages.contact', $data);
    }

    /**
     * @return Application|Factory|View
     */
    public function privacy()
    {
        $data['meta'] = Page::where('slug', 'privacy')->first();
        return view('site.pages.privacy', $data);
    }

    /**
     * @return Application|Factory|View
     */
    public function help()
    {
        $data['meta'] = Page::where('slug', 'help')->first();
        return view('site.pages.help', $data);
    }

    public function loadMoreCountry()
    {
        $countries = Country::with('heroes')
            ->orderBy('name')
            //                    ->whereHas('heroes')
            ->paginate(20);


        $countries = $countries->each(function ($country) {
            $country->topHeroes = $country->heroes->take(3);
            unset($country->heroes);
        });
        $output = '';
        foreach ($countries as $country) {
            $output .= '<div class="col-12 col-md-6 mb-2">';
            $output .= View::make("components.cards.country-card")
                ->with("country", $country)
                ->render();
            $output .= '</div>';
        }

        return $output;
    }

    /**
     * @return Application|Factory|\Illuminate\Contracts\View\View|RedirectResponse
     */
    public function start()
    {
        $setting = Setting::where('key', 'is_started')->first();

        if ($setting->value == '0') {
            return view('site.pages.start');
        }

        return redirect()->route('index');
    }

    /**
     * @return RedirectResponse
     */
    public function startOk()
    {
        $setting = Setting::where('key', 'is_started')->first();
        $setting->value = '1';
        $setting->save();
        return redirect()->route('index');
    }
}
