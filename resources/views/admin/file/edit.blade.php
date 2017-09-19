@extends('admin.master')
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit File</h1>
                </div>
            </div>
        @include('admin.logerror.error')
        <!-- ... Your content goes here ... -->
            <form action="{{route('updateFile')}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{!! $data->id !!}">
                    <label>Input name</label>

                    <input class="form-control" type="text" value="{!! $data->name !!}" placeholder="Input name"
                           name="name">
                </div>
                <div class="form-group">
                    @if($data->format_file=='video')
                        <video width="320" height="240" controls>
                            <source src="{!! asset($data->path) !!}" type="video/mp4">
                            <source src="{!! asset($data->path) !!}" type="video/ogg">
                            Your browser does not support the video tag.
                        </video>
                    @else
                        <audio controls>
                            <source src="{!! asset($data->path) !!}" type="audio/ogg">
                            <source src="{!! asset($data->path) !!}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    @endif
                    <br>

                            <label>Insert file</label>
                            <select onchange="insertFile(this.value)" class="form-control">
                                <option value="url"> Type Url</option>
                                <option value="file">Type file</option>
                            </select>

                            <div id="file">
                                <label>Url:</label>

                                <input class="form-control" type="text" placeholder="Enter url" name="url"/>

                            </div>



                </div>
                <div class="form-group">
                    <label>Choose catefory</label>
                    <select name="cate"  class="form-control">
                        <option value="{{$data->category_id}}">{{$data->Category->name}}</option>
                        @foreach($category as $cate)
                            <option value="{{$cate->id}}">{{$cate->name}}</option>

                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label>Choose artists</label>
                    <select name="art" class="form-control">
                        <option value="{{$data->artist_id}}"> {{$data->Artist->name}}</option>
                        @foreach($artists as $artist )
                            <option value="{{$artist->id}}">{{$artist->name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label>Choose format file</label>
                    <select name="format_file" onchange="checkVideo(this.value)" class="form-control">
                        <option value="{{$data->format_file}}">{{$data->format_file}}</option>
                        <option value="video">Video</option>
                        <option value="audio">Audio</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Choose genre</label>
                    <select name="gen" class="form-control">
                        <option value="{{$data->genre_id}}"> {{$data->Genre->name}}</option>
                        @foreach($genres as $genre )
                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label>Choose status</label>
                    <select name="status" class="form-control">
                        <?php
                        echo "<option value='" . $data->status . "'>" . $data->status . "</option>";
                        ?>
                        <option value="0">0:Disable</option>
                        <option value="1">1:Active</option>
                    </select>

                </div>
                <div id="insert_image">
                    @if($data->category_id==1)
                        <img src="{{asset($data->path_image_video)}}" width="200" class="img-thumbnail">


                        <div class="form-group"><label>Insert Image for video:</label><input type="file"
                                                                                             name="image_video"
                                                                                             class="form-control"></div>


                    @endif


                </div>

                <input type="hidden" value="1" name="user_id">
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Update File">
                    <input type="reset" class="btn btn-danger" value="reset">

                </div>

            </form>

        </div>
    </div>
    <script>
        function checkVideo(i) {
            if (i == 'video') {
                document.getElementById('insert_image').innerHTML = '<div class="form-group"><label>Insert Image for video:</label><input type="file" name="image_video" class="form-control" > </div>';
            } else {
                document.getElementById('insert_image').innerHTML = ' ';

            }

        }
        function insertFile(i) {
            if (i != 'url') {

                document.getElementById('file').innerHTML = ' <label>File:</label><input class="form-control" type="file" name="file"/>';
            } else {
                document.getElementById('file').innerHTML = '  <label>Url:</label><input class="form-control" type="text" placeholder="Enter url"  name="url" />';

            }

        }
    </script>
@endsection