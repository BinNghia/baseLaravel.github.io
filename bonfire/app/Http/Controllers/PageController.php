<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Products;
use App\Blogs;
use App\Brands;
use App\Cart;
use App\User;
use App\Bills;
use App\BillDetail;
use Session;

use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    function __construct(){
        $products = Products::all();
        $blogs = Blogs::all();
        $brands = Brands::all();
        view()->share('products',$products);
        view()->share('blogs',$blogs);
        view()->share('brands',$brands);

        if (Auth::check()) {
            view()->share('nguoidung',Auth::user());
        }
    }

    public function getIndex()
    {
        $products = Products::where('new',1)->paginate(8);
        return view('page.trangchu',compact('products'));
    }
    public function getCheckOut()
    {
        if(Session('cart')){
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            return view('page.checkout',['product_cart'=>$cart->items, 'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty]);
        } else {
            return view('page.checkout');
        }
       
    }

    public function postCheckOut(Request $request){
        $cart = Session::get('cart');
        
        $user = Auth::user();
        $user->full_name = $request->full_name;
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->note = $request->note;

        $bills = new Bills;
        $bills->id_user = $user->id;
        $bills->date_order = date('Y-m-d');
        $bills->total = $cart->totalPrice;
        $bills->payment = $request->payment;
        $bills->note = $request->note;
        $bills->save();

        foreach ($cart->items as $key => $value) {
            // code...
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bills->id;
            $bill_detail->id_product= $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','?????t h??ng th??nh c??ng');
    }
    
    public function getLogin() {
        return view('page.login');
    }

    public function postLogin(Request $request) {
        $this->validate($request, 
        [
            'name' => 'required',
            'password' => 'required'
        ],
        [
            'name.required' => 'B???n ch??a nh???p Username',
            'password.required' => 'Password kh??ng ???????c tr???ng'
            
        ]);

        if(Auth::attempt(['name' => $request->name, 'password' => $request->password, 'idGroup' => 0 ])) 
        {
            return redirect('trangchu');
        } else {
            return redirect('login')->with('thongbao', '????ng nh???p th???t b???i');
        }
    }

    function getLogout(){
        Auth::logout();
        return redirect('trangchu');
    }

    public function getProduct() {
        $products = Products::where('unit_price','<>',0)->orWhere('promotion_price','<>',0)->paginate(16);
        return view('page.product',compact('products'));
    }

    public function getAbout() {
        return view('page.about');
    }

    public function getServices() {
        return view('page.services');
    }

    public function getPortfolio() {
        return view('page.portfolio');
    }

    public function getContact() {
        return view('page.contact');
    }

    public function getBlog() {
        return view('page.blog');
    }

    public function getShoppingCart()
    {
        return view('page.shopping_cart');   
    }

    public function getSignUp() {
        return view('page.signup');
    }

    public function postSignUp(Request $request){
        $this->validate($request, 
        [
            'name' => 'required|min:3|unique:users,name', 
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:30',
            'passwordAgain' => 'required|same:password'
        ],
        [
            'name.required' => 'B???n ch??a nh???p name',
            'name.min' => 'name >= 3 k?? t???',
            'name.unique' => 'name n??y ???? t???n t???i',
            'email.required' => 'B???n ch??a nh???p email',
            'email.email' => 'B???n ch??a nh???p ????ng ?????nh d???ng email',
            'email.unique' => 'email n??y ???? t???n t???i',
            'password.required' => 'B???n ch??a nh???p password',
            'password.min' => 'password >= 3 k?? t???',
            'password.max' => 'password <= 30 k?? t???',
            'passwordAgain.required' => 'B???n ch??a nh???p l???i password',
            'passwordAgain.same'=>'M???t kh???u nh???p l???i ch??a ????ng'
        
        ]);

        $user = new User;
        $user->full_name = $request->full_name;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->birth = $request->birth;
        $user->gender = $request->gender;
        $user->idGroup = 0;
        $user->note = $request->note;
        $user->save();
        return redirect('login')->with('thongbao', '????ng k?? th??nh c??ng');
    }

    public function getAddtoCart(Request $request, $id){
        $product = Products::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $request->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getDelItemCart($id){
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getEdit(){
        return view('page.edit');
    }

    public function postEdit(Request $request){
        $users = Auth::User();
        $this->validate($request, 
        [
            'name' => 'required|min:3|unique:users,name',
        ],
        [
            'name.required' => 'B???n ch??a nh???p name',
            'name.min' => 'name >= 3 k?? t???',
            'name.unique' => 'name n??y ???? t???n t???i',
        ]);

        $users->full_name = $request->full_name;
        $users->name = $request->name;
        
        if($request->changePassword == "on"){
            $this->validate($request,[
                'password' => 'required|min:3|max:30',
                'passwordAgain' => 'required|same:password'

            ],[
                'password.required' => 'B???n ch??a nh???p password',
                'password.min' => 'password >= 3 k?? t???',
                'password.max' => 'password <= 30 k?? t???',
                'passwordAgain.required' => 'B???n ch??a nh???p l???i password',
                'passwordAgain.same' => 'M???t kh???u nh???p l???i kh??ng ????ng'
            ]);
            $users->password = bcrypt($request->password);
        }

        $users->email = $request->email;
        $users->address = $request->address;
        $users->phone_number = $request->phone_number;
        $users->birth = $request->birth;
        $users->gender = $request->gender;
        $users->idGroup = 0;
        $users->note = $request->note;
        $users->save();
        
        return redirect('edit')->with('thongbao', 'S???a th??nh c??ng');
    }

    function search(Request $request)
    {
            $keyword= $request->keyword;
            $products = Products::where('name','like',"%$keyword%")->orWhere('unit_price','like',"%$keyword%")->orWhere('promotion_price','like',"%$keyword%")->take(20)->paginate(4);
            return view('page.search', ['products'=>$products, 'keyword'=>$keyword]);
    }
}
