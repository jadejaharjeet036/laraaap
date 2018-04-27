@extends('layouts.app')

@section('content')

    <div class="col-md-10 col-md-offset-1">
        <h2 class="text-center">Images</h2>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul>
                    <li><i class="fa fa-file-text-o"></i> Images</li>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('image.create', ['id' => Auth::user()->id]) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                        {{ csrf_field() }}
                        <input type="file" id="upimage" name="upimage" required >
                        <button type="submit">Submit</button>
                    </form>
                </ul>
                <ul>
                    <li><i class="fa"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                    <a href="#" class="play-image-modal"><li>Play Images</li></a>
                </ul>
            </div>
        
            <div class="panel-body">
                    {{ csrf_field() }}
            </div><!-- /.panel-body -->
        </div><!-- /.panel panel-default -->
    </div><!-- /.col-md-8 -->

    <!-- Modal form to show a post -->
    <div id="showImageModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="
    margin-left: 200px;
">
            <div class="modal-content" style="
    width: 150%;
">
                <div class="modal-body" style="background: black;width: 950px;height: 950px;">
                    <div class="row" style="margin-top: 120px; margin-right: 45px;
">
                        <div class="col-sm-4" style="margin-left: 128px;">
                            <img src="../{{Auth::user()->picture }}" class="imagep1" width="200px" height="200px" style="
    margin-left: 66px;
"/>
                        </div>
                        <div class="col-sm-3" style="margin-right: -130px;margin-top: 80px;margin-left: 1px;">
                            <img src="../avatars/cross.jpg" width="50px" height="50px"/>
                        </div>
                        <div class="col-sm-4">
                            <img src="../{{Auth::user()->picture }}" class="imagep2" width="200px" height="200px"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection