<?php

namespace App\Http\Controllers;

use App\Models\Billet;
use App\Models\BilletToOperation;
use App\Models\Currency;
use App\Models\Operation;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class OperationController extends Controller
{
    function index() : View {
        $currencies = Currency::all();
        return view('dashboard', [
            'currencies' => $currencies
        ]);
    }

    function new(Request $request)  {

        $label = "";

        $billets_id = array();

        foreach (Billet::all('id') as $id => $value) {
            array_push($billets_id, $value->id);
        }

        if ($request->post('type') == "deposit") {
            $label = "Depot de ".$request->post('amount');
        }
        else {
            $label = "Retrait de " . $request->post('amount');
        }
        $currentOperation = Operation::create([
            'customer' => $request->post('customer'),
            'amount' => $request->post('amount'),
            'provider' => $request->post('provider'),
            'type' => $request->post('type'),
            'currency_id' => $request->post('currency_id'),
            'label' => $label,
            'reference' => Str::uuid()->toString()
        ]);

        foreach ($request->post() as $key => $value) {
            if (in_array($key, $billets_id)) {
                BilletToOperation::create([
                    'operation_id' => $currentOperation->id,
                    'billet_id' => $key,
                    'qty' => $value
                ]);
            }
        }

        return redirect()->route('dashboard')->with(
            'success', 'Operation effectuee avec succes'
        );

    }

    function get_currencies_billet(Request $request)  {

        $currency = $request->input('currencyId');

        $billets = Billet::where('currency_id', $currency)->get();
        $result_view = view('ticketing.billets', compact('billets'))->render();
        return response()->json(['success' => true, 'view' => $result_view]);
    }
}
