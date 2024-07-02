<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Session;
use Redirect;
use App\User;

class HomeController extends Controller
{

    public function index()
    {
        if(Session::has('login')){

            return Redirect::to('/');
        }

        //pagina principal
        //return view('home');
        return Redirect::to('/home');

    }
}
