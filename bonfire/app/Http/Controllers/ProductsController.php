<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Products;

class ProductsController extends Controller
{
    //
    public function getIndex()
    {
        $products = Products::all();
        return view('admin.products.list', ['products' => $products]);
    }

    public function getEdit($id)
    {
        $products = Products::Find($id);
        return view('admin.products.edit', ['products' => $products]);
    }

    public function postEdit(Request $request, $id)
    {
        $products = Products::Find($id);
        $this->validate($request, 
        [
            'name' => 'required|min:3|max:100',
            'unit_price' => 'required',
            'promotion_price' => 'required',
        ],
        [
            'name.required' => 'Không được để trống',
            'name.min' => 'Tên sản phẩm phải có độ dài từ 3 tới 100 kí tự',
            'name.max' => 'Tên sản phẩm phải có độ dài từ 3 tới 100 kí tự',
            'unit_price' => 'Không được để trống',
            'promotion_price' => 'Không được để trống',
        ]);
        $products->name = $request->name;
        $products->description = $request->description;
        $products->unit_price = $request->unit_price;
        $products->promotion_price = $request->promotion_price;
        if($request->hasFile('image')){
            $file = $request->file('image');
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
            $products->image = $tenhinh;
        } else {
            $products->image = "";
        }
        $products->new = $request->new;
        $products->save();
        return redirect('admin/products/edit/'.$id)->with('thongbao', 'Sửa thành công');

    }

    public function getAdd()
    {
        return view('admin.products.add');
    }

    public function postAdd(Request $request) {
        $this->validate($request, 
        [
            'name' => 'required|min:3|max:100',
            'unit_price' => 'required',
            'promotion_price' => 'required',
        ],
        [
            'name.required' => 'Không được để trống',
            'name.min' => 'Tên sản phẩm phải có độ dài từ 3 tới 100 kí tự',
            'name.max' => 'Tên sản phẩm phải có độ dài từ 3 tới 100 kí tự',
            'unit_price' => 'Không được để trống',
            'promotion_price' => 'Không được để trống',
        ]);
        $products = new Products;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->unit_price = $request->unit_price;
        $products->promotion_price = $request->promotion_price;
        if($request->hasFile('image')){
            $file = $request->file('image');
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
            $products->image = $tenhinh;
        } else {
            $products->image = "";
        }
        $products->new = $request->new;
        $products->save();
        return redirect('admin/products/add')->with('thongbao', 'Thêm thành công');
    }

    public function getDelete($id) {
        $products = Products::find($id);
        $products->bill_detail()->delete();
        $products->delete();
        
        return redirect('admin/products/list')->with('thongbao', 'Bạn đã xóa thành công');
    }
}
