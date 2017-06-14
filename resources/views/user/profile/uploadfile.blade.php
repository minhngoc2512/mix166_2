@extends('layouts.appUser')
@section('content')
    <div class="profile">
        <div class="profile-bg"
             style="background-image: url(http://st.cdn.nhacso.net//images/avatars/avatar_imagecover.jpg)"></div>
        <div class="container">

            <div class="profile-header">
                <div class="row">
                    <div class="col-sm-4 col-md-2">
                        <form id="updateAvatarFrm">
                            <div class="box-img">
                                <img class="bgi" src="http://st.cdn.mix166.com/images/spacer.gif"
                                     style="background-image: url(http://st.cdn.nhacso.net//images/avatars/avatar_defaultedm.jpg);height: 200px"
                                     alt="">
                                <a href="#" class="shadow"></a>
                                <div id="fileUploadAvatar" class="file-upload-avatar dropper">
                                    <span>profile picture</span>
                                    <input type="hidden" id="location" name="location" value="">
                                    <input class="dropper-input upload" type="file" multiple=""></div>
                            </div>
                            <ul id="saveAvatar" style="display:none;" class="list-inline action-update action-update-1">
                                <li><a href="javascript:void(0)" class="saveChangeAvatar" title="">Save</a></li>
                                <li><a href="javascript:void(0)" onclick="cancelSaveAvatar(this)"
                                       data-avatar-old="http://st.cdn.nhacso.net//images/avatars/avatar_defaultedm.jpg"
                                       title="">Cancel</a></li>
                            </ul>
                        </form>
                    </div>
                    <div class="col-sm-8 col-md-10">
                        <div class="profile-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
                                    <div class="profile-details">
                                        <h1 class="profile-name">
                                            Leng Keng </h1>
                                        <span class="old">
                          -                         </span>
                                        <span class="address">

                        </span>
                                    </div>
                                </div>
                                <div class="list-button col-xs-12 col-sm-12 col-md-5 col-lg-4">
                                    <ul class="list-inline">
                                        <li>
                                            <a href="javascript:void(0)" onclick="shareLink(this);"
                                               data-link-share="http://mix166.com/profile/leng-keng-2006543.html"
                                               title="share" class="btn btn-outline btn-share"><i
                                                        class="flaticon-connection"></i> Share</a>
                                        </li>
                                        <li><a href="/profile/edit" title="" class="btn-edit btn-outline">Edit
                                                profile</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form id="updateCoverFrm">
                    <div id="fileUploadCover" class="fileUpload dropper">
                        <span>update cover photo</span>
                        <input type="hidden" id="location_cover" name="location_cover" value="">
                        <input class="dropper-input upload" type="file" multiple=""></div>
                    <ul id="saveCover" style="display:none;" class="list-inline action-update">
                        <li><a href="javascript:void(0)" class="saveChangeCover" title="">Save changes</a></li>
                        <li><a href="javascript:void(0)" onclick="cancelSaveCover(this)"
                               data-cover-old="http://st.cdn.nhacso.net/images/avatars/avatar_imagecover.jpg" title="">Cancel</a>
                        </li>
                    </ul>
                </form>
            </div>

            <div class="main-content">
                <div class="row">


                    <div class="col-md-12 ">
                        <div class="list-object">
                            <ul>
                                <li ><a href="#" title="" class="">Home</a></li>
                                 <li><a href="{{url('user/upload')}}" title="" class="active">Uploadfile</a></li>


                            </ul>
                        </div>
                    </div>
                    @include('user.logerror.error')
                    <div class="col-md-6 col-md-offset-2" style="background-color: rgba(255,0,0,0.6);border-radius: 5px">
                        <form  action="{{route('user.uploadfile')}}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                {{csrf_field()}}
                                <label>Input name</label>
                                <input class="form-control" type="text" placeholder="Input name" name="name">
                            </div>
                            <div class="form-group">
                                <label>Insert file</label>
                                <input class="form-control" type="file" name="file">
                            </div>
                            <div class="form-group">
                                <label>Choose catefory</label>
                                <select name="cate" id="cate" onchange="checkVideo(this.value)" class="form-control">
                                    <option value="2">MIXSET</option>

                                    <?php
                                    foreach ($category as $cate) {
                                        echo "<option value='" . $cate['id'] . "'>" . $cate['name'] . "</option>";
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Choose artists</label>
                                <select name="art" class="form-control">

                                    <?php
                                    foreach ($artist as $art) {
                                        echo "<option value='" . $art['id'] . "'>" . $art['name'] . "</option>";
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Choose genre</label>
                                <select name="gen" class="form-control" >
                                    <?php
                                    foreach ($genre as $gen) {
                                        echo "<option value='" . $gen['id'] . "'>" . $gen['name'] . "</option>";
                                    }
                                    ?>
                                </select>

                            </div>
                            <div id="insert_image">


                            </div>

                            <input type="hidden" value="1" name="user_id">
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Upload File">
                                <input type="reset" class="btn btn-danger" value="reset">

                            </div>


                        </form>

                    </div>

                   
                </div>
            </div>
        </div>
    </div>
    <script>
        function checkVideo(i){
            if(i==1){
                document.getElementById('insert_image').innerHTML = '<div class="form-group"><label>Insert Image for video:</label><input type="file" name="image_video" class="form-control" > </div>';
            }else{
                document.getElementById('insert_image').innerHTML =' ';

            }

        }
    </script>
@endsection