<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = user::oldest();

        if (request('search')) {
            $users->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%');
        }

        return view('dashboard.index', [
            "title" => "User Management",
            "users" => $users->paginate(7)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password ? bcrypt($request->password) : bcrypt('12345');
        $user->is_admin = $request->is_admin;
        $user->save();

        // $validatedData = $request->validate([
        //     'name' => ['required', 'min:3'],
        //     'email' => ['required', 'unique:users', 'email:dns'],
        //     'password' => ['required', 'min:5'],
        //     'is_admin' => ['boolean'],
        // ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);

        // User::create([$validatedData]);

        return redirect('/dashboard')->with('status', 'Successfully registered!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.edit', [
            "title" => "User Management",
            "user" => User::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email:dns'],
            'is_admin' => ['boolean'],
        ]);

        User::find($request->id)->update($validatedData);

        return redirect('/dashboard')->with('inputStatus', 'Your data has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->authorize('admin');
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/dashboard')->with('status', 'Successfully deleted!');
    }

    public function formAdd()
    {
        return view('dashboard.add', [
            "title" => "Guest Management"
        ]);
    }
}

Route::controller(UserController::class)->group(function () {
    Route::get('users', 'index');
    Route::get('users-export', 'export')->name('users.export');
});