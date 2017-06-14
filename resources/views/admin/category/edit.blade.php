
@extends('admin.master')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Category</h1>
                </div>
            </div>
        @include('admin.logerror.error')

        <!-- ... Your content goes here ... -->

            <form action="{{route('updateCate')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" value="{{$data['id']}}" name="id"  >
                <div class="form-group">
                    <label>Input name</label>
                    <input class="form-control" type="text" placeholder="Input name" value="{{$data['name']}} {!! old('name') !!}" name="name">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Update Category">
                    <input type="reset" class="btn btn-danger" value="reset">

                </div>

            </form>

        </div>
    </div>
@endsection