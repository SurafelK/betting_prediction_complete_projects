<?php

namespace App\Http\Controllers;

use App\Models\Leagues;
use App\Http\Requests\StoreLeaguesRequest;
use App\Http\Requests\UpdateLeaguesRequest;
use App\Models\Countries;
use Illuminate\Http\Request;

class LeaguesController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name' => "required|unique:Leagues",
            'level' => "required",
            "country" => "required"
        ]);

        $league = new Leagues();

        $league->name = $request->name;
        $league->level = $request->level;
        $league->country = $request->country;
        $league->created_at = now();

        $league->save();

        $country = Countries::find($request->country);

        if($league)
        {
            return response()->json([
                'status' => "sucessful",
                "message" => "League has successfully created",
                "league" => $league,
                'country' => $country
            ]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|unique:Leagues",
            'level' => "required",
            "country" => "required"
        ]);

        $league = new Leagues();

        $league->name = $request->name;
        $league->level = $request->level;
        $league->country = $request->country;

        $league->save();

        return redirect('/admin');
    }
}
