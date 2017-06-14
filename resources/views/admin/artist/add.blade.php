
@extends('admin.master')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Artist</h1>
                </div>
            </div>
        @include('admin.logerror.error')

        <!-- ... Your content goes here ... -->

            <form action="{{route('addArtist')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">


                    <label>Input name</label>
                    <input class="form-control" type="text" placeholder="Input name" value="{!! old('name') !!}" name="name">


                </div>
                <div class="form-group">
                    <label>Insert image</label>
                    <input class="form-control" type="file"  name="image" >

                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Add Artist">
                    <input type="reset" class="btn btn-danger" value="reset">

                </div>

            </form>

        </div>
    </div>
@endsection