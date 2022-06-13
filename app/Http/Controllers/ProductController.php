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
    public function list() {
        $product = DB::table('product')
            ->leftJoin('category', 'product.category', '=', 'category.id')
            ->select('product.*', 'category.name')
            ->get();
        return view('admin.product.list', ['product' => $product]);
    }

    public function save(productRequest $request) {
        $nameImage = $request->fileImg->getClientOriginalName();
        $file = $request->file('fileImg');
        $file->move('image/product', $nameImage);

        Product::create([
            'title'         => $request->txtTitle,
            'category'      => $request->category,
            'brand'         => $request->txtBrand,
            'description'   => $request->txtDescription,
            'price'         => $request->txtPrice,
            'image'         => $nameImage,
        ]);      
        return redirect('admin-list-product');
    }

    public function delete($id) {
        $image = Product::find($id)->image;
        File::delete('image/product/'.$image);
        Product::find($id)->delete();
        return redirect('admin-list-product');
    }

    public function edit($id) {
        $product = Product::find($id);
        return view('admin.product.edit',['product' => $product]);
    }

    public function update(edit_productRequest $request, $id) {
        $oldImage = Product::find($id)->image;
        if ($request->fileImg == null) {
            $image = $oldImage; 
        } else {
            File::delete('image/product/'.$oldImage);
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
        return redirect('admin-list-product');
    }

    public function detail($id) {
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
