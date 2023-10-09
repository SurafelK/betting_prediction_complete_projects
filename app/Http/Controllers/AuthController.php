<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Predictions;
use App\Models\Teams;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:Users,email',
            'password' => 'required|String|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields["email"],
            'password' => Hash::make($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json([
            "status" => "successful",
            "user" => $user,
            "token" => $token
        ],200);

    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => "Logged out"
        ]);
    }

    public function destroy(Request $request)
    {
        $request->session()->flush();;
        Auth::logout();
        return redirect()->route('wellcome');
    }


    public function login(Request $request)
    {
        $fields = $request->validate([
            'email'=>'required|email|string',
            'password' => 'required|string'
        ]);

        // Check email First
        $user = User::where('email',$fields['email'])->first();
        
        if(!$user || !Hash::check($fields['password'], $user->password))
        {
            return response()->json([
                'message' => 'Bad creds'
            ],401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json([
            'status'=>"Successful",
            "message" => "Logged in successfuly",
            "user" => $user,
            "token" => $token

        ]);

    }

    public function loginn(Request $request)
    {

        
    $game = Games::all();
    foreach ($game as $odd)
    {
        $tot_odd=1;
        $tot_odd = $tot_odd * $odd->odd;
    }

    foreach ($game as $g) 
    {
        $home = Teams::find($g->home_team);
        $away = Teams::find($g->away_team);
        $pred = Predictions::find($g->prediction);
    }

    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) 
    {
        if (Auth::user()->isAdmin == '0')
        {
            return redirect()->route('home.page');
        } 
        elseif (Auth::user()->isAdmin == '1') {
            return redirect()->route('admin.page');
        }

    }
     else
        {
        return redirect('/')->with('message','Login details are not valid');
    }

    }

   public function registerationform()
   {
    return view('Register.register');
   }


   public function registerweb(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:Users,email',
            'password' => 'required|String|confirmed'
        ]);

       if( $user = User::create([
            'name' => $fields['name'],
            'email' => $fields["email"],
            'password' => Hash::make($fields['password'])
        ]))
        {
            return view('welcome');
        }

        else
        {
            return view('Welcome.welcome');
        }

       

    }

}
