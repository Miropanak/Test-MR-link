<?php

namespace App\Http\Controllers;

use Jenssegers\Agent\Agent;
use App\Activity;
use App\Event;
use App\Unit;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function view;

class DashboardController extends Controller
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
     * Show form to create new activity.
     *
     * @return \Illuminate\Http\Response
     */
    public function newDashboard()
    {
        $all_activities = Activity::where('id_author', Auth::user()->id)->get();
        $reg_activities = User::find(Auth::user()->id)->activities;
        $all_events = Event::where('id_users', Auth::user()->id)->get();
        $non_validated_activities = Activity::where('validated', false)->get();
        $reg_title = "Zoznam registrovaných aktivít";
        $all_title = "Zoznam vytvorených aktivít";
        $events_title = "Zoznam vytvorených udalostí";
        $non_validated_title = "Zoznam nevalidovaných aktivít";
        $agent = new Agent();

        return view('dashboard', [
            'all_activities' => $all_activities, 'agent' => $agent, 'reg_activities' => $reg_activities, 'all_events' => $all_events,
            'reg_title' => $reg_title, 'all_title' => $all_title, 'events_title' => $events_title, 'non_validated_activities' => $non_validated_activities, 'non_validated_title' => $non_validated_title
        ]);
    }

}
