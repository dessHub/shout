<?php

namespace App\Http\Controllers;
use App\Report;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $pending = Report::where(['status' => "pending"])->count();
        $rec = Report::where(['status' => "received"])->count();
        $closed = Report::where(['status' => "closed"])->count();
        $users = User::where(['role' => "normal"])->count();

        return view('home')->with('report', $pending, 'rec', $rec)->with('rec', $rec)->with('closed', $closed)->with('users', $users);
    }
}
