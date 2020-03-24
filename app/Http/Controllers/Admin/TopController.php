<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admins']);
    }

    public function home()
    {
        return redirect()->route('main_admin');
    }

    public function contact()
    {
        //
    }

    public function messages($id)
    {
        //
    }

    public function notifications($id)
    {
        //
    }

}
