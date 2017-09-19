<?php

namespace App\Http\Controllers\admin;

use App\Artist;
use App\Category;
use App\Genre;
use App\Http\Requests\FileRequest;
use App\User;
use App\UserFavorite;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use App\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;

class FilesController extends Controller
{
    public function getFormAdd(){
        $artist = Artist::all()->toArray();
        $genre = Genre::all()->sortByDesc('id')->toArray();
        $category = Category::all()->toArray();
        return view('admin.file.add',compact(['artist','genre','category']));
    }
    public function getList(){
        $this->view['data'] = File::paginate(10);

        return view('admin.file.list',$this->view);
    }
    public function delete($id){
        $data = File::find($id);
        if(file_exists($data->path)) {
            unlink($data->path);
            }
        UserFavorite::where('file_id',$id)->delete();
        File::find($id)->delete();
        return redirect('admin/file/list');
    }
    public function edit($id){
        $this->view['data'] = File::find($id);
        $this->view['category'] = Category::whereNotIn('id',[$this->view['data']->category_id])->get();
        $this->view['artists'] = Artist::whereNotIn('id',[$this->view['data']->artist_id])->get();
        $this->view['genres']= Genre::whereNotIn('id',[$this->view['data']->genre_id])->get();
        return view('admin.file.edit',$this->view);
    }
    public function update(Request $request){
//        dd($request->all());

        $file = File::find($request->id);
        $pathOld = $file->path;
        $fileupdate = File::find($request->id);

        $fileupdate->name = $request->name;
        $fileupdate->slug_name = $this->stripUnicode($request->name);
        $path = $request->file('file');
        if($path!=null){
            if(file_exists($pathOld))unlink($pathOld);
            $d = date('D');
            $m=date('m');
            $y = date('Y');
            $s = date('s');
            $h = date('h');
            $mm =date('i');
            $filename ='fileupload/file/'.  "$d-$m-$y-$s-$mm-$h-".$this->stripUnicode($path->getClientOriginalName());
            move_uploaded_file($path->getRealPath(),$filename);
            $fileupdate->path = $filename;
        }elseif($request->url!=null){
            $fileupdate->path = $request->url;
        }
        if($request->image_video!=null){
            if(file_exists($file->path_image_video))unlink($file->path_image_video);
            $image = $request->file('image_video');
            $path = $image->getRealPath();
            $image2 = getimagesize($path);
            $this->loadImage($path);
            $this->resizeImage($image2[0]/2,$image2[1]/2);
            $d = date('D');
            $m=date('m');
            $y = date('Y');
            $s = date('s');
            $h = date('h');
            $mm =date('i');
            $filename ='fileupload/image/'.  "$d-$m-$y-$s-$mm-$h-video.jpg";
            $this->saveImage($filename);
            $fileupdate->path_image_video= $filename;
        }
        $fileupdate->format_file = $request->format_file;
        $fileupdate->category_id= $request->cate;
        $fileupdate->artist_id = $request->art;
        $fileupdate->genre_id = $request->gen;
        $fileupdate->status = $request->status;
        $fileupdate->save();
        return redirect('admin/file/list');
    }


    private function loadImage($path)
    {
        $type = getimagesize($path);
        if ($type[2] == IMAGETYPE_GIF) {
            $this->image = imagecreatefromgif($path);
        } elseif ($type[2] == IMAGETYPE_JPEG) {
            $this->image = imagecreatefromjpeg($path);
        } elseif ($type[2] == IMAGETYPE_PNG) {
            $this->image = imagecreatefrompng($path);
        }

    }

    private function resizeImage($width, $height)
    {
        $imageNew = imagecreatetruecolor($width, $height);
        imagecopyresampled($imageNew, $this->image, 0, 0, 0, 0, $width, $height, imagesx($this->image), imagesy($this->image));
        $this->image = $imageNew;
    }

    private function saveImage($filename, $compression = 75)
    {
        imagejpeg($this->image, $filename, $compression);
    }

    public function add(FileRequest $request){


        $file = new File();
        $file->name = $request->name;
        $file->slug_name = $this->stripUnicode($request->name);
        $file->format_file = $request->format_file;
        $filename ='';
        if($request->url==null) {
            $path = $request->file('file');
            $d = date('D');
            $m = date('m');
            $y = date('Y');
            $s = date('s');
            $h = date('h');
            $mm = date('i');
            $filename = 'fileupload/file/' . "$d-$m-$y-$s-$mm-$h-" . $this->stripUnicode($path->getClientOriginalName());
            move_uploaded_file($path->getRealPath(), $filename);
        }else{
            $filename= $request->url;
        }


        $file->path = $filename;
        $file->genre_id = $request->gen;
        $file->artist_id = $request->art;
        $file->category_id = $request->cate;
        $file->user_id = auth::user()->id;
        $file->status=1;
        //insert image
        if($request->image_video!=null){
            $image = $request->file('image_video');
            $path = $image->getRealPath();
            $image2 = getimagesize($path);
            $this->loadImage($path);
            $this->resizeImage($image2[0]/2,$image2[1]/2);
            $d = date('D');
            $m=date('m');
            $y = date('Y');
            $s = date('s');
            $h = date('h');
            $mm =date('i');
            $filename ='fileupload/image/'.  "$d-$m-$y-$s-$mm-$h-video.jpg";
            $this->saveImage($filename);
            $file->path_image_video= $filename;
        }


        $file->save();

        return redirect('admin/file/list');




    }
    function stripUnicode($str)
    {
        if (!$str) return false;
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ẵ|Ẳ|Ẵ|Ặ|Ằ|Ậ|Â|Ấ|Ầ|Ẫ|Ậ|Ẩ',
            'd' => 'đ|Đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẹ|Ẽ|Ê|Ế|Ề|Ệ|Ễ|Ể',
            'i' => 'í|ì|ỉ|ĩ|ị|Í|Ì|Ĩ|Ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ọ|Õ|Ô|Ố|Ộ|Ồ|Ỗ|Ớ|Ơ|Ợ|Ỡ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ụ|Ũ|Ư|Ự|Ữ|Ứ|Ừ',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỵ|Ỹ',
            '-' => ' ',
        );
        foreach ($unicode as $nonUnicode => $uni) $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        $str = strtolower($str);
        return $str;
    }

    function getListDisable(){
        $this->view['data'] = File::where('status',0)->get();

        return view('admin.file.listDisable',$this->view);
    }

    function changeStatus($id,$status){
        $file = File::find($id);
        $file->status=$status;
        $file->save();
        echo $id.$status;


    }
    //
}
