<?php

namespace App\Http\Middleware;

use App\Models\Location;
use App\Models\Movie;
use App\Models\Seat;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    public function selected($seat, $date, $time) : bool
        {
            return (bool) Seat::where('seat', $seat)->where('date', $date)->where('time_id', $time)->count();
        }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [

            'auth' => function () use ($request) {
                return [
                    'user' => $request->user() ? : null,
                ];
            },

            'locations' => Location::all(),

            'errors' => function () {
                return session()->get('errors') ? session()->get('errors')->getBag('default')->getMessages() : (object) [];
            },

            'success' => function () {
                return session()->get('success') ? : null;
            },

            'qrCode' => function () {
                return session()->get('qrCode') ? : null;
            },
        ]);
    }
}
