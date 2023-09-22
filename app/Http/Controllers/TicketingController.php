<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class TicketingController extends Controller
{
    //
    function index() : View {
        return view('ticketing.declaration');
    }
}
