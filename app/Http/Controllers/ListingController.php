<?php

namespace App\Http\Controllers;

use App\Models\Listing;
// use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listings
    //modify listing to listings because we created one folder named "listings" into view and move both listing as shwo and listings as index into that folder
    public function index()
    {
        return view('listings.index', [
            // 'heading' => 'Latest Listing',
            // using latest we got latest from first to last 
            // we pass filter from listing models and we create array there so pass tag into array
            'listings' => Listing::latest()->filter(request(['tag']))->get()
        ]);
    }

    //show single listing 
    //modify listing to listings because we created one folder named "listings" into view and move both listing as shwo and listings as index into that folder
    public function show(Listing $listing)
    {
        return view('listings.show', [
            // 'heading' => 'Latest Listing',
            'listing' => $listing
        ]);
    }

    public function create()
    {
        return view('listings.create');
    }

    //store lising data
    public function store(Request $request)
    {
        // dd($request);
        $formFields = $request->validate([
            'title' => 'required',
            // mark - 1
            'company' => ['required', Rule::unique('listings', 'company')],            
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing Created Successfully!');
    }
}
