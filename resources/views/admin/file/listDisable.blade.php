@extends('admin.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">List Files disable</h1>
                </div>
            </div>

            <!-- ... Your content goes here ... -->
            <table class="table tab-content table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>PLay media</th>
                    <th>User Create</th>
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
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>
                            <p > <!-- Trigger the modal with a button -->
                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#playMedia_{!!$value->id!!}"><i class="fa fa-play" aria-hidden="true"></i></button></p>

                            <!-- Modal -->
                            <div id="playMedia_{!!$value->id!!}" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Play media {{$value->name}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            @if($value->format_file=='video')
                                                <video width="320" height="240" controls>
                                                    <source src="{!! asset($value['path']) !!}" type="video/mp4">
                                                    <source src="{!! asset($value['path']) !!}" type="video/ogg">
                                                    Your browser does not support the video tag.
                                                </video>



                                            @else
                                                <audio style="width: 100%" controls>
                                                    <source src="{!! asset($value['path']) !!}" type="audio/ogg">
                                                    <source src="{!! asset($value['path']) !!}" type="audio/mpeg">
                                                    Your browser does not support the audio element.
                                                </audio>




                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </td>


                        <td>{{$value->Artist->name}}</td>
                        <td >

                                <select   id="option" onchange="changeStatus({{$value->id}},value)">
                                    <option value="0">disable</option>
                                    <option value="1">active</option>
                                </select>



                        </td>
                        <td>{{$value->created_at}}</td>
                        <td>{{$value->updated_at}}</td>
                        <td><a href="{{url('admin/file/edit',[$value->id])}}"><input type="button" class="btn btn-success" value="Edit"></a></td>
                        <td><a  onclick="demo('{{'Delete user name:'.$value->name}}')"  href="{{url('admin/file/delete',[$value->id])}}">  <input type="button"  class="btn btn-danger" value="Delete"></a></td>
                    </tr>


                @endforeach

                </tbody>
            </table>


        </div>
    </div>
    <script>
        function changeStatus(id,value) {

           var xmlhttp = new XMLHttpRequest();
           xmlhttp.onreadystatechange = new function(){
               if(this.readyState==4 && this.status==200){
                  // document.getElementById('option').innerHTML=this.responseText;
                   alert(this.responseText);
               }
           }

           xmlhttp.open("GET","{{url("admin/file/status")}}/"+id+"/"+value,true);
           xmlhttp.send();


        }
    </script>


    @endsection