<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\postRequest;
use App\Http\Requests\edit_postRequest;
use App\Models\Post;
use File;

class PostController extends Controller
{
    public function listPost() {
        $data = Post::get();
        return view('admin.list_post',['data' => $data]);
  
    }

    public function addPost() {
        return view('admin.add_post');
    }

    public function savePost(postRequest $request) {

        $nameImg = $request->fileImg->getClientOriginalName();
        $file = $request->file('fileImg');
        $file->move('image/post', $nameImg);

        Post::create([
            'title'         => $request->txtTitle,
            'description'   => $request->txtDescription,
            'author'        => $request->txtAuthor,
            'content'       => $request->txtContent,
            'image'         => $nameImg,
        ]);
        
        return redirect()->route('route.admin.list_post');
    }

    public function deletePost($id) {
        $myImg = Post::find($id)->image;
        File::delete('image/post/'.$myImg);
        Post::find($id)->delete();
        return redirect()->route('route.admin.list_post');
    }

    public function editPost($id) {
        $data = Post::find($id);
        return view('admin.edit_post',['data' => $data]);
    }

    public function updatePost(edit_postRequest $request, $id) { 
        $myImg = Post::find($id)->image;
        if ($request->fileImg == null) {
            $image = $myImg;
        } else {
            File::delete('image/post/'.$myImg);
            $image = $request->fileImg->getClientOriginalName();
            $file = $request->file('fileImg');
            $file->move('image/post',$image);
        }
        Post::find($id)->update([
            'title'         => $request->txtTitle,
            'description'   => $request->txtDescription,
            'content'       => $request->txtContent,
            'author'        => $request->txtAuthor,
            'image'         => $image,
        ]);

      return redirect()->route('route.admin.list_post');
    }
}
