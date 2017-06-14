@extends('admin.master')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Edit Artist
                </h1>
            </div>
        </div>
        @include('admin.logerror.error')
        
        <!-- ... Your content goes here ... -->
        <form action="{{route('updateArtist')}}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}

            <input name="id" type="hidden" value="{{$value['id']}}">
                <div class="form-group">
                    <label>
                        Input name
                    </label>
                    <input class="form-control" name="name" placeholder="Input name" type="text" value="{{$value['name']}} {!! old('name') !!}">
                    </input>
                </div>
                <div class="form-group">
                    <label>
                        Insert image
                    </label>
                    <img src="{{asset($value['image'])}}" width="200">
                        <input class="form-control" name="image" type="file">
                        </input>
                    </img>
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Add User">
                        <input class="btn btn-danger" type="reset" value="reset">
                        </input>
                    </input>
                </div>
            </input>
        </form>
    </div>
</div>
@endsection
