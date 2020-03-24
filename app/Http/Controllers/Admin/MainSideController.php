<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainSideController extends Controller
{
    public $group = "SB_01";
    public $subgroup = "SB_01_01";
    public $page = "";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->group = $request['group'];
        $this->subgroup = $request['subGroup'];
        $this->page = $request['page'];
        $this->middleware(['auth', 'verified', 'admins']);
    }

    public function index2()
    {
        return view('admin.index2')
        ->with ([
            'group' => $this->group,
            'subgroup' => $this->subgroup,
            'language' => session()->get('language'),
        ]);
    }

    public function index3()
    {
        return view('admin.index3')
        ->with ([
            'group' => $this->group,
            'subgroup' => $this->subgroup,
            'language' => session()->get('language'),
        ]);
    }

    public function widgets()
    {
        return view('admin.pages.widgets')
        ->with ([
            'group' => $this->group,
            'subgroup' => $this->subgroup,
            'language' => session()->get('language'),
        ]);
    }

    public function layout_options()
    {
        return view('admin.pages.layout.'.$this->page)
        ->with ([
            'group' => $this->group,
            'subgroup' => $this->subgroup,
            'language' => session()->get('language'),
        ]);
    }

    public function charts()
    {
        return view('admin.pages.charts.'.$this->page)
        ->with ([
            'group' => $this->group,
            'subgroup' => $this->subgroup,
            'language' => session()->get('language'),
        ]);
    }

    public function ui_elements()
    {
        return view('admin.pages.ui.'.$this->page)
        ->with ([
            'group' => $this->group,
            'subgroup' => $this->subgroup,
            'language' => session()->get('language'),
        ]);
    }

    public function forms()
    {
        return view('admin.pages.forms.'.$this->page)
        ->with ([
            'group' => $this->group,
            'subgroup' => $this->subgroup,
            'language' => session()->get('language'),
        ]);
    }

    public function tables()
    {
        return view('admin.pages.tables.'.$this->page)
        ->with ([
            'group' => $this->group,
            'subgroup' => $this->subgroup,
            'language' => session()->get('language'),
        ]);
    }

    public function calendar()
    {
        return view('admin.pages.calendar')
        ->with ([
            'group' => $this->group,
            'subgroup' => $this->subgroup,
            'language' => session()->get('language'),
        ]);
    }

    public function gallery()
    {
        return view('admin.pages.gallery')
        ->with ([
            'group' => $this->group,
            'subgroup' => $this->subgroup,
            'language' => session()->get('language'),
        ]);
    }

    public function mailbox()
    {
        return view('admin.pages.mailbox.'.$this->page)
        ->with ([
            'group' => $this->group,
            'subgroup' => $this->subgroup,
            'language' => session()->get('language'),
        ]);
    }

    public function examples()
    {
        return view('admin.pages.examples.'.$this->page)
        ->with ([
            'group' => $this->group,
            'subgroup' => $this->subgroup,
            'language' => session()->get('language'),
        ]);
    }

    public function extras()
    {
        return view('admin.pages.extras.'.$this->page)
        ->with ([
            'group' => $this->group,
            'subgroup' => $this->subgroup,
            'language' => session()->get('language'),
        ]);
    }
}
