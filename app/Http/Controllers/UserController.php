<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('admin.user.edit')->with('user', $user);
    }
    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $name = $request['name'];
        $user->name = $name;

        $user->save();

        return redirect()->back();
    }
    public function uploadProfilePhoto(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $image = $request->file('image');  //getFile
        $path = 'images/profile-photos';         //path
        $image_Link = $image->store($path, ['disk' => 'public']);  //upload
        $user->image = $image_Link;
        $user->save();

        return redirect()->back();
    }
}
