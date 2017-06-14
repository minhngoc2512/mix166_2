
@extends('admin.master')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add User</h1>
                </div>
            </div>
        @include('admin.logerror.error')

            <!-- ... Your content goes here ... -->

            <form action="{{route('adduser')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">


                    <label>Input name</label>
                    <input class="form-control" type="text" placeholder="Input name" value="{!! old('name') !!}" name="name">


                </div>
                <div class="form-group">
                    <label>Input email</label>
                    <input class="form-control" type="text" placeholder="Input email"  value="{!! old('email') !!} " name="email" >

                </div>
                <div class="form-group">
                    <label>Input password</label>
                    <input class="form-control" type="password" placeholder="Input password" name="pass">
                </div>
                <div class="form-group">
                    <label>Input again password</label>
                    <input class="form-control" type="password" placeholder="Input  again password" name="Repass">
                </div>



                <div class="form-group">
                    <label>Choose level</label>
                    <select class="form-control" name="level">
                        <option value="1">Admin</option>
                        <option value="2">Member</option>

                    </select>

                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Add User">
                    <input type="reset" class="btn btn-danger" value="reset">

                </div>

            </form>

        </div>
    </div>
@endsection