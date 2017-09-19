<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class CategoryController extends Controller
{
		public function __construct(){
		parent::__construct();
	}
	   public function getMenu($name){

        if($name=='VIDEO'){
            $videoTop = File::where('category_id',1)->take(2)->get();
            $data = File::where('category_id',1)->paginate(10);
            return view('user.video.list',compact(['data','videoTop']));
        }else if($name=='MIXSET'){
            $data = File::where('category_id',2)->paginate(10);
            return view('user.mixset.list',compact(['data']));
        }elseif($name=='TRACKS'){
            $data = File::where('category_id',3)->paginate(10);
            return view('user.track.list',compact(['data']));

        }
        return view('home');
    }
    //
}
