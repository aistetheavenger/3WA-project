<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserProfile;

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


    public function edit($id)
    {
        $users = User::find($id);
        return view('dishesCRUD.usersedit', compact('users'));
    }

        public function profile()
    {
        $users = Auth::user();
        return view('dishesCRUD.userprofile', compact('users'));
    }

    public function update(UserProfile $request, $id)
    {
        $users=User::find($id);
        $users->update($request->all());
        
        return redirect()->route('users.index');
    }

    public function profileUpdate(UserProfile $request)
    {
        $inputData=$request->all();
        if (array_key_exists('password', $inputData)){
            
            if (!empty($inputData['password'])){
                $inputData['password']=bcrypt($inputData['password']);

            }else{
                unset($inputData['password']);
            }
        }
        $users=Auth::user();
        $users->update($inputData);
        
        return redirect()->route('users.profile');
    }
    

    public function destroy($id)
    {
        $users = User::destroy($id);
        return redirect()->route('users.index');
    }
}
