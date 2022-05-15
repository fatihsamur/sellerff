<?php

namespace Wave\Http\Controllers;

use Illuminate\Http\Request;
use DuskCrawler\Dusk;
use DuskCrawler\Inspector;
use DuskCrawler\Exceptions\InspectionFailed;
use Laravel\Dusk\Browser;
use App\Repository\UserRepositoryInterface;
use App\Model\User;

class DashboardController extends \App\Http\Controllers\Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        return view('theme::dashboard.index');
    }
}
