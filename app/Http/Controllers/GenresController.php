<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    use SoftDeletes;
		public function __construct(){
		parent::__construct();
	}
    //
}
