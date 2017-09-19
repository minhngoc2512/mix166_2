<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use DB;
use App\File;
use App\UserFavorite;

class FileController extends Controller
{
    use SoftDeletes;
	public function __construct(){
		parent::__construct();
	}
	    public function runFile($name){
	    $this->view['data'] = File::where('status',1)->where('slug_name',$name)->first();
        if($this->view['data']!=null){
        $type = explode('.',$this->view['data']->path);
        $typeFile = $type[count($type)-1];
        $view = $this->view['data']->count_view;
        $view = $view +1;
        DB::update("update files set count_view= $view where slug_name='$name'");
        if($this->view['data']->format_file=='audio'){
        	$this->view['random'] = File::where('status',1)->where('category_id',$this->view['data']->category_id)->limit(5)->get();
        	$this->view['random'] = collect($this->view['random'])->shuffle();
            $this->view['favorite'] = UserFavorite::where('file_id',$this->view['data']->id)->get()->count();
            return view('user.playmedia.playAudio',$this->view);
        }
        $this->view['random']= collect(File::where('category_id',$this->view['data']->category->id)->limit(5)->get())->shuffle();
        $this->view['favorite'] = collect(DB::table('user-favorite')->where('file_id',$this->view['data']->id)->get())->count();
            return view('user.playmedia.playVideo', $this->view);
        }else{
            $alert="
            <script>
            alert('Sorry!Please wait admin check file!');
            
            </script>
            ";
            return redirect()->route('home',['alert'=>$alert]);
        }
    }
    //
}
