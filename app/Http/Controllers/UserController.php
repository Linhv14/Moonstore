<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\userRequest;
use App\Http\Requests\update_userRequest;
use App\Models\Users;

class UserController extends Controller
{
    public function list() {
        $data = Users::get();
        return view('admin.user.list',['data' => $data]);
    }

    public function delete($id) {
        Users::find($id)->delete();
        return redirect('admin-list-user');
    }

    public function edit($id) {
        $data = Users::find($id);
        return view('admin.user.edit',['data' => $data]);
    }

    public function update(update_userRequest $request, $id) {
        DB::table('users')->where('id', $id)->update([
            'name'      => $request->name,            
            'phone'     => $request->phone,
            'address'   => $request->address,
            'country'   => $request->country,
            'city'      => $request->city,
        ]);
        return redirect('admin-list-user');
    }

    public function updateType(Request $request, $id) {
        DB::table('users')->where('id', $id)->update([
            'type_user' => $request->type_user,            
        ]);
        return redirect('admin-list-user');
    }
}
