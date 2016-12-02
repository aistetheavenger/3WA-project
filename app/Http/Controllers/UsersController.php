<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UsersController extends Controller
{

    public function index(Request $request)
    {
        $users = User::all();
        return view('dishesCRUD.users', compact('users'));
    }

    public function create(Request $request)
    {
      return view('dishesCRUD.usercreate');
    }


    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('users.create')
            ->with('message', 'User created succesfuly!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('dishesCRUD.usersedit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users=User::find($id);
        $users->update($request->all());
        
        return redirect()->route('users.index');
    }


    public function destroy($id)
    {
        $users = User::destroy($id);
        return redirect()->route('users.index');
    }
}
