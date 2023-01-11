<?php

namespace App\Http\Controllers;

use App\Models\categoryModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class categoryController extends Controller
{
    public function index(){
        $categories=categoryModel::all();
        return view('category.index',compact('categories'));
    }

    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|unique:categories',
            'description'=>'required'
        ]);

        $category= new categoryModel();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        Alert::success("Successfully Inserted");
        return redirect()->route('category.index');
    }

    public function edit($id){
        $category = categoryModel::find($id);
        return view('category.edit',compact('category'));
    }

    public function update(Request $request){
        $request->validate([
            'categoryId'=>'required',
            'name'=>'required|unique:categories,name,'.$request->categoryId.',categoryId',
            'description'=>'required'
        ]);

        $category=categoryModel::find($request->categoryId);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        Alert::success("Successfully Updated");
        return redirect()->route('category.index');
    }

    public function destroy($id){
        categoryModel::find($id)->delete();
        Alert::success("Successfully Deleted");
        return redirect()->route('category.index');
    }


}
