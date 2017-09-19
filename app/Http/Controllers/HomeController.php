<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct(){
        parent::__construct();
    }

       public function getHomePage(){
        $this->view['dataMix'] = File::where(['category_id'=>2,'status'=>1])->orderBy('id','desc')->take(10)->get();
        $this->view['dataVideo'] = File::where(['category_id'=>1,'status'=>1])->orderBy('id','desc')->take(8)->get();
        $this->view['dataTrack'] = File::where(['category_id'=>1,'status'=>1])->orderBy('id','desc')->take(5)->get();
          $this->view['dataMixTop'] = File::where(['category_id'=>2,'status'=>1])->orderBy('id','desc')->take(5)->get();
        $this->view['dataTrackTop'] = File::where(['category_id'=>3,'status'=>1])->orderBy('id','desc')->take(10)->get();
        return view('home',$this->view);
    }
    public function index()
    {
        return view('home',$this->view);
    }
}
