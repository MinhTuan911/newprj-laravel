<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function index()
    {
        // Hiển thị trang dashboard cho thương hiệu
        return view('index');
    }

    public function addBrand()
    {
        // Hiển thị form thêm mới thương hiệu
        return view('crud_brand.addbrand');
    }

    public function storeBrand(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Tạo mới một thương hiệu
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->save();

        return redirect()->route('listbrand')->with('success', 'Brand added successfully');
    }
    public function updateBrand(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
    
        $brand = Brand::findOrFail($id);
    
        $brand->name = $request->input('name');
        $brand->save();
    
        return redirect("listbrand")->with('message','Brand updated successfully');
    }
    
    public function editBrand($id)
    {
        $brand = Brand::findOrFail($id); // Lấy danh sách các thương hiệu
        return view('crud_brand.edit', compact('brand')); // Truyền biến $brands vào view
    }
    public function listBrand()
    {
        // Lấy danh sách các thương hiệu từ cơ sở dữ liệu
        $brands = Brand::paginate(2);
        // Trả về view 'brands.listbrand' kèm theo dữ liệu về danh sách các thương hiệu
        return view('crud_brand.listbrand', ['brands' => $brands]);
    }

    public function deleteBrand($id)
    {
        // Tìm và xóa thương hiệu theo ID
        $brand = Brand::find($id);
        // if (!$brand) {
        //     return redirect()->back()->with('error', 'Brand not found');
        // }
        // Xóa dữ liệu thương hiệu khỏi cơ sở dữ liệu
        $brand->delete();

        // Chuyển hướng về trang danh sách thương hiệu với thông báo thành công
        return redirect("listbrand")->with('message', 'Brand deleted successfully');
    }

    public function showBrand($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return redirect()->back()->with('error', 'Brand not found');
        }
    
        return view('crud_brand.show', ['brand' => $brand]);
    }
}