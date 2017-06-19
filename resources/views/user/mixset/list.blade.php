@extends('layouts.appUser')
@section('content')
    <?php
    ?>
    <link rel="stylesheet" type="text/css" href="http://st.mix166.com/html/css/tablesaw.css" media="screen">
    <link rel="stylesheet" type="text/css" href="http://st.mix166.com/html/css/bootstrap-datetimepicker.css"
          media="screen">
    <link rel="stylesheet" type="text/css" href="http://st.mix166.com/html/css/style.css?v=1494261145" media="screen">


    <div class="container">
        <div class="full-page">
            <div class="top-panel">
                <h2 class="main-title">
                    mixsets
                </h2>

            </div>
            <div class="content-full">
                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane  active " id="list_newest">
                        <div class="tablesaw-bar mode-stack"></div>
                        <table class="tablesaw tablesaw-stack" data-tablesaw-mode="stack" id="table-4619">
                            <thead>
                            <tr>
                                <th style="width: 30%" ;="" scope="col" data-tablesaw-sortable-col=""
                                    data-tablesaw-priority="persist">mixsets name
                                </th>
                                <th style="width: 20%" ;="" scope="col" data-tablesaw-sortable-col=""
                                    data-tablesaw-sortable-default-col="" data-tablesaw-priority="3">Artists
                                </th>
                                <th class="d1" style="width: 21%" ;="" scope="col" data-tablesaw-sortable-col=""
                                    data-tablesaw-priority="2">Genre
                                </th>
                                <th class="d2" style="width: 15%" ;="" scope="col" data-tablesaw-sortable-col=""
                                    data-tablesaw-priority="1">RELEASE DATE
                                </th>
                                <th style="width: 14%" ;="" scope="col" data-tablesaw-sortable-col=""
                                    data-tablesaw-priority="4"></th>
                            </tr>
                            </thead>
                            <tbody class="list-song data-song">
                            <?php
                            $i = 0;
                            ?>
                            @foreach($data as $value)

                                <tr>
                                    <td>
                                        <b class="tablesaw-cell-label">mixsets name</b>
                                        <span class="tablesaw-cell-content">
                                        <b class="tablesaw-cell-label">mix name</b>
                                        <span class="tablesaw-cell-content">
                                        <div class="media">
                                            <div class="media-left">
                                              <div class="thumb">
                                                <div class="global-figure">
                                                  <div class="global-image">
                                                    <a href="{{url('file',['name'=>$value->slug_name])}}"
                                                       title="{{$value->name}}">

                                                        <span
                                                                style="background-image: url({{asset($value->artist->image)}}); width: 80px; height: 80px;">

                                                        </span></a>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="media-body">
                                              <h2 class="song-name"><a href="{{url('file',['name'=>$value->slug_name])}}"
                                                                       title="{{$value->artist->name}}">{{$value->name}}</a></h2>
                                            </div>
                                          </div>
                                      </span></span></td>
                                    <td>
                                        <b class="tablesaw-cell-label">Artists</b><span class="tablesaw-cell-content">
                                        <b class="tablesaw-cell-label">Artists</b>
                                        <span class="tablesaw-cell-content"><p
                                                    class="artists">{{$value->artist->name}} </p>
                                        </span></span></td>
                                    <td class="d1">
                                        <b class="tablesaw-cell-label">Genre</b>
                                        <span class="tablesaw-cell-content">
                                        <b class="tablesaw-cell-label">Genre</b>
                                        <span class="tablesaw-cell-content"><p class="genre">
                                                <a href="{{url('genres',['name'=>$value->genre->name])}}"
                                                   title="{{$value->genre->name}}"> {{$value->genre->name}} </a>
                    </p>
  </span>
                                    </span>
                                    </td>
                                    <td class="date d2"><b class="tablesaw-cell-label">RELEASE DATE</b><span
                                                class="tablesaw-cell-content"><b
                                                    class="tablesaw-cell-label">RELEASE DATE</b><span
                                                    class="tablesaw-cell-content"><p>{{$value->created_at}}</p></span></span></td>
                                    <td>
                                        <!--<a href="javascript:void(0)" title="" class="btn-buy">buy</a>-->
                                        <a href="javascript:void(0)" data-object-id="2000388" data-object-type="edm_mix"
                                           title="share" class="btn-share"
                                           data-link-share="{{url('file',['name'=>$value->slug_name])}}"
                                           onclick="shareLink(this);">share</a>
                                    </td>
                                </tr>
                                <?php $i++?>
                            @endforeach



                            </tbody>
                        </table>
                        <div class="comment-footer">


                            &nbsp;
                            <a id="trigger-pagination" href="#">&nbsp;</a>
                            <ul id="pagination" class="pagination" data-current="1" data-total="4">
                                {{$data->render()}}

                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
