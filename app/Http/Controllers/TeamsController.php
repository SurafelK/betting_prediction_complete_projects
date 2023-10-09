<?php

namespace App\Http\Controllers;

use App\Models\Teams;
use App\Http\Requests\StoreTeamsRequest;
use App\Http\Requests\UpdateTeamsRequest;
use App\Models\Leagues;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:Teams',
            "league_id" => 'required',
            'team_logo' => "required"
        ]);

        $team = new Teams();

        $team->league_id = $request->league_id;
        $team->name = $request->name;
        $team->team_logo = $request->team_logo;
        $team->created_at = now();
        $league = Leagues::find($request->league_id);
        $team->save();

        if($team)
        {
            return response()->json([
                'status' => 'Successfull',
                'message' => 'Team Successfully created',
                'team' => $team,
                'league' => $league
            ],200);
        }

    }


    public function store(Request $request)
    {
        $request ->validate([
            'name' => 'required|unique:Teams',
            'league_id' => 'required'
        ]);

        $team = new Teams();

        $team->name = $request->name;
        $team->league_id = $request->league_id;

        $team->save();

        return redirect('/admin');
     }

     public function editView()
     {
         $teams = Teams::all();
     
         $leagueIds = $teams->pluck('league_id');
         $leagues = Leagues::whereIn('id', $leagueIds)->pluck('name', 'id');
     
         return view('Teams.teams_view', compact('teams', 'leagues'));
     }
     
     public function update(Request $request, $id)
     {
         try {
             $game = Teams::findOrFail($id);
             $game->odd = $request->input('odd');
             $game->home_team = $request->input('home_team');
             $game->away_team = $request->input('away_team');
             $game->prediction = $request->input('prediction');
             $game->game_time = $request->input('game_time');
             $game->game_date = $request->input('game_date');
             $game->save();
     
             // Optionally, you can return a response indicating success
             return response()->json(['message' => 'Game updated successfully']);
         } catch (\Exception $e) {
             // Handle the exception or log the error
             return response()->json(['error' => 'Failed to update game'], 500);
         }
     }

     public function deleteTeam($id)
{
    $team = Teams::find($id);

    if (!$team) {
        // Handle the case where the team does not exist
        return redirect()->back()->with('error', 'Team not found.');
    }

    // Delete the team
    $team->delete();

    return redirect()->back()->with('success', 'Team deleted successfully.');
}

}

