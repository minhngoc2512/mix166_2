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

            <form action="{{route('updateFile')}}" method="post" enctype="multipart/form-data">
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
                    <select name="cate" class="form-control">

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
                    <select name="gen" class="form-control">
                        <?php
                        foreach ($genre as $gen) {
                            echo "<option value='" . $gen['id'] . "'>" . $gen['name'] . "</option>";
                        }
                        ?>
                    </select>

                </div>

                <input type="hidden" value="1" name="user_id">
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Add File">
                    <input type="reset" class="btn btn-danger" value="reset">

                </div>

            </form>

        </div>
    </div>
@endsection