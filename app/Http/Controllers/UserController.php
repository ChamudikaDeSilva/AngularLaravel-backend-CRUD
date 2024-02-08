<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required',
            'password' => 'required'
          ]);

          $user = new user([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
          ]);

          $user->save();

          return response()->json($user);
    }
    public function index()
    {
        $user = user::all();
        return response()->json($user);
    }
    public function show($id)
    {
        $user = user::findOrFail($id);
        return response()->json($user);
    }
    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->update();

        return response()->json($user);
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json("Record Delete Successfully");
    }
}
