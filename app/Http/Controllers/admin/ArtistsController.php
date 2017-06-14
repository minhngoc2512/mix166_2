<?php

namespace App\Http\Controllers\admin;

use App\Artist;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArtistRequest;
use Illuminate\Http\Request;

class ArtistsController extends Controller
{
    private $image = null;

    public function getList()
    {
        $data = Artist::paginate(10);
        return view('admin.artist.list', compact(['data']));
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

    public function add(ArtistRequest $request)
    {
        $artist       = new Artist();
        $artist->name = $request->name;
        $image        = $request->file('image');
        $path         = $image->getRealPath();
        $image2       = getimagesize($path);
        $tl           = $image2[0] / $image2[1];

        $this->loadImage($path);
        $this->resizeImage($image2[0] / 2, $image2[1] / 2);
        $d  = date('D');
        $m  = date('m');
        $y  = date('Y');
        $s  = date('s');
        $h  = date('h');
        $mm = date('i');

        $filename = 'fileupload/image/' . "$d-$m-$y-$s-$mm-$h.jpg";
        $this->saveImage($filename);
        $artist->image = $filename;
        $artist->save();
        return redirect('admin/artist/list');
    }
    public function delete($id)
    {

        $artist = Artist::find($id)->toArray();
        $file   = $artist['image'];
        unlink($file);
        $artist = Artist::find($id);
        $artist->delete();

        return redirect('admin/artist/list');
    }
    public function edit($id)
    {
        $value = Artist::find($id)->toArray();
        return view('admin.artist.edit', compact(['value']));
    }
    public function update(Request $request)
    {
        $artist  = Artist::find($request->id);
        $artist2 = Artist::find($request->id)->toArray();

        $artist->name = $request->name;
        $image        = $request->file('image');
        if ($image->getClientOriginalName() != '') {
            unlink($artist2['image']);
            $path   = $image->getRealPath();
            $image2 = getimagesize($path);
            $tl     = $image2[0] / $image2[1];
            $this->loadImage($path);
            if ($image2[0] > 1000) {
                $this->resizeImage($image2[0] / 2, $image2[1] / 2);
            } else {
                $this->resizeImage($image2[0], $image2[1]);
            }
            $d        = date('D');
            $m        = date('m');
            $y        = date('Y');
            $s        = date('s');
            $h        = date('h');
            $mm       = date('i');
            $filename = 'fileupload/image/' . "$d-$m-$y-$s-$mm-$h.jpg";
            $this->saveImage($filename);
            $artist->image = $filename;
        }
        $artist->save();
        return redirect('admin/artist/list');

    }
    //
}
