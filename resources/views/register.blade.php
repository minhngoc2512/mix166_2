@extends('layouts.appUser');
@section('content')
    <div class="alert alert-info">
        <h3>Check email: {{$email}}!</h3>

    </div>
    <a class="center-block btn btn-cancel" href="{{url('/')}}"  > Back home</a>
    @endsection