<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function formAdd()
    {
        return view('dashboard.add', [
            "title" => "Guest Management"
        ]);
    }

    public function formEdit($id)
    {
        $this->authorize('admin');
        $user = User::find($id);

        return view('dashboard.edit', [
            "title" => "Guest Management",
            "user" => $user
        ]);

    }
}
