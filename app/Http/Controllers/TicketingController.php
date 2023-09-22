<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Billet;

class TicketingController extends Controller
{
    //
    function index() : View {

        $localCurrencyBillets = Billet::where('currency_id', 2)->get();
        $dollarBillets = Billet::where('currency_id', 1)->get();

        return view('ticketing.declaration', [
            'billetsFrancs' => $localCurrencyBillets,
            'billetsDollars' => $dollarBillets
        ]);
    }
}
