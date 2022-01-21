<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Hero;
use App\Models\Page;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function showSelectCountryPage()
    {
        $countries = Country::query();

        if (request()->has('keyword')) {
            $countries->where('name', 'LIKE', request('keyword') . '%');
        }

        $data['countries'] = $countries->get();
        $data['meta'] = Page::where('slug', 'home')->first();
        return view('site.pages.filter.select_country', $data);
    }

    public function filter()
    {
        $heroes = Hero::query();

        if (request()->has('country')) {
            $heroes->whereIn('country_id', request('country'));
        }

        if (request()->has('keyword')) {
            $heroes->where('first_name', 'LIKE', '%' . request('keyword') . '%');
        }

        $heroes = $heroes->paginate(20);
        $data['heroes'] = $heroes;
        $data['meta'] = Page::where('slug', 'home')->first();
        $data['countries'] = Country::all();
        return view('site.pages.filter.result', $data);
    }
}
