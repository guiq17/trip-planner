<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Travel;
use App\Http\Requests\TravelRequest;
use App\Http\Requests\DestinationRequest;
use Illuminate\Support\Facades\Auth;
use Datetime;

class DestinationController extends Controller
{
    public function index($travel_id)
    {
        $travel = Travel::with('destinations')->where('id', $travel_id)->first();
        return view('destination', [
            'travel' => $travel
        ]);
    }

    public function add($travel_id)
    {
        $travel = Travel::where('id', $travel_id)->first();
        return view('add', [
            'travel' => $travel
        ]);
    }

    public function create(DestinationRequest $request)
    {
        $title = $request['title'];
        $date = $request['date'];
        $time = $request['time'];
        $memo = $request['memo'];
        Destination::create([
            'title' => $title,
            'date' => new DateTime($date),
            'time' => new DateTime($time),
            'memo' => $memo,
        ]);
        return redirect('/destinations/{travel_id}');
    }

    public function update()
    {

    }

    public function remove()
    {

    }
}
