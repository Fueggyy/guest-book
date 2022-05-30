<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Guest;

class ReportController extends Controller
{
    public function index()
    {
        $users = User::count();
        $guests = Guest::count();

        $total = $users + $guests;

        $usersToday = User::whereDate('created_at', today())->get();
        $guestsToday = Guest::whereDate('created_at', today())->get();

        return view('report.index', [
            "title" => "Report",
            "total" => $total,
            "users" => $users,
            "guests" => $guests,
            "guestsToday" => $guestsToday,
            "usersToday" => $usersToday,
        ]);
    }
}
