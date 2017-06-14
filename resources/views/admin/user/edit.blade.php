
@extends('admin.master')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit User</h1>
                </div>
            </div>
        @include('admin.logerror.error')
            <!-- ... Your content goes here ... -->

            <form action="{{route('updateUser')}}" method="post">

                {{csrf_field()}}
                <input type="hidden" value="{!! $data['id'] !!}" name="id" >
                <div class="form-group">


                    <label>Input name</label>
                    <input class="form-control" type="text" placeholder="Input name" value="{{$data['name']}}"  name="name">

                </div>
                <div class="form-group">
                    <label>Input email</label>
                    <input class="form-control" type="text" placeholder="Input email" value="{{$data['email']}}" name="email">
                </div>
                <div class="form-group">
                    <label>Input password</label>
                    <input class="form-control" id="password" type="password" onkeyup="passF(this.value)"  placeholder="Input password" name="pass">
                    <div id="nocation">  </div>
                </div>
                <div class="form-group">
                    <label>Input again password</label>
                    <input class="form-control" type="password" onkeyup="RepassF(this.value)" placeholder="Input  again password"  name="Repass">
                    <div id="nocation2">  </div>
                </div>



                <div class="form-group">
                    <label>Choose level</label>
                    <select class="form-control" name="level">
                        @if($data['level']=='1')
                            <option value="1">Admin</option>
                            <option value="2">Member</option>
                            @else
                            <option value="2">Member</option>
                            <option value="1">Admin</option>



                        @endif

                    </select>

                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Update User">
                    <input type="reset" class="btn btn-danger" value="reset">

                </div>


            </form>


        </div>
    </div>
    <script>
        function passF(pass){
          if(pass.length<6){
              document.getElementById('nocation').innerHTML='  <label class="text text-danger" > Password too short</label>';
          }else{
              document.getElementById('nocation').innerHTML='  <label class="text text-success" > Password ok!</label>';
          }

        }
        function RepassF(Repass){
            pass = document.getElementById('password').value;

            if(pass!=Repass){
                document.getElementById('nocation2').innerHTML='  <label class="text text-danger" > RePassword not same Password </label>';

            }else{
                document.getElementById('nocation2').innerHTML='  <label class="text text-success" > RePassword correct </label>';


            }
        }
    </script>
@endsection