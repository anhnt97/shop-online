<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use App\User;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use Hash;


use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        $slide  = Slide::all();
        $new_product = Product::where('new',1)->paginate(4);
        $sale_product = Product::where('promotion_price','<>' , 0)->paginate(8);
        return view('pages.trangchu',compact('slide','new_product','sale_product'));
    }
    public function getLoaiSP($type){
        $type_name = ProductType::where('id',$type)->first();
        $type_product = Product::where('id_type',$type)->paginate(8);
        $other_type = Product::where('id_type','<>',$type)->paginate(4);
        return view('pages.loai_sanpham',compact('type_product','other_type','type_name'));
    }
    public function getChiTietSP(Request $request){
        $product = Product::where('id',$request->id)->first();
        $other_product = Product::where('id_type',$product->id_type)->paginate(3);
        return view('pages.chitiet_sanpham',compact('product','other_product'));
    }
    public function getLienHe(){
        return view('pages.lien_he');
    }
    public function getGioiThieu(){
        return view('pages.gioi_thieu');
    }
    public function getAddToCart(Request $request,$id){
        if(asset($id)){
            $product = Product::find($id);
            $oldCart = Session('cart')?Session::get('cart'):null;
            $cart = new Cart($oldCart);
            $cart->add($product,$id);
            $request->session()->put('cart',$cart);
        }
        return redirect()->back();
    }
    public function getDeleteToCart(Request $request,$id){
        if(asset($id)){
            $oldCart = Session('cart')?Session::get('cart'):null;
                    $cart = new Cart($oldCart);
                    $cart->removeItem($id);
                    $request -> session() -> put('cart',$cart);
        }
        return redirect()->back();
    }
    public function getCheckout(){
        return view('pages.dat_hang');
    }
    public function postCheckout(Request $request){
        $cart = Session::get('cart');
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone;
        $customer->note = $request->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $request->payment;
        $bill->note = $request->notes;
        $bill->save();

        foreach ($cart->items as $key => $cart_item){
            $billDetail = new BillDetail;
            $billDetail->id_bill = $bill->id;
            $billDetail->id_product = $key;
            $billDetail->quantity = $cart_item['qty'];
            $billDetail->unit_price = $cart_item['price']/$cart_item['qty'];
            $billDetail->save();
        }
        Session::forget('cart');
        return redirect('trangchu')->with('alert','Đặt hàng thành công!');
    }
    public function getLogin(){
        return view('pages.dang_nhap');
    }
    public function getSignUp(){
        return view('pages.dang_ki');
    }
    public function postSignUp(Request $request){
        $this->validate($request,[
            'email' => 'required|email|unique:users,email' ,
            'password' => 'required|min:6|max:20' ,
            'fullname' => 'required',
            're_password' => 'required|same:password' ,
        ],[
            'email.required' => 'Vui lòng nhập email' ,
            'email.email' => 'Không đúng định dạng email' ,
            'email.unique' => 'Email đã có người sử dụng' ,
            'password.required' => 'Vui lòng nhập mật khẩu' ,
            're_password.same' => 'Mật khẩu không giống nhau' ,
            'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự' ,
            'password.max' => 'Mật khẩu tối đa 20 kí tự'

        ]);
        $user = new User();
        $user->full_name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }
    public function postLogin(Request $request){
        $users = User::all();
        $this->validate($request,[
            'email' => 'required|email' ,
            'password' => 'required|min:6|max:20',

        ],[
            'email.required' => 'Vui lòng nhập email' ,
            'email.email' => 'Email không đúng định dạng' ,
            'password.required' => ' Vui lòng nhập mật khẩu' ,
            'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự'
        ]);
        $credentials = array('email' => $request->email,'password' => $request->password);
        if(Auth::attempt($credentials)){
            return redirect()->route('trangchu')->with(['flag'=> 'success','thongbao'=>'Đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag'=> 'danger','thongbao'=>'Đăng nhập thất bại']);
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('trangchu');
    }
    public function getTimKiem(Request $request){
        $product = Product::where('name','like','%'.$request->key.'%')
                            ->orWhere('unit_price',$request->key)->paginate(8);
        return view('pages.tim_kiem',compact('product'));
    }
}