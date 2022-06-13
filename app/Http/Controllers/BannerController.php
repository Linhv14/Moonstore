<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\bannerRequest;
use App\Http\Requests\edit_bannerRequest;
use App\Models\Banner;
use File;

class BannerController extends Controller
{

    public function save(bannerRequest $request) {

        $nameImg = $request->fileImg->getClientOriginalName();
        $file = $request->file('fileImg');
        $file->move('image/banner', $nameImg);

        Banner::create([
            'title'         => $request->txtTitle,
            'image'         => $nameImg,
        ]);
        
        return redirect('admin-list-banner');
    }

    public function delete($id) {

        $myImg = Banner::find($id)->image;
        File::delete('image/banner/'.$myImg);
        Banner::find($id)->delete();

        return redirect('admin-list-banner');
    }

    public function edit($id) {
        $banner = Banner::find($id);
        return view('admin.banner.edit',['banner' => $banner]);
    }

    public function update(edit_bannerRequest $request, $id) {

        $myImg = Banner::find($id)->image;
        if ($request->fileImg == null) {
            $image = $myImg;
        } else {
            File::delete('image/banner/'.$myImg);
            $image = $request->fileImg->getClientOriginalName();
            $file = $request->file('fileImg');
            $file->move('image/banner',$image);
        }

        Banner::find($id)->update([
            'title'         => $request->txtTitle,
            'image'         => $image,
        ]);

        return redirect('admin-list-banner');
    }
}
