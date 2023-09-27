<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Billet;
use App\Models\Ticketing;
use Carbon\Carbon;
use App\Models\BilletToTicketing;
use App\Models\Counter;
use App\Models\BilletToCounter;

class TicketingController extends Controller
{
    //
    function index(): View
    {

        $day_ticketing = Ticketing::where('ticketing_day', Carbon::now()->format('Y-m-d'))->get();
        $ticketings = array();
        if (count($day_ticketing) > 0) {
            $ticketings = BilletToTicketing::where('ticketing_id', $day_ticketing[0]->id)->get();
        }
        $localCurrencyBillets = Billet::where('currency_id', 2)->get();
        $dollarBillets = Billet::where('currency_id', 1)->get();

        return view('ticketing.declaration', [
            'billetsFrancs' => $localCurrencyBillets,
            'billetsDollars' => $dollarBillets,
            'ticketings' => $ticketings
        ]);
    }

    function ticketing_declaration(Request $request)
    {

        $billets_id = array();

        foreach (Billet::all('id') as $id => $value) {
            array_push($billets_id, $value->id);
        }

        $ticketing = Ticketing::create([
            'ticketing_day' => Carbon::now()->format('Y-m-d')
        ]);

        foreach ($request->post() as $key => $value) {
            if (in_array($key, $billets_id)) {
                BilletToTicketing::create([
                    'ticketing_id' => $ticketing->id,
                    'billet_id' => $key,
                    'qty' => $value
                ]);
            }
        }

        return redirect('dashboard')->with('message', 'Declaration Reussie');
    }

    function dispatching(): View
    {
        $counters = Counter::all();
        $ticketings = array();
        $day_ticketing = Ticketing::where('ticketing_day', Carbon::now()->format('Y-m-d'))->get();

        if (count($day_ticketing) > 0) {
            $ticketings = BilletToTicketing::where('ticketing_id', $day_ticketing[0]->id)->get();
        }

        return view('ticketing.dispatching', [
            'counters' => $counters,
            'ticketings' => $ticketings
        ]);
    }

    function dispatch(Request $request)
    {

        $billets_id = array();

        foreach (Billet::all('id') as $id => $value) {
            array_push($billets_id, $value->id);
        }

        $day_ticketing = Ticketing::where('ticketing_day', Carbon::now()->format('Y-m-d'))->get();

        if (count($day_ticketing) > 0) {
            $ticketings = BilletToTicketing::where('ticketing_id', $day_ticketing[0]->id)->get();
            foreach ($request->post() as $key => $value) {
                if (in_array($key, $billets_id)) {
                    BilletToCounter::create([
                        'counter_id' => $request->post('counter_id'),
                        'ticketing_id' => $day_ticketing[0]->id,
                        'billet_id' => $key,
                        'qty' => $value
                    ]);
                }
            }
            return redirect()->route('ticketing.dispatching')
                ->with('success', 'Répartition effectuée avec succès');
        }


        return redirect()->route('ticketing.dispatching')
            ->with('error', "Erreur lors de l'execution de l'operation");
    }
}
