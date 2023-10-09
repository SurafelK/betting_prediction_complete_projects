<?php

namespace App\Http\Controllers;

use App\Models\Predictions;
use App\Http\Requests\StorePredictionsRequest;
use App\Http\Requests\UpdatePredictionsRequest;
use Illuminate\Http\Request;

class PredictionsController extends Controller
{
    public function create(Request $request)
    {
        $request -> validate([
            "prediction" => "required|unique:Predictions"
        ]);

        $prediction = new Predictions();

        $prediction->prediction = $request->prediction;
        $prediction->created_at = now();

        $prediction->save();

        if($prediction)
        {
            return response()->json([
                'status' => "successfull",
                "message" => "predictions successfully registered",
                "prediction" => $prediction
            ]);
        }
        
    }

    public function store(Request $request)
    {
        $request ->validate([
            "prediction" => "required|unique:Predictions"
        ]);

        $request->validate([
            'prediction' => "required|unique:Predictions"
        ]);

        $prediction = new Predictions();

        $prediction->prediction = $request->prediction;

        $prediction->save();

        return redirect('/admin');

    }


}