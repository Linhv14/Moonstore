<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\postRequest;
use App\Http\Requests\edit_postRequest;
use App\Models\Post;
use File;

class PostController extends Controller
{
    public function save(postRequest $request) {

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
        
        return redirect('admin-list-post');
    }

    public function delete($id) {
        $myImg = Post::find($id)->image;
        File::delete('image/post/'.$myImg);
        Post::find($id)->delete();
        return redirect('admin-list-post');
    }

    public function edit($id) {
        $post = Post::find($id);
        return view('admin.post.edit',['post' => $post]);
    }

    public function update(edit_postRequest $request, $id) { 
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

      return redirect('admin-list-post');
    }
}
