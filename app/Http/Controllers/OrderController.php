<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\orderRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{   
    public function list() {
        $bill = DB::table('bill')->where('status', 'Đang chờ xử lý')->get();
        return view('admin.order.list', ['bill' => $bill]);
    }

    public function edit($bill_id) {
        $bill = DB::table('bill')->where('id', $bill_id)->first();
        return view('admin.order.edit',['bill' => $bill]);
    }

    public function update(orderRequest $request, $bill_id) {
        DB::table('bill')->where('id', $bill_id)->update([
            'fullname' => $request->fullname,
            'phone'    => $request->phone,
            'address'  => $request->address,
            'note'     => $request->note,
        ]);

        return redirect('admin-list-order');
    }

    public function delete($bill_id) {
        DB::table('bill')->where('id', $bill_id)->delete();
        DB::table('orders')->where('bill_id', $bill_id)->delete();

        return redirect('admin-list-order');
    }

    public function detail($bill_id) {
    
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

        return view('admin.order.detail', [
            'orders'         => $orders,
            'totalPrice'    => $totalPrice,
        ]);
    }

    public function confirm($bill_id) {
        $time = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        DB::table('bill')
        ->where('id', $bill_id)
        ->update(['status' => 'Đã giao', 'time_receive' => $time]);
        return redirect('admin-list-deliver');
    }

    public function show() {
        $user_id = Auth::user()->id;

        if (DB::table('bill')
            ->where([['user_id', $user_id],['status', 'Đang chờ xử lý']])
            ->orWhere([['user_id', $user_id],['status', 'Đang giao']])
            ->exists()) {
            $data = [];
            $bills = DB::table('bill')
                ->where([['user_id', $user_id],['status', 'Đang chờ xử lý']])
                ->orWhere([['user_id', $user_id],['status', 'Đang giao']])
                ->get();

            foreach($bills as $bill) {
                $orders = DB::table('orders')
                ->join('product', 'product_id', '=', 'product.id')
                ->join('category', 'category', 'category.id')
                ->where([['orders.bill_id', $bill->id]])
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

            return view('client.order', [
                'bills'         => $bills,
                'data'          => $data,
            ]);
        } 
        return view('client.order_empty');         
    }

    public function backToOrder($bill_id) {
        DB::table('bill')
        ->where('id', $bill_id)
        ->update(['status' => 'Đang chờ xử lý']);

        return redirect('admin-list-deliver');
    }

    public function adminHistoryOrder() {
        $bill = DB::table('bill')->where('status', 'Đã giao')->get();
        return view('admin.order.history', ['bill' => $bill]);
    }

    public function clientHistoryOrder() {
        $user_id = Auth::user()->id;

        if (DB::table('bill')
            ->where([['order_id', $user_id],['status', 'Đã giao']])
            ->exists()) {
            $data = [];
            $bills = DB::table('bill')
                ->where([['order_id', $user_id],['status', 'Đã giao']])
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
