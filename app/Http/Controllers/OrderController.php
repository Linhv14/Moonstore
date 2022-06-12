<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\orderRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{   
    public function listOrder() {
        $bill = DB::table('bill')->where('status', 'Đang chờ xử lý')->get();
        return view('admin.list_order', ['bill' => $bill]);
    }

    public function editOrder ($bill_id) {
        $bill = DB::table('bill')->where('bill_id', $bill_id)->first();
        return view('admin.edit_order',['bill' => $bill]);
    }

    public function updateOrder(orderRequest $request, $bill_id) {
        DB::table('bill')->where('bill_id', $bill_id)->update([
            'fullname' => $request->fullname,
            'phone'    => $request->phone,
            'address'  => $request->address,
            'note'     => $request->note,
        ]);

        return redirect()->route('route.admin.list_order');
    }

    public function deleteOrder($bill_id) {
        DB::table('bill')->where('bill_id', $bill_id)->delete();
        DB::table('orders')->where('bill_id', $bill_id)->delete();

        return redirect()->route('route.admin.list_order');
    }

    public function deleteDeliver($bill_id) {
        DB::table('bill')->where('bill_id', $bill_id)->delete();
        DB::table('orders')->where('bill_id', $bill_id)->delete();

        return redirect()->route('route.admin.list_deliver');
    }

    public function backToOrder($bill_id) {
        DB::table('bill')
        ->where('bill_id', $bill_id)
        ->update(['status' => 'Đang chờ xử lý']);

        return redirect()->route('route.admin.list_deliver');
    }

    public function detailOrder($bill_id) {
    
        $orders = DB::table('orders')
            ->leftJoin('product', 'product_id', '=', 'product.id')
            ->join('category', 'category', '=', 'category.id')
            ->where('bill_id', $bill_id)
            ->select("product.*", "orders.*", "category.name")
            ->get();

        $totalPrice = 0;
        foreach ($orders as $order) {
            $totalPrice += ($order->price * $order->quantity); 
        }

        return view('admin.detail_order', [
            'orders'         => $orders,
            'totalPrice'    => $totalPrice,
        ]);
    }

    public function confirmDeliver($bill_id) {
        $user = Auth::user()->name;
        $time = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        DB::table('bill')
        ->where('bill_id', $bill_id)
        ->update(['status' => 'Đang giao','staff' => $user, 'time_deliver' => $time]);
        return redirect()->route('route.admin.list_order');
    }

    public function listDeliver() {
        $bill = DB::table('bill')->where('status', 'Đang giao')->get();
        return view('admin.list_deliver', ['bill' => $bill]);
    }

    public function confirmOrder($bill_id) {
        $time = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        DB::table('bill')
        ->where('bill_id', $bill_id)
        ->update(['status' => 'Đã giao', 'time_receive' => $time]);
        return redirect()->route('route.admin.list_deliver');
    }

    public function adminHistoryOrder() {
        $bill = DB::table('bill')->where('status', 'Đã giao')->get();
        return view('admin.history_order', ['bill' => $bill]);
    }

    public function clientHistoryOrder() {
        $user_id = Auth::user()->id;

        if (DB::table('bill')
            ->where([['customer_id', $user_id],['status', 'Đã giao']])
            ->exists()) {
            $data = [];
            $bills = DB::table('bill')
                ->where([['customer_id', $user_id],['status', 'Đã giao']])
                ->get();


            foreach($bills as $bill) {
                $orders = DB::table('orders')
                ->join('product', 'product_id', '=', 'product.id')
                ->join('category', 'category', 'category.id')
                ->where([['orders.bill_id', $bill->bill_id]])
                ->select('orders.*', 'product.*', 'category.name')
                ->get();
                
                $totalPrice = 0;
                foreach ($orders as $order) {
                    $totalPrice += ($order->price * $order->quantity); 
                }

                $data[] = [
                    'orders'      => $orders,
                    'totalPrice'  => $totalPrice,
                ];
            }

            return view('client.history_order', [
                'bills'     => $bills,
                'data'      => $data,
            ]);
        }  
        return view('client.order_empty');             
    }
}  
