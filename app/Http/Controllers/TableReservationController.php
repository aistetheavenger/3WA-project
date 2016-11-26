<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TableReservation;  
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBlogPost;

class TableReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $userName=old('name');
        $userPhone=old('phone');

        $currentUser=Auth::user();
        if ($currentUser){
            if (!$userName){
                $userName=$currentUser->getFullName();
            }
            if (!$userPhone){
                $userPhone=$currentUser->phone;
            }
        }

        $rez = TableReservation::all();
        // dd($request);
        return view('reservations.user.reservation', compact('rez', 'userName', 'userPhone'));
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
    public function store(StoreBlogPost $request)
    {


        if (Auth::guest()) {
            return redirect(url('/register'));
        } else 
            return redirect('/reservation')
                        ->with('message', 'Table booked succesfuly!');

        $rez = TableReservation::all();
        // dd($rez);

        $this->validate($request, [
            'name' => 'required|max:20',
            'phone' => 'required',
        ]);

        return view('reservations.user.index', compact('rez', 'request'));
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
