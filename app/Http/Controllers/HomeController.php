<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        // dd($request->users_id);
        $data = [];
        for($i=0; $i<count($request->users_id); $i++){
            array_push($data, User::where('id', '=', $request->users_id[$i])->pluck('name'));
        }
        return($data);
        // return DB::table('sessions')->where('user_id', '!=', null)->pluck('user_id');
    }

    public function getOnlineUsers(){
        return User::onlineUsers();
    }

    public function loginlist(Request $request){
        // return now('CET')->addHour()->addDays(-7)->format('Y-m-d');
        $data = DB::table('users_succesfull_logins')->where('date', '>', now('CET')->addHour()->addDays(-7)->format('Y-m-d'))->get()->toArray();
        $counteddate = array(0 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0);

        for($i=0;$i<count($data);$i++){
            if($data[$i]->date == now('CET')->addHour()->format('Y-m-d')){
                $counteddate[0]++;
            }
            elseif($data[$i]->date == now('CET')->addHour()->addDays(-1)->format('Y-m-d')){
                $counteddate[1]++;
            }
            elseif($data[$i]->date == now('CET')->addHour()->addDays(-2)->format('Y-m-d')){
                $counteddate[2]++;
            }
            elseif($data[$i]->date == now('CET')->addHour()->addDays(-3)->format('Y-m-d')){
                $counteddate[3]++;
            }
            elseif($data[$i]->date == now('CET')->addHour()->addDays(-4)->format('Y-m-d')){
                $counteddate[4]++;
            }
            elseif($data[$i]->date == now('CET')->addHour()->addDays(-5)->format('Y-m-d')){
                $counteddate[5]++;
            }
            elseif($data[$i]->date == now('CET')->addHour()->addDays(-6)->format('Y-m-d')){
                $counteddate[6]++;
            }
        }
        return $counteddate;
    }
}
