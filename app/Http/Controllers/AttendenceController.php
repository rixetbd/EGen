<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    public function index()
    {
        $all_staff_attendence = Attendence::all();
        return view('backend.attendence.index',[
            "all_staff_attendence"=>$all_staff_attendence,
        ]);
    }
    public function create()
    {

    }
    public function store()
    {

    }
    public function show()
    {

    }
    public function edit()
    {

    }
    public function update()
    {

    }
}
