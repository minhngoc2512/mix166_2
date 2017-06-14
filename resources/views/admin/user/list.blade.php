@extends('admin.master')
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">List User</h1>
                </div>
            </div>

            <!-- ... Your content goes here ... -->
            <table class="table tab-content table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Updated at</th>

                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $value)
                    <tr>
                        <td>{{$value['id']}}</td>
                        <td>{{$value['name']}}</td>
                        <td>{{$value['email']}}</td>
                        <td>{{$value['level']}}</td>
                        <td>{{$value['status']}}</td>
                        <td>{{$value['created_at']}}</td>
                        <td>{{$value['updated_at']}}</td>
                        <td><a href="{{url('admin/user/edit',[$value['id']])}}"><input type="button" class="btn btn-success" value="Edit"></a></td>
                        <td><a  onclick="demo('{{'Delete user name:'.$value['name']}}')"  href="{{url('admin/user/delete',[$value['id']])}}">  <input type="button"  class="btn btn-danger" value="Delete"></a></td>
                    </tr>


                @endforeach

                </tbody>
            </table>
            {{$data->render()}}

        </div>
    </div>
    <script>
        function demo (msg){
            if(window.confirm(msg)){
                return true;
            }else{
                return false;
            }
        }
    </script>


@endsection
