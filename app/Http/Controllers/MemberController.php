<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Flasher\Notyf\Prime\NotyfFactory;
use Illuminate\Support\Facades\Crypt;

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

    public function store(Request $request, NotyfFactory $flasher)
    {
        $request->validate([
            "email"=>"required|unique:users,email",
            "phone"=>"required|unique:users,phone",
            "role"=>"required",
            "password"=>"required",
        ]);

        $new_user = User::insertGetId([
            "name"=>$request->name,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "role"=>$request->role,
            "password"=>Hash::make($request->password),
            "created_at"=>Carbon::now(),
        ]);

        if($request->photo != ""){
            $imageName = $new_user."-".rand(1, 999).".".$request->photo->getClientOriginalExtension();
            $imgSave = Image::make($request->photo)->fit(500)->save(public_path("uploads/".$imageName));
            User::where('id', $new_user)->update([
                "photo"=>$imageName,
            ]);
        }

        $flasher->addSuccess('User has been add successfully!');
        return back();

    }

    public function show()
    {
        //
    }

    public function edit(Request $request)
    {
        $data = User::find(Crypt::decrypt($request->id));
        return view('backend.users.edit',[
            "data"=>$data,
        ]);
    }

    public function update(Request $request, NotyfFactory $flasher)
    {
        $request->validate([
            "id"=>"required",
            "name"=>"required",
            "email"=>"required",
            "role"=>"required",
        ]);

        $user = User::find($request->id);

        User::where('id', $request->id)->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "role"=>$request->role,
        ]);

        if($request->phone != ""){
            User::where('id', $request->id)->update([
                "phone"=>$request->phone,
            ]);
        }
        if($request->city != ""){
            User::where('id', $request->id)->update([
                "city"=>$request->city,
            ]);
        }
        if($request->about != ""){
            User::where('id', $request->id)->update([
                "about"=>$request->about,
            ]);
        }

        if($request->password != "" && $request->password === $request->new_password && $request->password == Hash::check(Auth::user()->password))
        {
            User::where('id', $request->id)->update([
                "password"=>$request->password,
            ]);
        }

        if($request->photo != ""){

            if($user->photo != "" && file_exists(public_path("uploads/".$user->photo))){
                unlink(public_path("uploads/".$user->photo));
            }

            $imageName = $request->id."-".rand(1, 999).".".$request->photo->getClientOriginalExtension();
            $imgSave = Image::make($request->photo)->fit(500)->save(public_path("uploads/".$imageName));
            User::where('id', $request->id)->update([
                "photo"=>$imageName,
            ]);
        }

        $flasher->addSuccess('User has been update successfully!');
        return back();
    }

    public function destroy(Request $request, NotyfFactory $flasher)
    {
        $user = user::find(Crypt::decrypt($request->id));
        User::find(Crypt::decrypt($request->id))->delete();
        if($user->photo != "" && file_exists(public_path("uploads/".$user->photo))){
            unlink(public_path("uploads/".$user->photo));
        }
        $flasher->addSuccess('User has been delete successfully!');
        return back();
    }

    public function profile(Request $request)
    {
        $data = User::find(Auth::id());
        return view('backend.users.profile',[
            "data"=>$data,
        ]);
    }

}

