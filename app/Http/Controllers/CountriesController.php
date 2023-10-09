<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use App\Http\Requests\StoreCountriesRequest;
use App\Http\Requests\UpdateCountriesRequest;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    
    public function create(Request $request)
    {
        $request->validate([
            "name" =>"required|unique:Countries"
        ]);

        $country = new Countries();

        $country->name = $request->name;
        $country->created_at = now();

        $country->save();

        if ($country)
        {
            return response()->json([
                'status' => "success",
                'country' => $country
            ],200);
        }

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:Countries',
        ]);
    
        $country = new Countries();
        $country->name = $request->name;
        $country->save();
    
        return redirect('/admin')->with('success', 'Country saved successfully!');
    }

    public function editView()
    {
        $country = Countries::all();
    
    
        return view('Countries.country_view', compact('country'));
    }

    public function deleteCountry($id)
    {
        $country = Countries::find($id);
    
        if (!$country) {
            // Handle the case where the team does not exist
            return redirect()->back()->with('error', 'Team not found.');
        }
    
        // Delete the team
        $country->delete();
    
        return redirect()->back()->with('success', 'Country deleted successfully.');
    }
    
}
