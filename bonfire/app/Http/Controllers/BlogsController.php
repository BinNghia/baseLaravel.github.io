<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Blogs;

class BlogsController extends Controller
{
    //
    public function getIndex()
    {
        $blogs = Blogs::all();
        return view('admin.blogs.list', ['blogs' => $blogs]);
    }

    public function getEdit($id)
    {
        $blogs = Blogs::Find($id);
        return view('admin.blogs.edit', ['blogs' => $blogs]);
    }

    public function postEdit(Request $request, $id)
    {
        $blogs = Blogs::Find($id);
        $this->validate($request, 
        [
            'description' => 'required',
        ],
        [
            'description.required' => 'Không được để trống',
        ]);
        if($request->hasFile('urlHinh')){
            $file = $request->file('urlHinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != "jpg" && $duoi != "png" && $duoi != "jpeg")
            {
                // return redirect('admin/tintuc/them')->with('loi', 'Chỉ được chọn file jpg, png, jpeg'); 
                return redirect()->back()->with('Error', 'Chỉ được chọn file jpg, png, jpeg');
            }

            $name = $file->getClientOriginalName();
            $tenhinh = str_random()."_".$name;
            while(file_exists("assets/img/".$tenhinh)) {
                $tenhinh = str_random()."_".$name;
            }
            $file->move("assets/img",$tenhinh);
            $blogs->urlHinh = $tenhinh;
        } else {
            $blogs->urlHinh = "";
        }
        $blogs->description = $request->description;
        $blogs->views = $request->views;
        $blogs->likes = $request->likes;
        $blogs->save();
        return redirect('admin/blogs/edit/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getAdd()
    {
        return view('admin.blogs.add');
    }

    public function postAdd(Request $request) {
        $this->validate($request, 
        [
            'description' => 'required',
        ],
        [
            'description.required' => 'Không được để trống',
        ]);

        $blogs = new Blogs;
        if($request->hasFile('urlHinh')){
            $file = $request->file('urlHinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != "jpg" && $duoi != "png" && $duoi != "jpeg")
            {
                // return redirect('admin/tintuc/them')->with('loi', 'Chỉ được chọn file jpg, png, jpeg'); 
                return redirect()->back()->with('Error', 'Chỉ được chọn file jpg, png, jpeg');
            }

            $name = $file->getClientOriginalName();
            $tenhinh = str_random()."_".$name;
            while(file_exists("assets/img/".$tenhinh)) {
                $tenhinh = str_random()."_".$name;
            }
            $file->move("assets/img",$tenhinh);
            $blogs->urlHinh = $tenhinh;
        } else {
            $blogs->urlHinh = "";
        }
        $blogs->description = $request->description;
        $blogs->views = $request->views;
        $blogs->likes = $request->likes;
        $blogs->save();
        return redirect('admin/blogs/add')->with('thongbao', 'Thêm thành công');
    }

    public function getDelete($id) {
        $blogs = Blogs::find($id);
        $blogs->delete();

        return redirect('admin/blogs/list')->with('thongbao', 'Bạn đã xóa thành công');
    }
}
