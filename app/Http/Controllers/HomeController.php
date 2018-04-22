<?php

namespace App\Http\Controllers;

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
        return view('home');
    }

    public function account()
    {
      return view('account');
    }

    public function history()
    {
      return view('history');
    }

    public function config()
    {
      return view('config');
    }
    public function qr()
    {
      return view('qr');
    }
}
