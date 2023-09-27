<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

class CounterController extends Controller
{
    function index() : View {

        $counters = Counter::all();

        $agents = User::where('role', 'ROLE_AGENT')->get();

        return view('counters.index', [
            'counters' => $counters,
            'agents' => $agents
        ]);
    }

    function assign_user(Request $request) {

        $counters = Counter::where('id', $request->post('counter_id'))->get();
        if (count($counters) > 0) {
            $counter = $counters[0];
            $counter->user_id = $request->post('agent_id');
            $counter->save();
        }
        return redirect(route('counters.index'));
    }
}
