@extends('admin.master')
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">List Files</h1>
                </div>
            </div>
            <!-- ... Your content goes here ... -->
            <table class="table tab-content table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Path</th>
                    <th>image_video</th>
                    <th>Category_id</th>
                    <th>Artist_id</th>
                    <th>Genre_id</th>
                    <th>User_id</th>
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
                        <td>
                            <?php
                            $type = explode('.',$value['path'])[count(explode('.',$value['path']))-1];
                            ?>
                            @if($type=='mp4')
                                    <video width="320" height="240" controls>
                                        <source src="{!! asset($value['path']) !!}" type="video/mp4">
                                        <source src="{!! asset($value['path']) !!}" type="video/ogg">
                                        Your browser does not support the video tag.
                                    </video>



                                @elseif($type=='mp3')
                                    <audio controls>
                                        <source src="{!! asset($value['path']) !!}" type="audio/ogg">
                                        <source src="{!! asset($value['path']) !!}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                @else
                                    <video width="320" height="240" controls>
                                        <source src="{!! asset($value['path']) !!}" type="video/mp4">
                                        <source src="{!! asset($value['path']) !!}" type="video/ogg">
                                        Your browser does not support the video tag.
                                    </video>




                                @endif
                        </td>
                        @if($value['path_image_video']!=null)
                        <td><img src="{{asset($value['path_image_video'])}}" width="100" class="img-thumbnail"></td>
                        @else
                        <td>Null</td>
                        @endif
                        <td>{{$value->category->name}}</td>
                        <td>{{$value->artist->name}}</td>
                        <td>{{$value->genre->name}}</td>
                        <td>{{$value->user->name}}</td>
                        <td>  <select   id="option" onchange="changeStatus({{$value['id']}},value)">
                                @if($value['status']==1)
                                    <option value="1">Active</option>
                                    <option value="0">disable</option>
                                    @else

                                    <option value="0">disable</option>
                                    <option value="1">Active</option>
                                @endif

                            </select></td>
                        <td>{{$value['created_at']}}</td>
                        <td>{{$value['updated_at']}}</td>
                        <td><a href="{{url('admin/file/edit',[$value['id']])}}"><input type="button" class="btn btn-success" value="Edit"></a></td>
                        <td><a  onclick="demo('{{'Delete user name:'.$value['name']}}')"  href="{{url('admin/file/delete',[$value['id']])}}">  <input type="button"  class="btn btn-danger" value="Delete"></a></td>
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

    <script>
        function changeStatus(id,value) {

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = new function(){
                if(this.readyState==4 && this.status==200){
                    // document.getElementById('option').innerHTML=this.responseText;

                }
            }

            xmlhttp.open("GET","{{url("admin/file/status")}}/"+id+"/"+value,true);
            xmlhttp.send();


        }
    </script>




@endsection
