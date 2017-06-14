<?php

namespace App\Http\Controllers\admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function getList(){
        $data = Category::paginate(10);
        return view('admin.category.list',compact(['data']));
    }
    public function add(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:categories,name',
        ],[
            'name.required'=>"Please enter name",
            'name.unique'=>"Category's name existed"
        ]);
        $cate = new Category();
        $cate->name = $request->name;
        $cate->save();
        return redirect('admin/cate/list');
    }
    public function delete($id){
         Category::find($id)->delete();
         return redirect('admin/cate/list');
    }
    public function update(Request $request){
        $cate = Category::find($request->id);
        $cate->name = $request->name;
        $cate->save();
        return redirect('admin/cate/list');
    }
    public  function edit($id){
        $data = Category::find($id)->toArray();
        return view('admin.category.edit',compact(['data']));
    }

    //
}
