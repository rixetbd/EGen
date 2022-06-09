<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{

    public function index()
    {
        $all_users = User::where('id', '!=' , Auth::id())->get();
        return view('backend.users.index',[
            'all_users'=>$all_users,
        ]);
    }

    public function create()
    {
        return view('backend.users.new');
    }

    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        //
    }

    public function edit()
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy()
    {
        //
    }

    public function profile()
    {
        return view('backend.users.profile');
    }

}

