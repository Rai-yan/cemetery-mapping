<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $peoples = People::join('cemetery', function ($query) {
                $query->on('cemetery.cemetery_no', '=', 'peoples.cemetery_no');
            })
            ->where('cemetery.status', 'reserve')
            ->get();
            return view('home', ['peoples' => $peoples]);
        } else {
            return redirect('/map');
        }
        
    }

    public function deceased()
    {
        if (Auth::user()->role == 'admin') {
            $peoples = People::join('cemetery', function ($query) {
                $query->on('cemetery.cemetery_no', '=', 'peoples.cemetery_no');
            })
            ->where('cemetery.status', 'occupied')
            ->get();
            return view('deceased', ['peoples' => $peoples]);
        } else {
            return redirect('/map');
        }
        
    }
}
