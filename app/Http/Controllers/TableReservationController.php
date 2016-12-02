<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TableReservation;  
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TableReservationRequest;


class TableReservationController extends Controller
{
    public function index(Request $request)
    {
        // if (Auth::guest()) {
        //     return redirect(url('/register'));
        // } 
        // $rez = TableReservation::where('user_id', Auth::user()->id)->get();

        $rez = TableReservation::all();
        return view('reservations.admin.index', compact('rez'));
    }

    public function create()
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
        return view('reservations.user.reservation', compact('userName', 'userPhone'));
    }

    public function store(TableReservationRequest $request)
    {

        // if (Auth::guest()) {
        //     return redirect(url('/register'));
        // }  

        $rez=TableReservation::create($request->all());

        return redirect()->route('reservation.create')
                        ->with('message', 'Table booked succesfuly!');

        // $rez = TableReservation::all();

        // return view('reservations.user.index', compact('rez', 'request'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $rez=TableReservation::find($id);
        return view('reservations.admin.edit', compact('rez'));
    }

    public function update(TableReservationRequest $request, $id)
    {
        $rez=TableReservation::find($id);
        $rez->update($request->all());
        
        return redirect()->route('reservation.index');
    }

    public function destroy($id)
    {
        $rez=TableReservation::destroy($id);

        return redirect()->route('reservation.index');
    }
}
