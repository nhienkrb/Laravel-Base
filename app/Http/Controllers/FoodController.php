<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::all();

        return view('food.food-show', compact('foods'));
    }
    public function create()
    {
        $food = Food::all();
        return view('food.food-create', compact('food'));
    }

    public function store(Request $request)
    {
        // $request->file('image')->guessExtension(); // get đuôi file (png, jpg, ...)
        // $request->file('image')->getMimeType(); // get kiểu file (image/png, image/jpg, ...)
        // $request->file('image')->getClientOriginalName(); // get tên file
        // $request->file('image')->getSize(); // get kích thước file
        // $request->file('image')->storeAs('public/images', $request->file('image')->getClientOriginalName()); // lưu file vào thư mục public/images
        // $request->file('image')->move('public/images', $request->file('image')->getClientOriginalName()); // di chuyển file vào thư mục public/images
        // $request->file('image')->store('public/images'); // lưu file vào thư mục public/images
        // $request->file('image')->move('public/images'); // di chuyển file vào thư mục public/images
        $request->validate([
            'foodName' => 'required',
            'foodPrice' => 'required|integer | min:1',
            'foodQuality' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $generateName = 'image' . '-' . time() . '-' . $request->file('image')->getClientOriginalName();
        $food = new Food();
        $food->name = $request->input('foodName');
        $food->price = $request->input('foodPrice');
        $food->quality = $request->input('foodQuality');
        $food->category_id = $request->input('category');
        $request->file('image')->move(public_path('image'), $generateName);
        $food->image_path = $generateName;
        $food->save();
        return redirect()->route('food.index');
    }

    public function show($id)
    {
        $food = Food::findOrFail($id);
        return view('food.food-create', compact('food'));
    }

    public function edit($id)
    {
        $food = Food::findOrFail($id);
        return view('food.food-edit', compact('food'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'foodName' => 'required',
            'foodPrice' => 'required',
            'foodQuality' => 'required'
        ]);
        Food::where('id', $id)->update([
            'name' => $request->input('foodName'),
            'price' => $request->input('foodPrice'),
            'quality' => $request->input('foodQuality')
        ]);
        return redirect('/food');
    }

    public function destroy($id)
    {
        // $food = Food::findOrFail($id);
        // $food->delete();
        Food::where('id', $id)->delete();
        return redirect('/food');
    }
}
