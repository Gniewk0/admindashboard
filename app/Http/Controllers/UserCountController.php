<?php

namespace App\Http\Controllers;

use App\Models\UserCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserCountController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        if(count(UserCount::where('user_id', '=', $user_id)->get()) !== 0){
            UserCount::where('user_id', '=', $user_id)->update([
                'user_id' => $user_id,
                'count' => $request->counter,
            ]);
            return ['message' => 'dodano rekord'];
        }else{
            UserCount::insert([
                'user_id' => $user_id,
                'count' => $request->counter,
            ]);
            return ['message' => 'zaktualizowano rekord'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user_id = Auth::user()->id;
        return UserCount::where('user_id', '=', $user_id)->pluck('count');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
