
@extends('admin.master')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Genre</h1>
                </div>
            </div>
        @include('admin.logerror.error')

        <!-- ... Your content goes here ... -->

            <form action="{{route('addGenre')}}" method="post" >
                {{csrf_field()}}
                <div class="form-group">


                    <label>Input name</label>
                    <input class="form-control" type="text" placeholder="Input name" value="{!! old('name') !!}" name="name">


                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Add Genre">
                    <input type="reset" class="btn btn-danger" value="Reset">

                </div>

            </form>

        </div>
    </div>
@endsection