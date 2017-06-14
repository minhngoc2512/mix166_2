@extends('layouts.appUser');
@section('content')
<div class="alert alert-info">
    <h3>Check email: {{$email}}!</h3>

</div>
<a class="center-block" href="{{url('/')}}" class="btn btn-cancel" > Back home</a>
@endsection