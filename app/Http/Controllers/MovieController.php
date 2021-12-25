<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\TimeShow;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::latest()->filter(request(['search']))->get();
        $filters = \Illuminate\Support\Facades\Request::all(['search']);
        return Inertia::render('Index', compact('filters', 'movies'));
    }

    public function create() : Response
    {
        return Inertia::render('NewMovie');
    }

    public function store(Request $request) {
        $movie = $request->validate([
            'name' => ['required', 'string', 'unique:movies'],
            'description' => ['required', 'string'],
            'rate' => ['required', 'string'],
            'IMDBRate' => ['required', 'string'],
            'time' => ['required', 'string'],
            'released' => ['required', 'string'],
            'director' => ['required', 'string'],
            'casts' => ['string', 'required'],
            'genres' => ['string', 'required'],
            'photo' => ['required', 'image'],
            'trailer' => ['required', 'string'],
            'ticket' => ['required', 'string'],
        ]);

        if (isset($movie['photo']))
        {
            $movie['photo'] = request('photo')->store(('movies'));
        }

        $id = Movie::create($movie)->id;

        TimeShow::create([
            'time' => request('timeShow1'),
            'movie_id' => $id,
        ]);

        TimeShow::create([
            'time' => request('timeShow2'),
            'movie_id' => $id,
        ]);

        TimeShow::create([
            'time' => request('timeShow3'),
            'movie_id' => $id,
        ]);

        TimeShow::create([
            'time' => request('timeShow4'),
            'movie_id' => $id,
        ]);

        return redirect('/homepage');
    }

    public function edit($id) : Response
    {
        $movie = Movie::findOrFail($id);
        return Inertia::render('EditMovie', compact('movie'));
    }

    public function update(Request $request, $id) {
        $movie = Movie::findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string', Rule::unique('movies')->ignore
            ($movie->id)],
            'description' => ['required', 'string'],
            'rate' => ['required', 'string'],
            'IMDBRate' => ['required', 'string'],
            'time' => ['required', 'string'],
            'released' => ['required', 'string'],
            'director' => ['required', 'string'],
            'casts' => ['string', 'required'],
            'genres' => ['string', 'required'],
            'photo' => [''],
            'trailer' => ['required', 'string'],
            'ticket' => ['required', 'string'],
        ]);

        if (request('photo') !== $movie->photo) {
            $data['photo'] = request('photo')->store(('movies'));
        }

        $movie->update($data);

        foreach (request('show_times') as $x)
        {
            $show = TimeShow::findOrFail($x['id']);
            $show->update([
                'time' => $x['time'],
                'movie_id' => $id,
            ]);
        }

        return redirect('/homepage');
    }

    public function destroy($id) : RedirectResponse
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return back()->with(['success' => 'The Movie Deleted Successfully']);
    }
}
