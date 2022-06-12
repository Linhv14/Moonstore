<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\categoryRequest;
use App\Http\Requests\edit_categoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use File;

class CategoryController extends Controller
{
    public function listCategory() {
        return view('admin.list_category'); 
    }

    public function addCategory() {
        return view('admin.add_category');
    }

    public function saveCategory(categoryRequest $request) {

        $nameImg = $request->fileImg->getClientOriginalName();
        $file = $request->file('fileImg');
        $file->move('image/category', $nameImg);

        Category::create([
            'name'  => $request->name,
            'image' => $nameImg,
        ]);
        
        return redirect()->route('route.admin.list_category');
    }

    public function deleteCategory($id) {

        $myImg = Category::find($id)->image;
        File::delete('image/category/'.$myImg);
        Category::find($id)->delete();

        return redirect()->route('route.admin.list_category');
    }

    public function editCategory($id) {
        $data = Category::find($id);
        return view('admin.edit_category',['data' => $data]);
    }

    public function updateCategory(edit_categoryRequest $request, $id) {

        $myImg = Category::find($id)->image;
        if ($request->fileImg == null) {
            $image = $myImg;
        } else {
            File::delete('image/category/'.$myImg);
            $image = $request->fileImg->getClientOriginalName();
            $file = $request->file('fileImg');
            $file->move('image/category',$image);
        }

        Category::find($id)->update([
            'name'  => $request->name,
            'image' => $image,
        ]);

        return redirect()->route('route.admin.list_category');
    }

    public function fillterCategory(Request $request) {

        $sort_type = $request->sort;
        $limit = $request->limit;
        switch ($sort_type) {
            case 'name asc':
                $product = DB::table('product')
                ->leftJoin('category', 'product.category', '=', 'category.id')
                ->select('product.*', 'category.name')
                ->orderBy('title', 'asc')
                ->limit($limit)
                ->get();
                break;
            case 'name desc':
                $product = DB::table('product')
                ->leftJoin('category', 'product.category', '=', 'category.id')
                ->select('product.*', 'category.name')
                ->orderBy('title', 'desc')
                ->limit($limit)
                ->get();
                break;
            case 'Price asc':
                $product = DB::table('product')
                ->leftJoin('category', 'product.category', '=', 'category.id')
                ->select('product.*', 'category.name')
                ->orderBy('price', 'asc')
                ->limit($limit)
                ->get();
                break;
            case 'Price desc':
                $product = DB::table('product')
                ->leftJoin('category', 'product.category', '=', 'category.id')
                ->select('product.*', 'category.name')
                ->orderBy('price', 'desc')
                ->limit($limit)
                ->get();
                break;
            default:
                $product = DB::table('product')
                ->leftJoin('category', 'product.category', '=', 'category.id')
                ->select('product.*', 'category.name')
                ->limit($limit)
                ->get();
        }
       
        return view('client.category', ['product' => $product]);
    }


    public function showCategory($id) {

        $product = DB::table('product')
        ->leftJoin('category', 'product.category', '=', 'category.id')
        ->select('product.*', 'category.name')
        ->where('category.id', $id)
        ->get();          
        return view('client.category', ['product' => $product]);
    }

    public function showTypeCategory($type) {

        switch ($type) {
            case 'all':
                $product = DB::table('product')
                ->leftJoin('category', 'product.category', '=', 'category.id')
                ->select('product.*', 'category.name')
                ->get();
                break;
            case 'men':
                $product = DB::table('product')
                ->leftJoin('category', 'product.category', '=', 'category.id')
                ->select('product.*', 'category.name')
                ->where('category.id', '4')
                ->get();  
                break;
            case 'women':
                $product = DB::table('product')
                ->leftJoin('category', 'product.category', '=', 'category.id')
                ->select('product.*', 'category.name')
                ->where('category.id', '3')
                ->get();  
                break;
            case 'new':
                $product = DB::table('product')
                ->leftJoin('category', 'product.category', '=', 'category.id')
                ->select('product.*', 'category.name')
                ->orderBy('created_at', 'desc')
                ->get();
                break;
            case 'old':
                $product = DB::table('product')
                ->leftJoin('category', 'product.category', '=', 'category.id')
                ->select('product.*', 'category.name')
                ->orderBy('created_at', 'asc')
                ->get();
                break;
            default:
                $product = DB::table('product')
                ->leftJoin('category', 'product.category', '=', 'category.id')
                ->select('product.*', 'category.name')
                ->where('category.id', $type)
                ->get();
          }    
        return view('client.category', ['product' => $product]);
    }
}
