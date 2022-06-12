<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\productRequest;
use App\Http\Requests\edit_productRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use File;

class ProductController extends Controller
{
    public function listProduct() {
        $product = DB::table('product')
            ->leftJoin('category', 'product.category', '=', 'category.id')
            ->select('product.*', 'category.name')
            ->get();
        return view('admin.list_product', ['product' => $product]);
    }
    
    public function addProduct() {
        return view('admin.add_product');
    }

    public function saveProduct(productRequest $request) {
        $nameImg = $request->fileImg->getClientOriginalName();
        $file = $request->file('fileImg');
        $file->move('image/product', $nameImg);

        Product::create([
            'title'         => $request->txtTitle,
            'category'      => $request->category,
            'brand'         => $request->txtBrand,
            'description'   => $request->txtDescription,
            'price'         => $request->txtPrice,
            'image'         => $nameImg,
        ]);      
        return redirect()->route('route.admin.list_product');
    }

    public function deleteProduct($id) {
        $myImg = Product::find($id)->image;
        File::delete('image/product/'.$myImg);
        Product::find($id)->delete();
        return redirect()->route('route.admin.list_product');
    }

    public function editProduct($id) {
        $data = Product::find($id);
        return view('admin.edit_product',['data' => $data]);
    }

    public function updateProduct(edit_productRequest $request, $id) {
        $myImg = Product::find($id)->image;
        if ($request->fileImg == null) {
            $image = $myImg; 
        } else {
            File::delete('image/product/'.$myImg);
            $image = $request->fileImg->getClientOriginalName();
            $file = $request->file('fileImg');
            $file->move('image/product',$image);
        }
        Product::find($id)->update([
            'title'         => $request->txtTitle,
            'category'      => $request->category,
            'brand'         => $request->txtBrand,
            'description'   => $request->txtDescription,
            'price'         => $request->txtPrice,
            'image'         => $image,
        ]);
        return redirect()->route('route.admin.list_product');
    }

    public function showProductDetail(Request $request, $id) {

        $detail = Product::find($id);
        if ($detail) {
            $category_detail = Category::find($detail->category)->name;
        
            return view('client.product',[
                'detail'           => $detail,
                'category_detail'  => $category_detail,
            ]);
        } else {
            abort(404);
        }
        
    }
}
