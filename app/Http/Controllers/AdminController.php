<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));

    }


    public function add_category(Request $request)
    {
//        Category::create($request->all());
//        return redirect()->back()->with('success','Category added successfully');
//

        $data = new Category;
        $data->name = $request->category;
        $data->save();
        \Flasher\Prime\flash()->timeout(3000)->success('Category added successfully');
        return redirect()->back();
    }


    public function delete_category($id)
    {

        $data = Category::find($id);
        $data->delete();
        \Flasher\Prime\flash()->timeout(3000)->success('Category deleted successfully');
        return redirect()->back();


    }


    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }


    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->name = $request->category;
        $data->save();
        \Flasher\Prime\flash()->timeout(3000)
            ->success('Category updated successfully');
        return redirect('/view_category');
    }

    public function add_product()
    {

        $category = Category::all();
        return view('admin.add_product', compact('category'));


    }

    public function upload_product(Request $request)
    {
        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category_id = $request->category_id;

        $image = $request->image;
        if ($image) {
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $image_name);
            $data->image_url = $image_name;
        }

        $data->save();
        \Flasher\Prime\flash()->timeout(3000)->success('Product added successfully');
        return redirect()->back();
    }

    public function view_product()
    {
        $product = Product::paginate(3);
        return view('admin.view_product', compact('product'));
    }

    public function edit_product()
    {

    }


    public function delete_product($id)
    {
        $product = Product::find($id);
        $image_path = public_path('products/' . $product->image_url);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $product->delete();
        \Flasher\Prime\flash()->timeout(3000)->success('Product deleted successfully');
        return redirect()->back();
    }

}
