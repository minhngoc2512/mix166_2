@extends('admin.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Genre Edit</h1>
                </div>
            </div>
        @include('admin.logerror.error')

        <!-- ... Your content goes here ... -->

            <form action="{{route('updateGenre')}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    {{csrf_field()}}
                    <label>Input name</label>
                    <input class="form-control" type="text" placeholder="Input name" value="{{$data->name}}" name="name">
                </div>
                <input type="hidden" value="{{$data->id}}" name="id">
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Update Genre">
                    <input type="reset" class="btn btn-danger" value="reset">

                </div>

            </form>

        </div>
    </div>
@endsection