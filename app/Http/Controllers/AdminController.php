<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return back()
                ->withErrors(['email' => 'Email not found'])
                ->withInput();
        }
        if($request->password != $admin->password){
            return back()
                ->withErrors(['password' => 'Incorrect password'])
                ->withInput();
        }
        Session::put('admin', $admin->id);
        Session::put('admin_name', $admin->name);


        return redirect()->route('dashboard');
    }
    function addCategory(Request $request){
        $request->validate([
            'category' => 'required|string|max:255'
        ]);
        if(Category::where('name', $request->category)->exists()){
            return back()
                ->withErrors(['category' => 'Category already exists'])
                ->withInput();
        }
        $category = new Category();
        $category->name = $request->category;
        $category->created_by = Session::get('admin_name');
        $category->save();
        if($category->save()){
            Session::flash('success', 'Category added successfully');
            return redirect()->route('categories');
        }
        
    }
    function getCategories(){
        $categories = Category::all();
        return view('adminPages.categories',[
            "categories" => $categories
        ]);
    }
    function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        Session::flash('success', 'Category deleted successfully');
        return redirect()->route('categories');
    }
}
