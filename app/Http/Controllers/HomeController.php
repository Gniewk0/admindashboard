<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('home');
    }

    public function test()
    {
        return Auth::user();
    }

    public function show(Request $request)
    {
        return DB::table('sessions')->where('user_id', '!=', null)->pluck('user_id');
    }

    public function users(Request $request)
    {
        dd($request->users_id);
        // return DB::table('sessions')->where('user_id', '!=', null)->pluck('user_id');
    }
}
