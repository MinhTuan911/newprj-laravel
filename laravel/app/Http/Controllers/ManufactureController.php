<?php

namespace App\Http\Controllers;

use App\Models\Manufacture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ManufactureController extends Controller
{
    public function index()
    {
        return view('index');
    }

        // Hiển thị form tạo mới nhà sản xuất
        public function create()
        {
            return view('crud_manufacture.create');
        }
          // Lưu thông tin nhà sản xuất mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $manufacture = new Manufacture();
        $manufacture->name = $request->name;
        $manufacture->save();   
        return redirect()->route('listmanufacture')->with('success', 'Manufacture created successfully!');
    }
       // Hiển thị thông tin của một nhà sản xuất cụ thể
       public function show($id)
       {
           $manufacture = Manufacture::findOrFail($id);
           return view('crud_manufacture.show', compact('manufacture'));
       }
   
       // Hiển thị form chỉnh sửa nhà sản xuất
       public function edit($id)
       {
           $manufacture = Manufacture::findOrFail($id);
           return view('crud_manufacture.edit', compact('manufacture'));
       }
   
       // Cập nhật thông tin nhà sản xuất
       public function update(Request $request, $id)
       {
           $request->validate([
               'name' => 'required|string|max:255',
           ]);
   
           $manufacture = Manufacture::findOrFail($id);
           $manufacture->name = $request->input('name');

        $manufacture->save();
   
           return redirect()->route('listmanufacture')->with('success', 'Manufacture updated successfully!');
       }
   
       // Xóa một nhà sản xuất
       public function delete($id)
       {
           $manufacture = Manufacture::findOrFail($id);
           $manufacture->delete();
   
           return redirect()->route('listmanufacture')->with('success', 'Manufacture deleted successfully!');
       }
       //danh sach
       public function list()
       {
           $manufactures = Manufacture::paginate(2); // Hiển thị 2 bản ghi mỗi trang
           return view('crud_manufacture.list', ['manufactures' => $manufactures]);
       }
   
    
}