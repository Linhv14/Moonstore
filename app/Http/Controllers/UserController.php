<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\userRequest;
use App\Http\Requests\update_userRequest;
use App\Models\User;

class UserController extends Controller
{
    public function registerClient() {
        return view('client.register_client');
    }

    public function saveClient(userRequest $request) {
        User::create([
            'password'  => bcrypt($request->password),
            'name'      => $request->name,
            'address'   => $request->address,
            'phone'     => $request->phone,
            'country'   => $request->country,
            'email'     => $request->email,
            'city'      => $request->city, 
        ]);
        return redirect()->route('route.client.login_client');
    }

    public function listUser() {
        $data = User::get();
        return view('admin.list_user',['data' => $data]);
    }

    public function deleteUser($id) {
        User::find($id)->delete();
        return redirect()->route('route.admin.list_user');
    }

    public function editUser($id) {
        $data = User::find($id);
        return view('admin.edit_user',['data' => $data]);
    }

    public function updateUser(update_userRequest $request, $id) {
        DB::table('users')->where('id', $id)->update([
            'name'      => $request->name,            
            'phone'     => $request->phone,
            'address'   => $request->address,
            'country'   => $request->country,
            'city'      => $request->city,
        ]);
        return redirect()->route('route.admin.list_user');
    }

    public function updateTypeUser(Request $request, $id) {
        DB::table('users')->where('id', $id)->update([
            'type_user'      => $request->type_user,            
        ]);
        return redirect()->route('route.admin.list_user');
    }
}
