<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function search()
    {

        if (request('type') == 'country') {
            return Country::select('id', 'name', 'slug')
                ->where('name', 'LIKE', request('keyword') . '%')
                ->get();
        } else {
            return Hero::select('id', 'country_id', 'photo', 'slug', 'full_name')
                ->where('full_name', 'LIKE', request('keyword') . '%')
                ->with('country:id,name')
                ->get();
        }
    }
}
