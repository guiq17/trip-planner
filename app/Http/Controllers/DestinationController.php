<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Travel;
use App\Http\Requests\TravelRequest;
use App\Http\Requests\DestinationRequest;
use Illuminate\Support\Facades\Auth;
use Datetime;
use Illuminate\Support\Facades\DB;

class DestinationController extends Controller
{
    public function index($travel_id)
    {
        $travel = Travel::with('destinations')->where('id', $travel_id)->first();
        $grouped_travels = $travel->destinations->sortBy('date')->groupBy('date');
        return view('destination', [
            'travel' => $travel,
            'grouped_travels' => $grouped_travels,
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
            'travel_id' => $request['travel_id'],
            'title' => $title,
            'date' => new DateTime($date),
            'time' => new DateTime($time),
            'memo' => $memo,
        ]);
        return redirect()->route('destination.index', ['travel_id' => $request['travel_id']]);
    }

    public function update(DestinationRequest $request)
    {
        Destination::where('id', $request['destination_id'])->update([
            'title' => $request['title'],
            'date' => $request['date'],
            'time' => $request['time'],
            'memo' => $request['memo'],
        ]);
        return redirect()->route('destination.index', ['travel_id' => $request['travel_id']]);
    }

    public function remove(Request $request)
    {
        Destination::find($request->id)->delete();
        return redirect()->route('destination.index', ['travel_id' => $request->travel_id]);
    }
}
