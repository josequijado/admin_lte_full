<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public $group = "";
    public $subgroup = "";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware(['auth', 'verified', 'admins']);
        $this->group = ($request['group'] == null) ? "SB_01" : $request['group'];
        $this->subgroup = ($request['subGroup'] == null) ? "SB_01_01" : $request['subGroup'];
    }

    public function index()
    {
        return view('admin.index')
        ->with ([
            'group' => $this->group,
            'subgroup' => $this->subgroup,
            'language' => session()->get('locale'),
        ]);
    }
}
