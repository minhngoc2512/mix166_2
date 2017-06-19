@extends('layouts.appUser')
@section('content')
<link href="http://st.mix166.com/html/css/tablesaw.css" media="screen" rel="stylesheet" type="text/css">
    <link href="http://st.mix166.com/html/css/bootstrap-datetimepicker.css" media="screen" rel="stylesheet" type="text/css">
        <link href="http://st.mix166.com/html/css/style.css?v=1494261145" media="screen" rel="stylesheet" type="text/css">
            <div class="container">
                <div class="full-page">
                    <div class="top-panel">
                        <h2 class="main-title">
                            tracks
                        </h2>
                    </div>
                    <div class="content-full">
                        <div class="tab-content">
                            <div class="tab-pane active " id="list_fetured" role="tabpanel">
                                <div class="tablesaw-bar mode-stack">
                                </div>
                                <table class="tablesaw tablesaw-stack" data-tablesaw-mode="stack" id="table-5305">
                                    <thead>
                                        <tr>
                                            <th data-tablesaw-priority="persist" data-tablesaw-sortable-col="" scope="col" style="width: 27%">
                                                tracks name
                                            </th>
                                            <th data-tablesaw-priority="3" data-tablesaw-sortable-col="" data-tablesaw-sortable-default-col="" scope="col" style="width: 18%">
                                                Artists
                                            </th>
                                            <th class="d1" data-tablesaw-priority="2" data-tablesaw-sortable-col="" scope="col" style="width: 10%">
                                                Genre
                                            </th>
                                            <th class="d2" data-tablesaw-priority="1" data-tablesaw-sortable-col="" scope="col" style="width: 15%">
                                                RELEASE DATE
                                            </th>
                                            <th class="d3" data-tablesaw-priority="1" data-tablesaw-sortable-col="" scope="col" style="width: 8%">
                                                bpm
                                            </th>
                                            <th class="d4" data-tablesaw-priority="1" data-tablesaw-sortable-col="" scope="col" style="width: 8%">
                                                key
                                            </th>
                                            <th data-tablesaw-priority="4" data-tablesaw-sortable-col="" scope="col" style="width: 14%">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="data-song list-track">
                                    @foreach($data as $value)
                                        <tr>
                                            <td>
                                                <b class="tablesaw-cell-label">
                                                    tracks name
                                                </b>
                                                <span class="tablesaw-cell-content">
                                                    <b class="tablesaw-cell-label">
                                                        tracks name
                                                    </b>
                                                    <span class="tablesaw-cell-content">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <div class="thumb">
                                                                    <div class="global-figure">
                                                                        <div class="global-image">
                                                                            <a href="{{url('file',['name'=>$value->slug_name])}}">
                                                                                <span style="background-image: url({{asset($value->artist->image)}}); width: 45px; height: 45px;">
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <h2 class="song-name">
                                                                    <a href="{{url('file',['name'=>$value->slug_name])}}" title="{{$value->name}}">
                                                                        {{$value->name}}
                                                                    </a>
                                                                </h2>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </span>
                                            </td>
                                            <td>
                                                <b class="tablesaw-cell-label">
                                                    Artists
                                                </b>
                                                <span class="tablesaw-cell-content">
                                                    <b class="tablesaw-cell-label">
                                                        Artists
                                                    </b>
                                                    <span class="tablesaw-cell-content">
                                                        <p class="artists">
                                                            <a href="{{url('artists',['name'=>$value->artist->slug_name])}}" title="Isaac">
                                                                {{$value->artist->name}}
                                                            </a>
                                                        </p>
                                                    </span>
                                                </span>
                                            </td>
                                            <td class="d1">
                                                <b class="tablesaw-cell-label">
                                                    Genre
                                                </b>
                                                <span class="tablesaw-cell-content">
                                                    <b class="tablesaw-cell-label">
                                                        Genre
                                                    </b>
                                                    <span class="tablesaw-cell-content">
                                                        <p class="genre">
                                                            <a href="{{url('genres',['name'=>$value->genre->name])}}" title="Progressive House">
                                                                {{$value->genre->name}}
                                                            </a>
                                                        </p>
                                                    </span>
                                                </span>
                                            </td>
                                            <td class="d2">
                                                <b class="tablesaw-cell-label">
                                                    RELEASE DATE
                                                </b>
                                                <span class="tablesaw-cell-content">
                                                    <b class="tablesaw-cell-label">
                                                        RELEASE DATE
                                                    </b>
                                                    <span class="tablesaw-cell-content">
                                                        <p class="date">
                                                            {{$value->created_at}}
                                                        </p>
                                                    </span>
                                                </span>
                                            </td>
                                            <td class="d3">
                                                <b class="tablesaw-cell-label">
                                                    bpm
                                                </b>
                                                <span class="tablesaw-cell-content">
                                                    <b class="tablesaw-cell-label">
                                                        bpm
                                                    </b>
                                                    <span class="tablesaw-cell-content">
                                                        <p class="bpm">
                                                            110
                                                        </p>
                                                    </span>
                                                </span>
                                            </td>
                                            <td class="d4">
                                                <b class="tablesaw-cell-label">
                                                    key
                                                </b>
                                                <span class="tablesaw-cell-content">
                                                    <b class="tablesaw-cell-label">
                                                        key
                                                    </b>
                                                    <span class="tablesaw-cell-content">
                                                        <p class="key">
                                                            G major
                                                        </p>
                                                    </span>
                                                </span>
                                            </td>
                                            <td>
                                                <!--<a href="javascript:void(0)" title="" class="btn-buy">buy</a>-->
                                                <a class="btn-share" data-link-share="{{url('file',['name'=>$value->slug_name])}}" data-object-id="2004764" data-object-type="edm_song" href="javascript:void(0)" onclick="shareLink(this);" title="share">
                                                    share
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                   
                                    </tbody>
                                </table>
                                <div class="comment-footer">
                                    <a href="#" id="trigger-pagination">
                                    </a>
                                    <ul class="pagination" data-current="1" data-total="23" id="pagination">
                                    {{$data->render()}}





                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            @endsection
        </link>
    </link>
</link>