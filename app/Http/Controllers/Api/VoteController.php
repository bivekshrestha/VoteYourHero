<?php

namespace App\Http\Controllers\Api;

use App\Events\VoteAction;
use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * @param $id
     * @return bool
     */
    public function vote($id): bool
    {
        Hero::where('id', $id)->increment('votes');

        broadcast(new VoteAction($id))->toOthers();

        return true;
    }
}
