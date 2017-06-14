<?php

namespace App\Http\Controllers\admin;

use App\Artist;
use App\Category;
use App\Genre;
use App\Http\Requests\FileRequest;
use App\User;
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
        $data = File::paginate(10);
        return view('admin.file.list',compact(['data']));
    }
    public function delete($id){
        $data = File::find($id)->toArray();
        unlink($data['path']);
        File::find($id)->delete();
        return redirect('admin/file/list');
    }
    public function edit($id){
        $artist = Artist::all()->toArray();
        $genre = Genre::all()->toArray();
        $category = Category::all()->toArray();
        $data = File::find($id)->toArray();
        return view('admin.file.edit',compact(['data','artist','genre','category']));
    }
    public function update(Request $request){
        $file = File::find($request->id)->toArray();
        $pathOld = $file['path'];
        $fileupdate = File::find($request->id);
        $fileupdate->name = $request->name;
        $path = $request->file('file');
        var_dump($path);

        if($path!=null){
            unlink($pathOld);
            $d = date('D');
            $m=date('m');
            $y = date('Y');
            $s = date('s');
            $h = date('h');
            $mm =date('i');
            $filename ='fileupload/file/'.  "$d-$m-$y-$s-$mm-$h-".$this->stripUnicode($path->getClientOriginalName());
            move_uploaded_file($path->getRealPath(),$filename);
            $fileupdate->path = $filename;

        }
        if($request->image_video!=null){
            unlink($file['path_image_video']);

            $image = $request->file('image_video');
            $path = $image->getRealPath();
            $image2 = getimagesize($path);
            $tl = $image2[0]/$image2[1];




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
        $path = $request->file('file');
        $d = date('D');
        $m=date('m');
        $y = date('Y');
        $s = date('s');
        $h = date('h');
        $mm =date('i');
        $filename ='fileupload/file/'.  "$d-$m-$y-$s-$mm-$h-".$this->stripUnicode($path->getClientOriginalName());
        move_uploaded_file($path->getRealPath(),$filename);
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
            $tl = $image2[0]/$image2[1];




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
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd' => 'đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            ' ' => '_',
        );
        foreach ($unicode as $nonUnicode => $uni) $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        return $str;
    }
    function getListDisable(){
        $data = DB::table('files')->where('status',0)->get()->toArray();
        return view('admin.file.listDisable',compact(['data']));
    }
    function changeStatus($id,$status){
        $file = File::find($id);
        $file->status=$status;
        $file->save();
        echo $id.$status;


    }
    //
}
