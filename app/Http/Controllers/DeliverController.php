<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Illuminate\Http\Request;

class DeliverController extends Controller
{
    public function list() {
        $bill = DB::table('bill')->where('status', 'Đang giao')->get();
        return view('admin.deliver.list', ['bill' => $bill]);
    }

    public function confirm($bill_id) {
        $user = Auth::user()->name;
        $time = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        DB::table('bill')
        ->where('id', $bill_id)
        ->update(['status' => 'Đang giao','staff' => $user, 'time_deliver' => $time]);
        return redirect('admin-list-order');
    }

    public function delete($bill_id) {
        DB::table('bill')->where('id', $bill_id)->delete();
        DB::table('orders')->where('bill_id', $bill_id)->delete();

        return redirect('admin-list-deliver');
    }
}
