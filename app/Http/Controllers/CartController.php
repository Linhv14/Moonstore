<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\orderRequest; 
use App\Models\Product; 
use App\Models\Bill; 
use App\Models\Order; 
use App\Cart;
use Carbon\Carbon;
use Session;

class CartController extends Controller
{
    public function showCart() {
        return view('client.cart');
    }
    
    public function addCart(Request $request, $id) {
        $product = Product::find($id);
        if ($product != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($product, $id);
            $request->Session()->put('Cart', $newCart);
        }
        
        return view('client.client_cart',['Cart' => $newCart]);
    }

    public function addCartItem() {
        $cart = Session('Cart') ? Session('Cart') : null;
        
        return view('client.cart_ajax',['Cart' => $cart]);
    }

    public function deleteCart(Request $request, $id) {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->deleteCart($id);
        if(Count($newCart->products) > 0) {
            $request->Session()->put('Cart', $newCart);
        } else {
            $request->Session()->forget('Cart');
        }
        
        return view('client.client_cart',['Cart' => $newCart]);
    }

    public function deleteCartItem(Request $request, $id) {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->deleteCart($id);
        if(Count($newCart->products) > 0) {
            $request->Session()->put('Cart', $newCart);
        } else {
            $request->Session()->forget('Cart');
        }
        
        return view('client.cart_ajax',['Cart' => $newCart]);
    }

    public function updateCartItem(Request $request, $id, $quanty) {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->updateCart($id, $quanty);
        $request->Session()->put('Cart', $newCart);       
        
        return view('client.cart_ajax',['Cart' => $newCart]);
    }

    public function checkout(Request $request) {
        $user_id = Auth::user()->id;
        $bill = null;
        $category = [];
          
        if (DB::table('bill')->where('customer_id', $user_id)->exists()) {
            $bill = DB::table('bill')->where('customer_id', $user_id)->first();
        }

        $carts = $request->session()->get('Cart');
        if ($carts != null) {
            $carts = $carts->products;
            foreach($carts as $cart) {
                $id = $cart["productInfo"]->category;
                $category_name = DB::table('category')->where('id', $id)->select('name')->get();
                $category[$id] = $category_name[0]->name;
            }  
        }
           
        return view('client.checkout', [
            'bill' => $bill,
            'carts' => $carts,
            'category' => $category,
        ]);    
    }

    public function confirmOrder(orderRequest $request) { 
        
        $user_id = Auth::user()->id;
        $time = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        $bill = Bill::create([
            'customer_id'   => $user_id,
            'fullname'      => $request->fullname,
            'phone'         => $request->phone,
            'address'       => $request->address,
            'note'          => $request->note,
            'created_at'    => $time,
        ]);

        foreach (Session::get('Cart')->products as $item) {
            $time = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
            Order::create([
                'bill_id'     => $bill->id,
                'product_id'  => $item['productInfo']->id,
                'quantity'    => $item['quanty'],
                'created_at'  => $time,
            ]);
        }

        $request->Session()->forget('Cart');
        
        return redirect()->route('route.client.order');
    }

    public function showOrder() {
        $user_id = Auth::user()->id;

        if (DB::table('bill')
            ->where([['customer_id', $user_id],['status', 'Đang chờ xử lý']])
            ->orWhere([['customer_id', $user_id],['status', 'Đang giao']])
            ->exists()) {
            $data = [];
            $bills = DB::table('bill')
                ->where([['customer_id', $user_id],['status', 'Đang chờ xử lý']])
                ->orWhere([['customer_id', $user_id],['status', 'Đang giao']])
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

            return view('client.order', [
                'bills'         => $bills,
                'data'          => $data,
            ]);
        } 
        return view('client.order_empty');         
    }

    
}