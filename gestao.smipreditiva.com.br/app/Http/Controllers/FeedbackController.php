<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Session;
use Redirect;
use App\User;

class FeedbackController extends Controller
{

    public function index()
    {

        //pagina principal
        return Redirect::to('/Feedback');

    }
}
