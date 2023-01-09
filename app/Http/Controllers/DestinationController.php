<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Travel;
use App\Http\Requests\DestinationRequest;
use Illuminate\Support\Facades\Auth;
use Datetime;

class DestinationController extends Controller
{
    public function index($travel_id)
    {
        //todo:旅詳細も併せて取得する(リレーションを使う)
        $travel = Travel::where('id', $travel_id);
        return view('destination', [
            'travel' => $travel
        ]);
    }

    public function add($travel_id)
    {
        $travel = Travel::where('id', $travel_id);
        return view('add', [
            'travel' => $travel
        ]);
    }

    public function create(DestinationRequest $request)
    {

    }

    public function update()
    {

    }

    public function remove()
    {

    }
}
