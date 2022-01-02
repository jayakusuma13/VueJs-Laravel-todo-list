<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

/* WHERE IS AUTH IN LARAVEL 8?!!!
    public function __construct()
    {
        $this->middleware('auth');
    }
*/


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        //return view('home')->with('var',$var);
    }

    public function index()
    {
        $var = DB::table('todo')->get();
        //return view('home')->with('var',$var);
        return view('welcome',['var'=>$var]);
    }
}
