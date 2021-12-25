<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Movie;
use App\Models\Reservation;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ReservationController extends Controller
{
    public function create($name)
    {
        $movie = Movie::where('name', $name)->first();
        $locations = Location::all();
        $seats = Seat::all();
        return Inertia::render('Reservation', compact('locations', 'movie', 'seats'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'location_id' => ['required'],
            'movie_id' => ['required'],
            'name' => ['required'],
            'email' => ['required'],
            'qrCode' => '',
            'seat' => ['required'],
            'date' => ['required', ],
            'time_id' => ['required'],
            'reservation_id' => '',
        ]);

        $time = time();
        QrCode::generate($time, 'movies/'.$time.'.svg');
        $attributes['qrCode'] = 'movies/'.$time.'.svg';

        $id = Reservation::create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'qrCode' => $attributes['qrCode'] ,
        ])->id;

        foreach (request('seat') as $x) {
            Seat::create([
                'seat' => $x,
                'location_id' => $attributes['location_id'],
                'movie_id' => $attributes['movie_id'],
                'date' => $request->date,
                'time_id' => $request->time_id,
                'reservation_id' => $id,
            ]);
        }

        return back()->with(['success' => 'Reservation Done', 'qrCode' => $attributes['qrCode']]);
    }

}
