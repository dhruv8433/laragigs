<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// all listing
// Route::get('/', function () {
//     return view('listings', [
//         // 'heading' => 'Latest Listing',
//         'listings' => Listing::all()
//     ]);
// });

// we replace upper route to controller
Route::get('/',[ListingController::class, 'index']);




#pre-defined templete
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return response('<h1>Home page</h1>', 200)
        ->header('Content-Type', 'text/html');
});

# with validation only number supported , dd -> die and dump , and if we pass ddd -> die, dump and debug
Route::get('/posts/{id}', function ($id) {
    //it show what we pass from code with highlight...
    //dd($id);  
    return response('posts ' . $id);
})->where('id', '[0-9]+');

Route::get('/search', function (Request $request) {
    // dd($request);
    // dd($request->name . ' ' . $request->city);
    return $request->name . ' ' . $request->city;
});


//create route
Route::get('/listing/create', [ListingController::class, 'create']);

//store data using store method  
Route::post('/listing', [ListingController::class, 'store']);

//single listing and if not availabe that render(abort) 404 page 
// one way 
// Route::get('/listing/{id}', function ($id) {
//     $listing_available = Listing::find($id);

//     if ($listing_available) {
//         return view('listing', [
//             // 'heading' => 'Latest Listing',
//             'listing' => $listing_available
//         ]);
//     } else {
//         abort('404');
//     }
// });

// another way for listing particular gigs  it autometic have 404 functionality
// Route::get('/listing/{listing}', function (Listing $listing) {
//     return view('listing', [
//         // 'heading' => 'Latest Listing',
//         'listing' => $listing
//     ]);
// });

// we replace upper route to contollers 
Route::get('/listing/{listing}', [ListingController::class, 'show']);
// naming conventions 
//common resource route
//index - show all listing
//show - show single listing
//create - show from to create new listing
//store - store new listing
//edit - show from to edit listing
//update - update listing
//delete - delete listing
