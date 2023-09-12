<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index() {
        $users_list = User::all()->all();
        return view('users/index', compact('users_list'));
    }

    public function create(Request $request) {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->back();
    }

    public function edit(Request $request) {
        try {
            $data = $request->all();
            $update_user = User::find($data['id']);
            if(isset($data['password'])) {
                $update_user['password'] = Hash::make($data['password']);
            }

            $update_user['name'] = $data['name'];
            $update_user['email'] = $data['email'];
            $update_user->save();
        } catch (\Exception $error) {
            dd($error);
        }
        return redirect()->back();

    }
    public function delete($id) {
        try {
            $deleted = User::find($id);
            $deleted->delete();
        } catch (\Exception $error) {
            dd($error);
        }
        return redirect()->back();
    }
}
