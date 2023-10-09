<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use App\Models\Games;
use App\Models\Leagues;
use App\Models\Predictions;
use App\Models\Teams;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    public function register(Request $request)
    {
         $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:Users,email',
            'password' => 'required|String|confirmed',
        ]);

        $adm = '1';

        // $user = User::create([
        //     
        //     'email' => $fields["email"],
        //     'password' => Hash::make($fields['password']),
        //     'isAdmin' => $adm,
        // ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->name);
        $user->isAdmin = '1';

        $user->save();
        

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json([
            "status" => "successful",
            "user" => $user,
            "token" => $token
        ],200);

    }


    public function adminPanel()
    {
        // $countryNames = Countries::pluck('name')->toArray();
        // $teams = Teams::pluck('name')->toArray();
        
        $countryNames = Countries::all();
        $teams = Teams::all();


        $leagues = Leagues::all();

        $teams = Teams::all();
        $predictions = Predictions::all();

        // foreach ($leagues as $league) {
        //     $name = $league->name;
        //     $id = $league->id;
        //     // Do something with the league name
        // }

        $games = Games::all();
        $gameNumbers = $games->pluck('game_number');
        $greatestGameNumber = $gameNumbers->max();


        
        
    
        return view('Admin.admin_home', compact('countryNames','teams','leagues','teams','predictions','greatestGameNumber'));
    }
}
