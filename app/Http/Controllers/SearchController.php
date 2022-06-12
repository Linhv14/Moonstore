<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller 
{   
    public function search(Request $request) {
        if ($request->has('search')) {
            $product = Product::search($request->search)->get();
        } else {
            $product = DB::table('product')
            ->leftJoin('category', 'product.category', '=', 'category.id')
            ->select('product.*', 'category.name')
            ->get();
        }
        return view('client.category', ['product' => $product]);
    }
}