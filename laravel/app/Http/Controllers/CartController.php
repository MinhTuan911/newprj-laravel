<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CartController extends Controller
{
    //
    public function addcart (Request $request)
    {
        //Lay du lieu tu form
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        //Lay thong tin tu model carr
        $car = Car::findOrFail($productId);
        
        //Kiem tra so luong trong kho
        if($quantity > $car->amount) {
            return redirect()-> back()->with('error', 'No slot!');
        }
        //Lay gio hang tu session neu chua co thi tao moi
        $cart = session()->get('cart', []);

        //Kiem tra xem xe da co trong gio hang chua
        if(isset($cart[$productId])){
            //Neu co tang so luong
            $cart[$productId]['quantity'] += $quantity;
        } else {
            //Neu chua co, them moi
            $cart[$productId] = [
                'id' => $car->id,
                'name' => $car->name,
                'brand' => $car->brand->name ?? $car->brand, // Lấy tên thương hiệu nếu có quan hệ
                'price' => $car->price,
                'image' => $car->image,
                'quantity' => $quantity,
            ];
        }
        //Luu gio hang vao session
        session()->put('cart', $cart);

        //Chuyen huong dang trang xac nhan 
        return redirect()->route('viewcart')->with('success', 'Đã thêm xe vào giỏ hàng!');    }
    public function viewCart()
    {
        return view('crud_car.cart'); // Trả về view xác nhận
    }
    public function updatecart(Request $request, $id)
    {
        $cart = session()->get('cart', []);
    
        if (!isset($cart[$id])) {
            return back()->with('error', 'Sản phẩm không tồn tại trong giỏ hàng!');
        }
    
        // Lấy thông tin sản phẩm từ database
        $car = Car::find($id);
        if (!$car) {
            return back()->with('error', 'Sản phẩm không tồn tại!');
        }
    
        // Kiểm tra hành động (tăng/giảm số lượng)
        if ($request->action == 'increase') {
            if ($cart[$id]['quantity'] < $car->amount) {
                $cart[$id]['quantity'] += 1;
            } else {
                return back()->with('error', '⚠️ Không thể thêm quá số lượng có trong kho!');
            }
        } elseif ($request->action == 'decrease') {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity'] -= 1;
            }
        }
    
        session()->put('cart', $cart);
        return back()->with('success', 'Cập nhật số lượng thành công!');
    }

public function removecart($id)
{
    $cart = session()->get('cart', []);
    
    if(isset($cart[$id])) {
        unset($cart[$id]);
    }

    session()->put('cart', $cart);
    return back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
}
}

