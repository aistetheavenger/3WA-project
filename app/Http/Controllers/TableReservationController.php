<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TableReservation;  
use Illuminate\Support\Facades\Auth;

class TableReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $loged = $request->session()->get('loged', new Loged());
        // $request->session()->put('loged', $loged);
        // $request->session()->save();

        $rez = TableReservation::all();

        return view('reservations.user.reservation', compact('rez'));
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

        if (Auth::guest()) {
            return redirect(url('/register'));
        } else 
            return redirect('/reservation')
                        ->with('message', 'Table booked succesfuly!');

        $rez = TableReservation::all();

        return view('reservations.user.index', compact('rez'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
