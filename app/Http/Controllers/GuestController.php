<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Http\Requests\StoreGuestRequest;

class GuestController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guests = Guest::latest();

        if (request('search')) {
            $guests->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%');
        }


        return view('guest.index', [
            "title" => "List",
            "guests" => $guests->paginate(5)
        ]);
    }

    public function store(StoreGuestRequest $request)
    {
        Guest::create($request->all());


        return redirect('/')->with('inputStatus', 'Your data has been sent successfully!');
    }
}
