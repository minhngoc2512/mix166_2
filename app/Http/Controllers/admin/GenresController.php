<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\File;

class GenresController extends Controller
{
    public function getList(){
        $data = Genre::paginate(10);
        return view('admin.genre.list',compact(['data']));
    }
    public function add(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:genres,name',[
                'name.required'=>"Please enter genre's name",
                'name.unique'=>"genre's name existed!"
            ]
        ]);
        $genre = new Genre();
        $genre->name = $request->name;
        $genre->save();
        return redirect('admin/genre/list');
    }
    public function update(Request $request){
        $genre = Genre::find($request->id);
        $genre->name = $request->name;
        $genre->save();
        return redirect('admin/genre/list');
    }
    public function delete($id){
        File::where('genre_id',$id)->delete();

        Genre::find($id)->delete();

        return redirect('admin/genre/list');
    }
    public function edit($id){
        $this->view['data'] = Genre::find($id);

        return view('admin.genre.edit',$this->view);
    }

    //
}
