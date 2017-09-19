@extends('admin.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add File</h1>
                </div>
            </div>
        @include('admin.logerror.error')
        <!-- ... Your content goes here ... -->

            <form action="{{route('addFile')}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    {{csrf_field()}}
                    <label>Input name</label>
                    <input class="form-control" type="text" placeholder="Input name" name="name">
                </div>
                <div class="form-group">
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
                    <label>Choose format file</label>
                    <select name="format_file" class="form-control">
                        <option value="video">Video</option>
                        <option value="audio">Audio</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Choose genre</label>
                    <select name="gen" class="form-control">
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
                    <input type="submit" class="btn btn-success" value="Add File">
                    <input type="reset" class="btn btn-danger" value="reset">

                </div>

            </form>

        </div>
    </div>
    <script>
        function checkVideo(i) {
            if (i == 1) {
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