<?php

namespace App\Http\Controllers;

use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class UserController extends Controller
{
    use ValidatesRequests;
    public function getSignUp()
    {
        return view('register');
    }
    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'name' => 'required|max:30|unique:users',
            'password' => 'required|min:4'
        ]);

        $email = $request->email;
        $name = $request->name;
        $password = bcrypt($request->password);

        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->password = $password;

        $user->save();
        return view('welcome');
    }

    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('dashboard');
        }
        return redirect()->back();
    }

    public function getSignIn(Request $request)
    {
        return view('login');
    }
}
