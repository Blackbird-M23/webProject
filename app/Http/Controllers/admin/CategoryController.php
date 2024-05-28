<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Return_;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
       
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);

        // if($validator->fails()){
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        // else{
        //     return response()->json([
        //         'status' => true,
        //         'message' => 'Category Created Successfully'
        //     ]);
        // }
        if($validator->passes()){
            $category = new Category();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->name = $request->status;
            $category->save();


            $request->session()->flash('success', 'category added successfully');

            return response()->json([
                'status' => true,
                'message' => 'category added successfully'
            ]);

        }
        else{
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ]);
        }
    }

    public function edit(){
        
    }
    public function update(){
        
    }
    public function destroy(){
        
    }
}
