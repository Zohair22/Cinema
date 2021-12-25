<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Movie;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index() : Response
    {
        $movies = Movie::latest()->filter(request(['search']))->get();
        $lasts = Movie::latest()->get();
        $last = $lasts->first();
        $address = Location::all();
        $filters = Request::all();
        return Inertia::render('Home', compact('movies', 'filters', 'last', 'address'));
    }

    public function show($name) : Response
    {
        $movie = Movie::where('name', $name)->first();
        $lasts = Movie::latest()->get();
        $last = $lasts->first();
        return Inertia::render('Blog', compact('movie','last'));
    }
}
