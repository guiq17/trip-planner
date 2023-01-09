<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travel;
use App\Http\Requests\TravelRequest;
use Illuminate\Support\Facades\Auth;
use Datetime;

class TravelController extends Controller
{
    public function index()
    {
        $travels = Travel::all();
        return view('index', [
            'travels' => $travels
        ]);
    }

    public function create(TravelRequest $request)
    {
        $start_date = $request['start_date'];
        $end_date = $request['end_date'];
        $user = Auth::user();
        $title = $request['title'];
        Travel::create([
            'user_id' => $user->id,
            'title' => $title,
            'start_date' => new DateTime($start_date),
            'end_date' => new DateTime($end_date),
        ]);
        return redirect('/');
    }

    public function update(TravelRequest $request)
    {
        Travel::where('id', $request->id)->update([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return redirect('/');
    }

    public function remove(Request $request)
    {
        Travel::find($request->id)->delete();
        return redirect('/');
    }
}
