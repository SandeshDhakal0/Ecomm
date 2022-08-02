<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DB;
use File;
class CategoryController extends Controller
{
    private $category = null;

    public function __construct(Category $category){
        $this->category = $category;
    }

    public function getCategories(){
       $data = $this->category->orderBy('title','DESC')->get();
        return view('admin.category')->with('category', $data);
    }

    public function showDetail(Request $request){
        dd($request->id);
    }

    public function deleteCategory(Request $request, $success){

        $cat_info = $this->category->find($request->id);                      // category Obj
        if(!$cat_info){
            //TODO: Setup Custom notification message to user
            return redirect()->back();
        }

        $cat_info->delete();        //Delete From categories WHERE id = $cat_info->id;

        if($success){
            //TODO:Set Custom success notification
        } else {
            //TODO: Set custom error message on notification
        }
        return redirect()->back();
    }

    public function showForm(){

        $all_parents = $this->category->whereNull('parent_id')->get();
        return view('admin.category-form')->with("parent_cats",$all_parents);
    }

    public function addCategory(Request $request){
        //Validate
        $rules = array(
            'title' => "required|string",
            "status" => ["required","in:active,inactive"],
            'parent_id' => "nullable|exists:categories,id",
            "image" => "sometimes|image|max:5000"
        );
        $request->validate($rules);
        //to receive all the data from the form
        $data = $request->except(['_token','image']);

        if($request->image){
            $file_name = uploadImage('category', $request->image);
            if($file_name){
                $data['image'] = $file_name;
            }
        }


        $data['slug'] = \Str::slug($request->title);


        $response = $this->category->create($data);        //insert, obj
        if ($response){
            return redirect()->route('category.index');
        } else {
            return redirect()->route('category.index');
        }



        //dd($data);
        //to receive certain data from the form
//        $data = $request->except(['-token']);

        //to ignore the values
//        $data = $request->only(['title','status']);
//        $title = $request->title;
//        $title = $request->input('title');
//          $title = $request->input('is_active', true);
//          dd($title);

    }

    ////////////// Dependency injection -> Model class assigning in controller

    public function edit(Request $request){
        $all_parents = $this->category->whereNull("parent_id")->get();

        $this->category = $this->category->findOrFail($request->id);
        return view('admin.category-form')
            ->with("parent_cats",$all_parents)
            ->with("detail",$this->category);
    }

    public function update(Request $request){
        $this->category = $this->category->findOrFail($request->id);
        $rules = array(
            'title' => "required|string",
            "status" => ["required","in:active,inactive"],
            'parent_id' => "nullable|exists:categories,id",
            "image" => "sometimes|image|max:5000"
        );
        $request->validate($rules);

        $data = $request->except(['_token','image']);

        if($request->image) {
            $file_name = uploadImage('category', $request->image);
            if ($file_name) {
                $data['image'] = $file_name;
                if($this->category->image){
                    deleteFile('category',$this->category->image);
                }
            }
        }

        $this->category->fill($data);

        $response = $this->category->save();
        if($response){
            return redirect()->route('category.index');
        } else {
            return redirect()->route('category.index');
        }
    }
}

