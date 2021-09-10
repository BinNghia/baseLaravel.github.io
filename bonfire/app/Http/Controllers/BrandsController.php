<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Brands;

class BrandsController extends Controller
{
    //
    public function getIndex()
    {
        $brands = Brands::all();
        return view('admin.brands.list', ['brands' => $brands]);
    }

    public function getEdit($id)
    {
        $brands = Brands::Find($id);
        return view('admin.brands.edit', ['brands' => $brands]);
    }

    public function postEdit(Request $request, $id)
    {
        $brands = Brands::Find($id);
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
            $brands->urlHinh = $tenhinh;
        } else {
            $brands->urlHinh = "";
        }
        $brands->Url = $request->Url;
        $brands->save();
        return redirect('admin/brands/edit/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getAdd()
    {
        return view('admin.brands.add');
    }

    public function postAdd(Request $request) {
        $brands = new Brands;
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
            $brands->urlHinh = $tenhinh;
        } else {
            $brands->urlHinh = "";
        }
        $brands->Url = $request->Url;
        $brands->save();
        return redirect('admin/brands/add')->with('thongbao', 'Thêm thành công');
    }

    public function getDelete($id) {
        $brands = Brands::find($id);
        $brands->delete();

        return redirect('admin/brands/list')->with('thongbao', 'Bạn đã xóa thành công');
    }
}
