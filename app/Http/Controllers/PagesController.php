<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Mail\MailRegister;
use Illuminate\Support\Facades\Mail;
use App\Events\EventRegister;
use App\File;
use App\Event\EventResetPassword;
use App\Artist;
use App\Category;
use App\Genre;
class PagesController extends Controller
{
    public function getHomePage(){



        $dataMix = File::where(['category_id'=>2,'status'=>1])->orderBy('id','desc')->take(10)->get();

        
        $dataVideo = File::where(['category_id'=>1,'status'=>1])->orderBy('id','desc')->take(8)->get();
       
        $dataTrack = File::where(['category_id'=>1,'status'=>1])->orderBy('id','desc')->take(5)->get();

     
       $dataMixTop = File::where(['category_id'=>2,'status'=>1])->orderBy('id','desc')->take(5)->get();
        $dataTrackTop = File::where(['category_id'=>3,'status'=>1])->orderBy('id','desc')->take(10)->get();

       // return view('demo',compact(['dataTrack','dataMix','dataVideo','dataMixTop','dataTrackTop']));

        return view('home',compact(['dataTrack','dataMix','dataVideo','dataMixTop','dataTrackTop']));
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

        //return view('user.mixset.list',compact(['data']));
    }
    public function runFile($name){
        $data = DB::select("select a.slug_name as slug_name_artist ,f.slug_name as slug_name_file, g.name as gen_name , f.count_view as view_count, f.id as file_id, f.category_id as cate_id, f.count_view as count_view, f.path as file_path, f.name as file_name, a.name as artist_name, a.image as artist_image from files f 
        inner join artists a on f.artist_id = a.id 
        INNER join genres g on f.genre_id = g.id where f.slug_name='$name' and f.status=1");
        if(isset($data[0])){
        $type = explode('.',$data[0]->file_path);
        $typeFile = $type[count($type)-1];
        $view = $data[0]->count_view;
        $view = $view +1;
        DB::update("update files set count_view= $view where slug_name='$name'");
        if($typeFile=='mp3'){
            $random= DB::select ("select f.slug_name as slug_name_file, a.slug_name as slug_name_artist,  f.name as file_name, f.id as file_id,a.name as artist_name, a.image as artist_image
        from files f
        inner join artists a on f.artist_id = a.id
          INNER join genres ON f.genre_id = genres.id
       where f.category_id=".$data[0]->cate_id." ORDER BY rand() limit 5;");
            $favorite = DB::select("select count(*) as favorite from `user-favorite` where file_id=".$data[0]->file_id);
            return view('user.playmedia.playAudio',compact(['data','random','favorite']));

        }
        $random= DB::select ("select f.slug_name as slug_name_file, a.slug_name as slug_name_artist, f.path_image_video as video_image, f.name as file_name, f.id as file_id,a.name as artist_name, a.image as artist_image
        from files f
        inner join artists a on f.artist_id = a.id
          INNER join genres ON f.genre_id = genres.id
         where f.category_id=".$data[0]->cate_id." ORDER BY rand() limit 5;");

        $favorite = DB::select("select count(*) as favorite from `user-favorite` where file_id=".$data[0]->file_id);

            return view('user.playmedia.playVideo', compact(['data', 'random', 'favorite']));
        }else{
            echo "
            <script>
            alert('Sorry!Please wait admin check file!');
            
            </script>
            ";
        }
    }
    public function search($key){
        $key = $_REQUEST['q'];
        $track = DB::select("
        select f.slug_name as slug_name_file,a.slug_name as slug_name_artist,  f.name as file_name, f.id as file_id, g.name as gen_name,a.name as artist_name, a.image as artist_image
        from files f
          inner join genres g on f.genre_id = g.id
          inner join artists a on f.artist_id = a.id
        where f.name like '%$key%' and f.category_id=3  and f.status=1 limit 5
        ");
        $video = DB::select("
        select f.slug_name as slug_name_file,a.slug_name as slug_name_artist,  f.name as file_name, f.id as file_id, g.name as gen_name,a.name as artist_name, a.image as artist_image,f.path_image_video as image_video
        from files f
          inner join genres g on f.genre_id = g.id
          inner join artists a on f.artist_id = a.id
        where f.name like '%$key%' and f.category_id=1  and f.status=1 limit 5;
        ");
        $mixset = DB::select("
        select f.slug_name as slug_name_file,a.slug_name as slug_name_artist,  f.slug_name as slug_name_file,a.slug_name as slug_name_artist,  f.name as file_name, f.id as file_id, g.name as gen_name,a.name as artist_name, a.image as artist_image
from files f
  inner join genres g on f.genre_id = g.id
  inner join artists a on f.artist_id = a.id
where f.name like '%$key%' and f.category_id=2  and f.status=1 limit 5;
        ");



        echo '
                       <div class="col-md-3 col-sm-6">
                        <div class="search-results-block">
                            <h3 class="search-results-block-title"><span>MIXSETS</span>
                                <a href="'.url('cate/MIXSET').'" class="search-more">View all</a>
                            </h3>
                            <div class="search-results-block-list">';
        foreach($mixset as $value) {
            echo '         <div class="media">
                                    <div class="media-left">
                                        <a class="img" href="'.url('file',['name'=>$value->slug_name_file]).'"><img src="http://st.mix166.com/html/images/spacer.gif" class="bgi" style="background-image: url('.asset($value->artist_image).');" alt=""></a>
                                    </div>
                                    <div class="media-body">
                                        <h2 class="global-name"><a href="'.url('file',['name'=>$value->slug_name_file]).'">'.$value->file_name.'</a></h2>
                                        <h3 class="global-author">
                                            <a href="'.url('artists',['name'=>$value->slug_name_artist]).'" title="">'.$value->artist_name.' </a>
                                        </h3>
                                    </div>
                                </div>';
        }
        echo '
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="search-results-block">
                            <h3 class="search-results-block-title"><span>TRACKS</span>
                                <a href="'.url('cate/3').'" class="search-more">View all</a>
                            </h3>
                            <div class="search-results-block-list">';

        foreach ($track as $value){
            echo '                <div class="media">
                                    <div class="media-left">
                                        <a class="img" href="'.url('file',['name'=>$value->slug_name_file]).'"><img src="http://st.mix166.com/html/images/spacer.gif" class="bgi" style="background-image: url('.asset($value->artist_image).');" alt=""></a>
                                    </div>
                                    <div class="media-body">
                                        <h2 class="global-name"><a href="'.url('file',['name'=>$value->slug_name_file]).'">'.$value->file_name.'</a></h2>
                                        <h3 class="global-author">
                                            <a href="'.url('artists',['name'=>$value->slug_name_artist]).'" title="Hip-Hop/Rap">'.$value->artist_name.'</a>
                                        </h3>

                                 </div>
                                </div>';

        }
        echo '
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="search-results-block video">
                            <h3 class="search-results-block-title"><span>VIDEOS</span>
                                <a href="" class="search-more">View all</a>
                            </h3>
                            <div class="search-results-block-list">';

        foreach ($video as $value) {
            echo '
                                <div class="media">
                                    <div class="media-left">
                                        <a class="img" href="'.url('file',['name'=>$value->slug_name_file]).'"><img src="http://st.mix166.com/html/images/spacer.gif" class="bgi" style="background-image: url('.asset($value->image_video).');" alt=""></a>
                                    </div>
                                    <div class="media-body">
                                        <h2 class="global-name"><a href="'.url('file',['name'=>$value->slug_name_file]).'" title="">'.$value->file_name.'</a></h2>
                                        <h3 class="global-author">
                                            <a href="'.url('artists',['name'=>$value->slug_name_artist]).'" title="'.$value->artist_name.'">'.$value->artist_name.'</a>
                                        </h3>
                                    </div>
                                </div>';
        }
        echo'
                                
                      </div>
                        </div>
                    </div>
        
        ';

    }


    function login(Request $request){
        $email = $request->email;
        $pass = $request->password;
        if(Auth::attempt(['email'=>$email,'password'=>$pass,'level'=>2,'status'=>1])){
            return redirect()->route('home');
        }else{
            $error = "<script>
            alert('Email or password not correct!!!');
            </script>";



            $dataMix = File::where(['category_id'=>2,'status'=>1])->orderBy('id','desc')->take(10)->get();


            $dataVideo = File::where(['category_id'=>1,'status'=>1])->orderBy('id','desc')->take(8)->get();

            $dataTrack = File::where(['category_id'=>1,'status'=>1])->orderBy('id','desc')->take(5)->get();


            $dataMixTop = File::where(['category_id'=>2,'status'=>1])->orderBy('id','desc')->take(5)->get();
            $dataTrackTop = File::where(['category_id'=>3,'status'=>1])->orderBy('id','desc')->take(10)->get();
            return view('home',compact(['error','dataTrack','dataMix','dataVideo','dataMixTop','dataTrackTop']));

        }
    }

    public function register(UserRequest $request){

        $user = new User();
        $user->name=$request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->pass);
        $user->level = 2;
        $user->remember_token = $request->_token;
        $user->save();
        event(new EventRegister($request));
        return view('register')->with(['email'=>$user->email]);

    }
    public function demo(){
       $send = new MailRegister('minhngoc2512@yahoo.com');

      if($send){
          return 'ok';
      }else{
          return 'fail';
      }

    }
    function checkRegistration($user,$token){
        $data = DB::select("select count(*) as count_column from users where name='$user' and remember_token='$token'");

        if($data[0]->count_column>0){
            DB::table('users')->where('name',$user)->update(['status'=>1]);
            $ok = "<script>
            confirm('Created account success!');
            </script>";

            return view('user.notification',compact(['ok']));
            }
        else{
            $error = "<script>
            confirm('Create account error!  Check again email');
            </script>";
            echo $error;
            return view('user.notification',compact(['error']));

        }
    }

    function resetPassword(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required',
            'password_confirmation'=>'required|same:password'
        ]);
        DB::table('users')->where('email',$request->email)->update(['password'=>bcrypt($request->password),'status'=>0,'remember_token'=>$request->_token]);

        event(new EventResetPassword($request));
        $ok ="
        <script>
        confirm('Check mail: $request->email');
        
        </script>
        ";
        return redirect()->route('home',['ok'=>$ok]);

    }

    function resetPassword_2($email,$token){
        $data = DB::select("select count(*) as count_ from users where email='$email' and remember_token='$token'");
        if($data[0]->count_>0){
            DB::table('users')->where('email',$email)->update(['status'=>1]);
            $ok= "
            <script>
            confirm('Recovery password success');
            
            </script>
            ";
            return view('resetpassword',compact(['email']));
        }else{
            $error= "
            <script>
            confirm('Recovery password fail!');
            
            </script>
            ";

            return redirect()->route('home',['error'=>$error]);
        }

    }
    function favorite($fileid){
       // echo $fileid;
       $userid= auth::user()->id;
        $data = DB::select("select count(*)  as count_ from `user-favorite` where user_id=$userid and file_id=$fileid");
       if($data[0]->count_ ==0) {
          DB::table('user-favorite')->insert(['user_id' => $userid, 'file_id' => $fileid]);
       }
       $data2 = DB::select("select count(*) as count_1 from `user-favorite` where file_id=$fileid");
       echo $data2[0]->count_1;
    }
    function getProfile($id){
        $dataMixTop = DB::select("select


         f.slug_name as slug_name_file, a.slug_name as slug_name_artist ,f.id as file_id, a.name as name_artist, f.name as name_file,g.name as name_gen,f.path as path_file,a.image as image_path
        from files f
         inner join artists a on f.artist_id = a.id
        inner JOIN users u on f.user_id = u.id
        INNER join genres g on f.genre_id = g.id
        INNER  join categories on f.category_id = categories.id
         where f.category_id=2  and f.status=1
        GROUP BY f.id DESC limit 10");

        $dataMixset = DB::select("select   f.slug_name as slug_name_file, a.slug_name as slug_name_artist , f.name as file_name , f.id as file_id, g.name as gen_name, a.name as artist_name, a.image as path_image, f.path_image_video as image_video from files f
        inner join  `user-favorite` uf on f.id = uf.file_id
        inner join artists a on f.artist_id = a.id
        inner join genres g on f.genre_id = g.id where uf.user_id=$id and category_id=2");
        $dataVideo = DB::select("select    f.slug_name as slug_name_file, a.slug_name as slug_name_artist , f.count_view as count_view , f.name as file_name , f.id as file_id, g.name as gen_name, a.name as artist_name, a.image as path_image, f.path_image_video as image_video from files f
        inner join  `user-favorite` uf on f.id = uf.file_id
        inner join artists a on f.artist_id = a.id
        inner join genres g on f.genre_id = g.id where uf.user_id=$id and category_id=1");
        $dataTrack = DB::select("select   f.slug_name as slug_name_file, a.slug_name as slug_name_artist , f.name as file_name , f.id as file_id, g.name as gen_name, a.name as artist_name, a.image as path_image, f.path_image_video as image_video from files f
        inner join  `user-favorite` uf on f.id = uf.file_id
        inner join artists a on f.artist_id = a.id
        inner join genres g on f.genre_id = g.id where uf.user_id=$id and category_id=3");


        $dataUserMixset = DB::select("select   f.slug_name as slug_name_file, a.slug_name as slug_name_artist , f.name as file_name , f.id as file_id, g.name as gen_name, a.name as artist_name, a.image as path_image, f.path_image_video as image_video from files f
        
        inner join artists a on f.artist_id = a.id
        inner join genres g on f.genre_id = g.id where f.user_id=$id and category_id=2");
        $dataUserVideo = DB::select("select   f.slug_name as slug_name_file, a.slug_name as slug_name_artist , f.count_view as count_view , f.name as file_name , f.id as file_id, g.name as gen_name, a.name as artist_name, a.image as path_image, f.path_image_video as image_video from files f
    
        inner join artists a on f.artist_id = a.id
        inner join genres g on f.genre_id = g.id where f.user_id=$id and f.category_id=1");
        $dataUserTrack = DB::select("select   f.slug_name as slug_name_file, a.slug_name as slug_name_artist , f.name as file_name , f.id as file_id, g.name as gen_name, a.name as artist_name, a.image as path_image, f.path_image_video as image_video from files f
       
        inner join artists a on f.artist_id = a.id
        inner join genres g on f.genre_id = g.id where f.user_id=$id and category_id=3");




        return view('user.profile.list',compact(['dataVideo','dataMixTop','dataMixset','dataTrack','dataUserVideo','dataUserMixset','dataUserTrack',]));

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
            '-' => ' ',
        );
        foreach ($unicode as $nonUnicode => $uni) $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        return $str;
    }
    function uploadFile(FileRequest $request){
        echo "<pre>";
        print_r($request->file('file'));
        echo"</pre>";

        $file = new File();
        $file->name =$request->name;
        $file->slug_name =  $this->stripUnicode($request->name);
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

        return redirect('UserProfile/'.auth::user()->id);



    }

    function getFormUpload(){
        $artist = Artist::all()->toArray();
        $genre = Genre::all()->sortByDesc('id')->toArray();
        $category = Category::all()->toArray();
        return view('user.profile.uploadfile',compact(['artist','genre','category']));
    }
    function listGenres($name){
       $tmp = DB::select("select * from genres where name='$name'");

       $data =File::where('genre_id',$tmp[0]->id)->paginate(10);
        return view('user.genre.list',compact(['data']));
    }
    function listArtists($slug_name){
        $tmp = Artist::where('slug_name',$slug_name)->get();

        $data =File::where('artist_id',$tmp[0]->id)->paginate(10);
        return view('user.artist.list',compact(['data']));
    }
}
