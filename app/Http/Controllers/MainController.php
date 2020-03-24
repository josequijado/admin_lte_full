<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function construct()
    {
        //
    }

    public function index()
    {
        return view('index');
    }

    public function select()
    {
        $user = auth()->user();
        session([
            'locale' => $user->language,
        ]);
        $role = $user->role;
        if ($role == 'Admin' || $role == 'Root') {
            return redirect()->route('main_admin');
        }
        return redirect()->route('main_user');
    }

    public function language_change(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->language = $request['language'];
        $user->save();
        session()->put('locale', $request['language']);
        config(['app.locale' => $request['language']]);
        return $request['language'];
    }
}
