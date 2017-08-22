@extends('layouts.app')

@section('content')

@include('vendor.ueditor.assets')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Publish Questions</div>

                <div class="panel-body">
                    <form role="form" method="POST" action="/questions">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input id="title" type="text" class="form-control" name="title" placeholder="Title" required>
                        </div>
                        <!-- 编辑器容器 -->
                        <script id="container" name="body" type="text/plain"></script>

                        <button class="btn btn-primary">Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });
</script>
@endsection
