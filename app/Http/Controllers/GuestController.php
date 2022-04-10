<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\User;
use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use Illuminate\Http\Request;

class GuestController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formAdd()
    {
        $this->authorize('admin');

        return view('dashboard.add', [
            "title" => "Guest Management"
        ]);
    }

    public function create(Request $request)
    {
        $this->authorize('admin');

        $nama = $request->name;
        $email = $request->email;
        $description = $request->description;

        $data = new Guest();
        $data->name = $nama;
        $data->email = $email;
        $data->description = $description;
        $data->save();

        return redirect('/list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGuestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGuestRequest $request)
    {
        $nama = $request->name;
        $email = $request->email;
        $description = $request->description;

        $data = new Guest();
        $data->name = $nama;
        $data->email = $email;
        $data->description = $description;
        $data->save();

        return redirect('/')->with('inputStatus', 'Your data has been sent successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $this->authorize('admin');

        $guests = Guest::latest();

        if(request('search')){
            $guests->where('name', 'like', '%' . request('search') . '%')
                   ->orWhere('email', 'like', '%' . request('search') . '%');
        }


        return view('dashboard.index', [
            "title" => "List",
            "guests" => $guests->paginate(5)
        ]);
    }

    public function edit(Request $request)
    {
        $this->authorize('admin');


        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $description = $request->description;

        $data = Guest::find($id);
        $data->name = $name;
        $data->email = $email;
        $data->description = $description;
        $data->update();

        return redirect('/list');
    }
    public function formEdit($id)
    {
        $this->authorize('admin');

        // find guest by id
        $guest = Guest::find($id);

        return view('dashboard.edit', [
            "title" => "Guest Management",
            "guest" => $guest
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGuestRequest  $request
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGuestRequest $request, Guest $guest)
    {
        //
    }

    public function delete(Request $request)
    {
        $this->authorize('admin');
        // delete guest by id
        $id = $request->id;
        $data = Guest::find($id);
        $data->delete();

        return redirect('/list');
    }
}
