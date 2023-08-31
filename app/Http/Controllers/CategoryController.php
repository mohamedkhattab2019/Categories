<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function  index(){
        $categories = Category::select('id','name')->where('parent_id',0)->get();
        return view('category',compact('categories'));
    }

    public function create_subcategory($category_id){
        $category_check = Category::where('parent_id',$category_id)->get();
        if($category_check->count()>0){
            $category_1 = $category_check->first();
            $category_2 = $category_check->skip(1)->first();
        }else {
            $category = Category::where('id', $category_id)->first();
            if ($category->parent_id != 0) {
                    $category_1 = Category::create(['name' => $category->name . '-' . '1', 'parent_id' => $category_id]);
                    $category_2 = Category::create(['name' => $category->name . '-' . '2', 'parent_id' => $category_id]);
            } else {
                    $category_1 = Category::create(['name' => 'SUB ' . $category->name . '1', 'parent_id' => $category_id]);
                    $category_2 = Category::create(['name' => 'SUB ' . $category->name . '2', 'parent_id' => $category_id]);
            }
        }
        return response()->json(['category_1'=>$category_1,'category_2'=>$category_2]);
    }
}
