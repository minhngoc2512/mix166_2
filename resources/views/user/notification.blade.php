@extends('layouts.appUser')
@section('content')

@if(isset($ok))

    <div class="alert alert-success">
        <label>Create account successful!</label>
        <a href="./"><input type="button" class="btn btn-default"  value="Back Home" ></a>

    </div>
    @else
    <div class="alert alert-warning">
        <label>Create account error! Please check email</label>
        <a href="./"><input type="button" class="btn btn-default"  value="Back Home" ></a>

    </div>
@endif
    @endsection