<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Http\Requests\StoreGamesRequest;
use App\Http\Requests\UpdateGamesRequest;
use App\Models\Predictions;
use App\Models\Teams;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\Json;
use Illuminate\Support\Facades\Log;

class GamesController extends Controller
{

public function create(Request $request)
{
        $request->validate([
        "game_time" => "required",
        "game_date" => "required", 
        "home_team" => "required",
        "away_team" => 'required',
        'prediction' => 'required',
        'odd' => 'required'
    ]);

    $game = new Games();

    $game->game_time = $request->game_time;
    $game->game_date = $request->game_date;
    $game->home_team = $request->home_team;
    $game->away_team = $request->away_team;
    $game->prediction = $request->prediction;
    $game->odd = $request->odd;
    $game->created_at = now();

    $home = Teams::find($game->home_team);
    $away = Teams::find($game->away_team);
    $prediction = Predictions::find($game->prediction);

    $game->save();


    return response()->json([
        'status' => 'Successful',
        'message' => 'game has Successfully created',
        'game' => $game,
        'teams' => [
            'home_team' =>$home,
            'away_team' => $away
        ],
        'prediction' => $prediction
    ],200);
}

public function show()
{
    $game = Games::all();

    foreach ($game as $g) {
        $home = Teams::find($g->home_team);
        $away = Teams::find($g->away_team);
        $pred = Predictions::find($g->prediction);
    }

    return response()->json([
        'status' => 'successfull',
        'game' => $game,
        'home' => $home,
        'away' =>$away,
        'prediction' => $pred
    ],200);

}


public function latest()
{
$games = Games::whereBetween('created_at', [Carbon::today()->startOfDay(), Carbon::today()->endOfDay()])->get(); // get all games created today

$gameodd = Games::all();

$result = 1;

foreach ($gameodd as $odd)
 {

    $result = $result * $odd->odd;
}

$final_odd = number_format($result,2);
return response()->json([
       'message' => $games,
       'total_odd' => $final_odd
]);
}

public function latestweb()
{
    $games = Games::whereBetween('created_at', [Carbon::today()->startOfDay(), Carbon::today()->endOfDay()])->get(); // Get all games created today

    $totalOdd = 1;

    foreach ($games as $game) {
        $totalOdd *= $game->odd;
    }

    $final_odd = number_format($totalOdd, 2);

    return response()->json([
        'message' => $games,
        'total_odd' => $final_odd
    ]);
}

public function index()
{

       

        $gameWithLargestNumber = Games::max('game_number');
       
        $greatestGameNumber = Games::max('game_number');
        // Access the value of game_number
       
        $games = Games::where('game_number', $greatestGameNumber)->get();
        $totalOdd = 1;

        foreach ($games as $game) {
            $totalOdd *= $game->odd;
        }
        $totalOdd = number_format($totalOdd, 2);

        $previousgamenumber = $greatestGameNumber - 1;

        $previousgame = Games::where('game_number', $previousgamenumber)->get();

        $totodd = 1;
        
        foreach ($previousgame as $game) {
            $totodd *= $game->odd;
        }
        
        $totodd = number_format($totodd, 2);



        $homeTeams = Teams::whereIn('id', $games->pluck('home_team'))->get();
        $awayTeams = Teams::whereIn('id', $games->pluck('away_team'))->get();
        $pred = Predictions::whereIn('id', $games->pluck('prediction'))->get();
        $time = $games->pluck('game_time');
        $date = $games->pluck('game_date');

        return view('Home.home', compact('games', 'homeTeams', 'awayTeams', 'pred', 'totalOdd', 'time', 'date','greatestGameNumber' ,'previousgame','totodd'));
    
}

// public function index()
// {
//     $startDate = Carbon::now()->subDays(7); // Set the start date to 7 days ago
//     $endDate = Carbon::now(); // Set the end date to the current date

//     $games = Games::whereBetween('created_at', [$startDate, $endDate])->get();
//     $totalOdd = 1;

//     foreach ($games as $game) {
//         $totalOdd *= $game->odd;
//     }

//     $homeTeams = Teams::whereIn('id', $games->pluck('home_team'))->get();
//     $awayTeams = Teams::whereIn('id', $games->pluck('away_team'))->get();
//     $pred = Predictions::whereIn('id', $games->pluck('prediction'))->get();

//     return view('Home.home', compact('games', 'homeTeams', 'awayTeams', 'pred', 'totalOdd'));
// }

public function store(Request $request)
    {
        // Validate the form inputs
        $validatedData = $request->validate([
            'game_time' => 'required',
            'game_date' => 'required|date',
            'home_team' => 'required',
            'away_team' => 'required',
            'prediction' => 'required',
            'description' => 'required',
            'odd' => 'required',
            'game_number' => 'required',
        ]);

        // Create a new instance of the Game model
        $game = new Games();
        $game->game_time = $request->game_time;
        $game->game_date = $request->game_date;
        $game->home_team = $request->home_team;
        $game->away_team = $request->away_team;
        $game->prediction = $request->prediction;
        $game->description = $request->description;
        $game->odd = $request->odd;
        $game->game_number = $request->game_number;
        $game->created_at = now(); // or use Carbon\Carbon for more advanced date handling
        
        $game->save();

        return redirect('/admin');

       
        // Redirect or return a response as needed
    }



//  public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'name' => 'required|unique:Countries',
//         ]);
    
//         $country = new Countries();
//         $country->name = $request->name;
//         $country->save();
    
//         return redirect('/admin')->with('success', 'Country saved successfully!');
//     }


public function editView()
    {
        $games = Games::all();
        $homeTeams = Teams::whereIn('id', $games->pluck('home_team'))->get();
        $awayTeams = Teams::whereIn('id', $games->pluck('away_team'))->get();
        $pred = Predictions::whereIn('id', $games->pluck('prediction'))->get();
        $time = $games->pluck('game_time');
        $date = $games->pluck('game_date');

    
    
        return view('Games.games_view', compact('games','homeTeams','awayTeams','pred','time','date'));
    }

    public function deleteGame($id)
    {
        $game = Games::find($id);
    
        if (!$game) {
            // Handle the case where the team does not exist
            return redirect()->back()->with('error', 'Team not found.');
        }
    
        // Delete the team
        $game->delete();
    
        return redirect()->back()->with('success', 'Country deleted successfully.');
    }
    


}
