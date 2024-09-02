<?php

namespace App\Http\Controllers;

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
        return view('admin.edit_category',compact('data'));
    }


    public function update_category(Request $request,$id)
    {
      $data = Category::find($id);
      $data->name = $request->category;
      $data->save();
        \Flasher\Prime\flash()->timeout(3000)
            ->success('Category updated successfully');
      return redirect('/view_category');
    }


}
