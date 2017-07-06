<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    //显示幻灯列表
    public function slideList()
    {
        $slides = Slide::all();
        return view('Admin.slideshowList')->with('slides', $slides);
    }

    //添加图片
    public function slideAdd(Request $request)
    {
        $data = $request->all();
        if ($request->isMethod('post')) {
            $img = $request->file('picture');
            if ($img) {
                $info = $img->store('uploads');
                $data['picture'] = $info;
            }
            Slide::create($data);
            return redirect('admin/list_slideshow');
        }
        return view('Admin.add_slideshow');
    }

    //编辑图片
    public function slideEdit(Request $request, $id)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $img = $request->file('picture');
            if ($img) {
                $info = $img->store('uploads');
                $data['picture'] = $info;
            }
            $slide = Slide::findOrFail($id);
            Storage::delete($slide->picture);
            $slide->update($data);
            return redirect('admin/list_slideshow');
        }
        $slide = Slide::findOrFail($id);
        return view('Admin.edit_slideshow', compact('slide'));
    }

    //删除图片
    public function slideDele($id)
    {
        $name = Slide::findOrFail($id)->picture;
        Slide::where('id', $id)->delete();
        Storage::delete($name);
        return redirect('admin/list_slideshow');
    }
}
