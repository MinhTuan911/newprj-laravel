<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Brand;
use App\Models\Manufacture;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Show form to add new car
     */
    public function index()
    {
        return view('index');
    }

    public function addCar()
    {
        $brands = Brand::all();
        $manufactures = Manufacture::all();
        return view('crud_car.addcar', ['brands' => $brands], ['manufactures' => $manufactures]);
    }
    /**
     * Store a newly created car in storage.
     */
    public function storeCar(Request $request)
{
    $request->validate([
        'name' => 'required',
        'brand' => 'required',
        'manufacture' => 'required',
        'price' => 'required|numeric',
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Hình chính
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Hình phụ
        'amount' => 'required|integer',
    ]);

    // Lưu hình chính
    $mainImageName = null;
    if ($request->hasFile('image')) {
        $mainImage = $request->file('image');
        $mainImageName = time() . '_main.' . $mainImage->getClientOriginalExtension();
        $mainImage->move(public_path('images'), $mainImageName);
    }

    // Tạo xe mới
    $car = Car::create([
        'name' => $request->name,
        'brand' => $request->brand,
        'manufacture' => $request->manufacture,
        'price' => $request->price,
        'description' => $request->description,
        'image' => $mainImageName,
        'amount' => $request->amount,
    ]);

    // Lưu hình ảnh phụ
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);

            $car->images()->create(['image' => $imageName]);
        }
    }

    return redirect()->route('listcar')->with('success', 'Xe đã được thêm thành công!');
}
    public function listCar()
    {

        // Lấy danh sách các xe từ cơ sở dữ liệu, sắp xếp theo created_at giảm dần và phân trang
        $cars = Car::orderBy('created_at', 'desc')->paginate(6);
        // if($key = request()->key){
        if ($key = request()->key) {
            //dd(request()->key);
            $cars = Car::where('name', 'like', '%' . $key . '%')->paginate(6);
        }
        // }
        // Trả về view 'cars.listcar' kèm theo dữ liệu về danh sách các xe
        return view('crud_car.listcar', compact('cars'));
    }
    public function deleteCar($id)
    {
        // Tìm và xóa xe theo ID
        $car = Car::find($id);
        if (!$car) {
            return redirect()->back()->with('error', 'Car not found');
        }

        // Xóa tệp tin hình ảnh của xe
        if (File::exists(public_path('images/' . $car->image))) {
            File::delete(public_path('images/' . $car->image));
        }

        // Xóa dữ liệu xe khỏi cơ sở dữ liệu
        $car->delete();

        // Chuyển hướng về trang danh sách xe với thông báo thành công
        return redirect("listcar")->with('message', 'Car deleted successfully');
    }
    // //Tim kiem
    // public function TimKiemCar(Request $request)
    // {
    //     $ten = $request->timkiem;
    //     $car = Car::find($ten);
    //     if (!$car) {
    //         return redirect()->back()->with('error', 'Car not found');
    //     }

    //     return view('cars.show', ['car' => $car]);
    // }
    public function showCar($id)
    {
        $car = Car::with('images')->find($id); // Sử dụng quan hệ để lấy hình ảnh phụ
        if (!$car) {
            return redirect()->back()->with('error', 'Car not found');
        }

        return view('crud_car.show', ['car' => $car]);
    }
    public function updateCar(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'manufacture' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'amount' => 'required|integer',
        ]);


        $car = Car::findOrFail($id);

        $car->name = $request->input('name');
        $car->brand = $request->input('brand');
        $car->manufacture = $request->input('manufacture');
        $car->price = $request->input('price');
        $car->description = $request->input('description');
        $car->amount = $request->input('amount');

        if ($request->hasFile('image')) {
            // Xử lý việc lưu file ảnh và lấy đường dẫn đã lưu
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            // Xóa hình ảnh cũ nếu có
            if (File::exists(public_path('images/' . $car->image))) {
                File::delete(public_path('images/' . $car->image));
            }
            // Lưu hình ảnh mới
            $car->image = $imageName;
        }

        $car->save();

        return redirect("listcar")->with('message', 'Car updated successfully');
    }

    public function editCar($id)
    {
        $car = Car::findOrFail($id);
        $brands = Brand::all(); // Lấy danh sách các thương hiệu
        $manufactures = Manufacture::all(); // Lấy danh sách các thương hiệu
        return view('crud_car.edit', compact('car', 'brands', 'manufactures')); // Truyền biến $brands vào view
    }
}
